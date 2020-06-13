<?php


namespace Sendplus\HttpClient;


class Configuration
{
    /**
     * @var string
     */
    private $endpoint = "https://api.sendplus.me/v1/";

    /**
     * @var string
     */
    private $apiToken;

    /**
     * @param string $endpoint
     * @return $this
     */
    public function setEndpoint(?string $endpoint): self
    {
        $this->endpoint = $endpoint ?: $this->endpoint ;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEndpoint(): ?string
    {
        return $this->endpoint;
    }

    /**
     * @param string $apiToken
     * @return $this
     */
    public function setApiToken(string $apiToken): self
    {
        $this->apiToken = $apiToken;
        return $this;
    }

    /**
     * @return string
     */
    public function getApiToken(): string
    {
        return $this->apiToken;
    }
}