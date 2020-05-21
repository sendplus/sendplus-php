<?php


namespace Sendplus\Api;

class MailingList extends RequestApi
{

    /**
     * @param int|null $page
     * @return mixed
     */
    public function all(int $page=1)
    {
        return $this->request->get(sprintf('lists?page=%s', $page));
    }
    /**
     * @param string $id
     * @return mixed
     */
    public function get(string $id)
    {
        return $this->request->get(sprintf('lists/%s', $id));
    }

    /**
     * @param array $arguments
     * @return mixed
     */
    public function create(array $arguments)
    {
        return $this->request->post('lists', [
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
        return $this->request->put(sprintf('lists/%s', $id), [
            'json' => $arguments
        ]);
    }

    /**
     * @param string $id
     * @return mixed
     */
    public function delete(string $id)
    {
        return $this->request->delete(sprintf('lists/%s', $id));
    }

}