<?php


namespace Sendplus;


use Sendplus\Api\Campaign;
use Sendplus\Api\Contact;
use Sendplus\Api\MailingList;
use Sendplus\Api\MailingListContact;
use Sendplus\HttpClient\Configuration;
use Sendplus\HttpClient\Request;

class Sendplus
{

    /**
     * @var Request
     */
    private $request;

    /**
     * Sendplus constructor.
     * @param Configuration $configuration
     */
    public function __construct(Configuration $configuration)
    {
        $this->request = new Request($configuration);
    }

    /**
     * @param string $apiToken
     * @param string|null $endpoint
     * @return $this
     */
    public static function configure(string $apiToken, ?string $endpoint = null):self
    {
        $configuration = (new Configuration())
            ->setApiToken($apiToken)
            ->setEndpoint($endpoint);

        return new self($configuration);
    }

    /**
     * @return MailingList
     */
    public function mailingList(): MailingList
    {
        return new MailingList($this->request);
    }

    /**
     * @return Contact
     */
    public function contact(): Contact
    {
        return new Contact($this->request);
    }

    /**
     * @param string $listId
     * @return MailingListContact
     */
    public function mailingListContact(string $listId): MailingListContact
    {
        return new MailingListContact($this->request, $listId);
    }

    /**
     * @return Campaign
     */
    public function campaign(): Campaign
    {
        return new Campaign($this->request);
    }
}