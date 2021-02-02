<?php

namespace App\Contracts;

/**
 * Interface GroupContract
 * @package App\Contracts
 */
interface GroupContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listGroups(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findGroupById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createGroup(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateGroup(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteGroup($id);

    /**
     * @return mixed
     */
    public function treeList();

    /**
     * @param $slug
     * @return mixed
     */
    public function findBySlug($slug);
}
