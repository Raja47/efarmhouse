<?php

namespace App\Contracts;

/**
 * Interface BrandContract
 * @package App\Contracts
 */
interface ZoneContract
{
    

    /**
     * @param array $params
     * @return mixed
     */
    public function createZone(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateZone(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteZone($id);
}
