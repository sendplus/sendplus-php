<?php


namespace Sendplus\Api;


class Contact extends RequestApi
{
    /**
     * @param int|null $page
     * @return mixed
     */
    public function all(int $page=1)
    {
        return $this->request->get(sprintf('contacts?page=%s', $page));
    }

    /**
     * @param string $id
     * @return mixed
     */
    public function get(string $id)
    {
        return $this->request->get(sprintf('contacts/%s', $id));
    }

    /**
     * @param array $arguments
     * @return mixed
     */
    public function create(array $arguments)
    {
        return $this->request->post(sprintf('contacts'), [
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
        return $this->request->put(sprintf('contacts/%s', $id), [
            'json' => $arguments
        ]);
    }

    /**
     * @param string $id
     * @return mixed
     */
    public function delete(string $id)
    {
        return $this->request->delete(sprintf('contacts/%s', $id));
    }
}