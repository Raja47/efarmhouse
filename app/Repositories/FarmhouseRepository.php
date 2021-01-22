<?php

namespace App\Repositories;

use App\Farmhouse;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\FarmhouseContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Image;
/**
 * Class FarmhouseRepository
 *
 * @package \App\Repositories
 */
class FarmhouseRepository extends BaseRepository implements FarmhouseContract
{
    use UploadAble;

    /**
     * FarmhouseRepository constructor.
     * @param Farmhouse $model
     */
    public function __construct(Farmhouse $model)
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
    public function listFarmhouses(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findFarmhouseById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    /**
     * @param array $params
     * @return Farmhouse|mixed
     */
    public function createFarmhouse(array $params)
    {
        try {
            $collection = collect($params);

            $featured = $collection->has('featured') ? 1 : 0;
            $status = $collection->has('status') ? 1 : 0;

            $merge = $collection->merge(compact('status', 'featured'));

            $farmhouse = new Farmhouse($merge->all());

            $farmhouse->save();

            if ($collection->has('categories')) {
                $farmhouse->categories()->sync($params['categories']);
            }
            return $farmhouse;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateFarmhouse(array $params)
    {
        $farmhouse = $this->findFarmhouseById($params['farmhouse_id']);

        $collection = collect($params)->except('_token');

        $featured = $collection->has('featured') ? 1 : 0;
        $status = $collection->has('status') ? 1 : 0;

        $merge = $collection->merge(compact('status', 'featured'));

        $farmhouse->update($merge->all());

        if ($collection->has('categories')) {
            $farmhouse->categories()->sync($params['categories']);
        }

        return $farmhouse;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteFarmhouse($id)
    {
        $farmhouse = $this->findFarmhouseById($id);

        $farmhouse->delete();

        return $farmhouse;
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function findFarmhouseBySlug($slug)
    {
        $farmhouse = Farmhouse::where('slug', $slug)->first();

        return $farmhouse;
    }
}
