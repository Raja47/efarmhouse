<?php

namespace App\Repositories;

use App\Models\CouponAndDeal;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\CouponAndDealContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class CategoryRepository
 *
 * @package \App\Repositories
 */
class CouponAndDealRepository extends BaseRepository implements CouponAndDealContract
{
    use UploadAble;

    /**
     * CategoryRepository constructor.
     * @param Brand $model
     */
    public function __construct(CouponAndDeal $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listCouponAndDeals(string $couponAndDeal = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $couponAndDeal, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findCouponAndDealById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    /**
     * @param array $params
     * @return Brand|mixed
     */
    public function createCouponAndDeal(array $params)
    {
        try {
            $collection = collect($params);

            $status = $collection->has('status') ? 1 : 0;

            $banner = null;

            if ( $collection->has('banner') && ($params['banner'] instanceof  UploadedFile)) {
                $banner = $this->uploadOne($params['banner'], 'coupon_and_deals');

            }
           
            $merge = $collection->merge( compact('banner','status') );
            
            $new_couponAndDeal = new CouponAndDeal( $merge->all() );
            
            $new_couponAndDeal->save();
            
            return $new_couponAndDeal;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateCouponAndDeal(array $params)
    {
        $new_couponAndDeal = $this->findCouponAndDealById($params['id']);

        $collection = collect($params)->except('_token');

        if ( $collection->has('banner') && ( $params['banner'] instanceof  UploadedFile)) {

            if ( $new_couponAndDeal->banner != null ) {
                $this->deleteOne($new_couponAndDeal->banner);
            }

            $banner = $this->uploadOne($params['banner'], 'coupon_and_deals');
            $collection = $collection->merge(compact('banner'));
        }

        $status = $collection->has('status') ? 1 : 0;

        $collection = $collection->merge(compact('status'));
        
         
        $new_couponAndDeal->update($collection->all());

        return $new_couponAndDeal;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteCouponAndDeal($id)
    {
        $couponAndDeal = $this->findCouponAndDealById($id);

        if ($couponAndDeal->couponAndDeal != null) {
            $this->deleteOne($couponAndDeal->couponAndDeal);
        }

        $couponAndDeal->delete();

        return $couponAndDeal;
    }
}
