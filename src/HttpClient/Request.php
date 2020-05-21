<?php


namespace Sendplus\HttpClient;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Response;
use Sendplus\Exception\ForbiddenException;
use Sendplus\Exception\HttpServerException;
use Sendplus\Exception\InvalidArgumentException;
use Sendplus\Exception\NotFoundException;
use Sendplus\Exception\PayloadTooLargeException;
use Sendplus\Exception\UnAuthorizedException;
use Sendplus\Exception\UnknownException;

class Request
{
    /**
     * @var Response
     */
    private $exceptionResponse;
    /**
     * @var array $allowedMethods
     */
    private static $allowedMethods = [
        "get",
        "post",
        "put",
        "delete"
    ];

    /**
     * @var Client
     */
    private $client;

    /**
     * Request constructor.
     * @param Configuration $configuration
     */
    public function __construct(Configuration $configuration)
    {
        $this->client = new Client([
            'base_uri' => $configuration->getEndpoint(),
            'headers' => [
                'Authorization' => 'Bearer ' . $configuration->getApiToken(),
                'Accept' => 'application/json'
            ]
        ]);

    }

    /**
     * @param $name
     * @param $arguments
     * @return Response
     * @throws Exception
     */
    public function __call($name, $arguments)
    {
        if (!in_array(strtolower($name), self::$allowedMethods)) {
            trigger_error('Call to undefined method '.__CLASS__.'->'.$name.'()', E_USER_ERROR);
        }

        try {
            $response = call_user_func_array([$this->client, $name], $arguments);

            if($response->getStatusCode() != 204) {
                $response = \GuzzleHttp\json_decode($response->getBody()->getContents(), true);
            } else {
                $response = "";
            }
            return $response;

        } catch (ClientException $exception) {

            $this->errorHandler($exception->getResponse()->getBody()->getContents(),
                $exception->getResponse()->getStatusCode());

        }

    }

    /**
     * @param $message
     * @param $code
     * @throws Exception
     */
    protected function errorHandler($message, $code)
    {
        switch ($code) {
            case 401:
                throw new UnAuthorizedException('Unauthorized', $code);
            case 422:
                throw new InvalidArgumentException($message, $code);
            case 403:
                throw new ForbiddenException('Forbidden request', $code);
            case 405:
                throw new \BadMethodCallException('Method not allowed', $code);
            case 404:
                throw new NotFoundException('Entity Not Found', $code);
            case 413:
                throw new PayloadTooLargeException('Payload Too Large', $code);
            case 500 <= $code:
                throw new HttpServerException('Server not available', $code);
            default:
                throw new UnknownException($message, $code);
        }
    }

}