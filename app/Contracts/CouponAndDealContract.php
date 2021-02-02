<?php

namespace App\Contracts;

/**
 * Interface BrandContract
 * @package App\Contracts
 */
interface CouponAndDealContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listCouponAndDeals(string $coupon = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findCouponAndDealById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createCouponAndDeal(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateCouponAndDeal(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteCouponAndDeal($id);
}
