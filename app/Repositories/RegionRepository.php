<?php

namespace App\Repositories;

use App\Models\Region;
use App\Contracts\RegionContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

class RegionRepository extends BaseRepository implements RegionContract
{
    /**
     * AttributeRepository constructor.
     * @param Attribute $model
     */
    public function __construct(Region $model)
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
    public function listRegions(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findRegionById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    /**
     * @param array $params
     * @return Category|mixed
     */
    public function createRegion(array $params)
    {
        try {
            $collection = collect($params);

            $status = $coltatuslection->has('status') ? 1 : 0;

            $merge = $collection->merge(compact('status'));

            $region = new Region($merge->all());

            $region->save();

            return $region;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateRegion(array $params)
    {
        $region = $this->findAttributeById($params['id']);

        $collection = collect($params)->except('_token');

        $status = $collection->has('status') ? 1 : 0;

        $merge = $collection->merge(compact('status'));

        $region->update($merge->all());

        return $attribute;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteRegion($id)
    {
        $region = $this->findRegionById($id);

        $region->delete();

        return $Region;
    }
}
