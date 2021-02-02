<?php

namespace App\Repositories;

use App\Facility;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\FacilityContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class FacilityRepository
 *
 * @package \App\Repositories
 */
class FacilityRepository extends BaseRepository implements FacilityContract
{
    use UploadAble;

    /**
     * FacilityRepository constructor.
     * @param Facility $model
     */
    public function __construct(Facility $model)
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
    public function listFacilities(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findFacilityById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    /**
     * @param array $params
     * @return Facility|mixed
     */
    public function createFacility(array $params)
    {
        try {
            $collection = collect($params);

            

            $featured = $collection->has('featured') ? 1 : 0;

            $merge = $collection->merge(compact('featured'));

            $facility = new Facility($merge->all());

            $facility->save();


            $image = null;
           
               

            if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {
                $facility->addMedia($params['image'])
                ->withResponsiveImages()
                ->toMediaCollection('image');
            }
          

            return $facility;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateFacility(array $params)
    {
        $facility = $this->findFacilityById($params['id']);

        $collection = collect($params)->except('_token');

        if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {

            $facility->clearMediaCollection('image');
            $facility->addMedia($params['image'])
                ->withResponsiveImages()
                ->toMediaCollection('image');
            
        }


        $featured = $collection->has('featured') ? 1 : 0;

        $merge = $collection->merge(compact('featured'));

        $facility->update($merge->all());

        return $facility;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteFacility($id)
    {
        $facility = $this->findFacilityById($id);

        if ($facility->image != null) {
            $this->deleteOne($facility->image);
        }

        $facility->delete();

        return $facility;
    }

   

    public function findBySlug($slug)
    {
        return Facility::with('children')
            ->with('banners')
            ->where('slug', $slug)
            ->first();
    }
}
