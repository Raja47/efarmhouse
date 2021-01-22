<?php

namespace App\Contracts;

/**
 * Interface FarmhouseContract
 * @package App\Contracts
 */
interface FarmhouseContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listFarmhouses(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findFarmhouseById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createFarmhouse(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateFarmhouse(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteFarmhouse($id);

    /**
     * @param $slug
     * @return mixed
     */
    public function findFarmhouseBySlug($slug);
}
