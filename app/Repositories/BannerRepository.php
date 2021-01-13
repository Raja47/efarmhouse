<?php

namespace App\Repositories;

use App\Models\Banner;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\BannerContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class CategoryRepository
 *
 * @package \App\Repositories
 */
class BannerRepository extends BaseRepository implements BannerContract
{
    use UploadAble;

    /**
     * CategoryRepository constructor.
     * @param Brand $model
     */
    public function __construct(Banner $model)
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
    public function listBanners(string $order = 'sort_at', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findBannerById(int $id)
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
    public function createBanner(array $params)
    {
        try {
            $collection = collect($params);

            $banner = null;

            if ( $collection->has('banner') && ($params['banner'] instanceof  UploadedFile)) {
                $banner = $this->uploadOne($params['banner'], 'banners');
            }

            $merge = $collection->merge(compact('banner'));

            $new_banner= new Banner( $merge->all() );
            
            $new_banner->save();
            
            return $new_banner;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateBanner(array $params)
    {
        $new_banner = $this->findBannerById($params['id']);

        $collection = collect($params)->except('_token');

        if ( $collection->has('banner') && ( $params['banner'] instanceof  UploadedFile)) {

            if ( $new_banner->banner != null ) {
                $this->deleteOne($new_banner->banner);
            }

            $banner = $this->uploadOne($params['banner'], 'banners');
            $collection = $collection->merge(compact('banner'));
        }

        $status = $collection->has('status') ? 1 : 0;

        $collection = $collection->merge(compact('status'));
        
         
        $new_banner->update($collection->all());

        return $new_banner;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteBanner($id)
    {
        $banner = $this->findBannerById($id);

        if ($banner->banner != null) {
            $this->deleteOne($banner->banner);
        }

        $banner->delete();

        return $banner;
    }
}
