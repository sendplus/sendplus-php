<?php


namespace Sendplus\Api;


use Sendplus\HttpClient\Request;

class RequestApi
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * RequestApi constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

}