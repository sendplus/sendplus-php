<?php


namespace Sendplus\Api;


class Campaign extends RequestApi
{
    /**
     * @param int|null $page
     * @return mixed
     */
    public function all(int $page=1)
    {
        return $this->request->get(sprintf('campaigns?page=%s', $page));
    }

    /**
     * @param string $id
     * @return mixed
     */
    public function get(string $id)
    {
        return $this->request->get(sprintf('campaigns/%s', $id));
    }

    /**
     * @param array $arguments
     * @return mixed
     */
    public function create(array $arguments)
    {
        return $this->request->post('campaigns', [
            'json' => $arguments
        ]);

    }

    /**
     * @param string $id
     * @param array $arguments
     * @return mixed
     */
    public function update(string $id, array $arguments)
    {
        return $this->request->put(sprintf('campaigns/%s', $id), [
            'json' => $arguments
        ]);
    }

    /**
     * @param string $id
     * @return mixed
     */
    public function archive(string $id)
    {
        return $this->request->post(sprintf('campaigns/%s/archive', $id));
    }

    /**
     * @param array $arguments
     * @return mixed
     */
    public function test(array $arguments)
    {
        return $this->request->post('campaigns/test', [
            'json' => $arguments
        ]);
    }
}