<?php

namespace App\Contracts;

/**
 * Interface FacilityContract
 * @package App\Contracts
 */
interface FacilityContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listFacilities(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findFacilityById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createFacility(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateFacility(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteFacility($id);

    /**
     * @param $slug
     * @return mixed
     */
    public function findBySlug($slug);
}
