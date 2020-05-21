<?php


namespace Sendplus\Api;


use Sendplus\HttpClient\Request;

class MailingListContact extends RequestApi
{
    /**
     * @var
     */
    private $listId;

    /**
     * MailingListContact constructor.
     * @param Request $request
     * @param string $listId
     */
    public function __construct(Request $request, string $listId)
    {
        parent::__construct($request);
        $this->listId = $listId;
    }

    /**
     * @param int $page
     * @return mixed
     */
    public function all(int $page=1)
    {
        return $this->request->get(sprintf('lists/%s/contacts?page=%s', $this->listId, $page));
    }

    /**
     * @param array $arguments
     * @return mixed
     */
    public function create(array $arguments)
    {
        return $this->request->post(sprintf('listsf/%s/contacts', $this->listId), [
            'json' => $arguments
        ]);
    }

    /**
     * @param array $arguments
     * @return mixed
     */
    public function bulk(array $arguments)
    {
        return $this->request->post(sprintf('lists/%s/contacts/bulk', $this->listId), [
            'multipart' => [
                [
                    'name'     => 'file',
                    'contents' => fopen($arguments['file'], 'r')
                ]
            ]
        ]);
    }

}