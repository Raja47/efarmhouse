<?php

namespace App\Repositories;

use App\Models\Zone;
use App\Contracts\ZoneContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

class ZoneRepository extends BaseRepository implements ZoneContract
{
    /**
     * AttributeRepository constructor.
     * @param Attribute $model
     */
    public function __construct(Zone $model)
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
    public function listZones(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findZoneById(int $id)
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
    public function createZone(array $params)
    {
        try {
            $collection = collect($params);

            $status = $coltatuslection->has('status') ? 1 : 0;

            $merge = $collection->merge(compact('status'));

            $zone = new Zone($merge->all());

            $zone->save();

            return $zone;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateZone(array $params)
    {
        $zone = $this->findAttributeById($params['id']);

        $collection = collect($params)->except('_token');

        $status = $collection->has('status') ? 1 : 0;

        $merge = $collection->merge(compact('status'));

        $zone->update($merge->all());

        return $attribute;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteZone($id)
    {
        $zone = $this->findZoneById($id);

        $zone->delete();

        return $zone;
    }
}
