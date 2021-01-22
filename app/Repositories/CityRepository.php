<?php

namespace App\Repositories;

use App\City;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\CityContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class CityRepository
 *
 * @package \App\Repositories
 */
class CityRepository extends BaseRepository implements CityContract
{
    use UploadAble;

    /**
     * CityRepository constructor.
     * @param City $model
     */
    public function __construct(City $model)
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
    public function listCities(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findCityById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    /**
     * @param array $params
     * @return City|mixed
     */
    public function createCity(array $params)
    {
        try {
            $collection = collect($params);

            

            $featured = $collection->has('featured') ? 1 : 0;

            $merge = $collection->merge(compact('featured'));

            $city = new City($merge->all());

            $city->save();


            $image = null;
           
           if ($collection->has('background') && ($params['background'] instanceof  UploadedFile)) {
                 $city->addMedia($params['background'])
                   ->withResponsiveImages()
                   ->toMediaCollection('bgImage');
           }     
               

            if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {
                $city->addMedia($params['image'])
                ->withResponsiveImages()
                ->toMediaCollection('image');
            }
          

            return $city;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateCity(array $params)
    {
        $city = $this->findCityById($params['id']);

        $collection = collect($params)->except('_token');

        if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {

            $city->clearMediaCollection('image');
            $city->addMedia($params['image'])
                ->withResponsiveImages()
                ->toMediaCollection('image');
            
        }

         if ($collection->has('background') && ($params['background'] instanceof  UploadedFile)) {
            
            $city->clearMediaCollection('bgImage');
        
            $city->addMedia($params['background'])
                ->withResponsiveImages()
                ->toMediaCollection('bgImage');
            
        }

        $featured = $collection->has('featured') ? 1 : 0;

        $merge = $collection->merge(compact('featured'));

        $city->update($merge->all());

        return $city;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteCity($id)
    {
        $city = $this->findCityById($id);

        if ($city->image != null) {
            $this->deleteOne($city->image);
        }

        $city->delete();

        return $city;
    }

    /**
     * @return mixed
     */
    public function treeList()
    {
        return City::orderByRaw('-title ASC')
            ->get()
            ->nest()
            ->setIndent('|–– ')
            ->listsFlattened('title');
    }

    public function findBySlug($slug)
    {
        return City::with('children')
            ->with('banners')
            ->where('slug', $slug)
            ->first();
    }
}
