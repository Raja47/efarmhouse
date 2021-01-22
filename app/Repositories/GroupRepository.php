<?php

namespace App\Repositories;

use App\Group;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\GroupContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class GroupRepository
 *
 * @package \App\Repositories
 */
class GroupRepository extends BaseRepository implements GroupContract
{
    use UploadAble;

    /**
     * GroupRepository constructor.
     * @param Group $model
     */
    public function __construct(Group $model)
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
    public function listGroups(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findGroupById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    /**
     * @param array $params
     * @return Group|mixed
     */
    public function createGroup(array $params)
    {
        try {
            $collection = collect($params);

            $featured = $collection->has('featured') ? 1 : 0;

            $merge = $collection->merge(compact('featured'));

            $group = new Group($merge->all());

            $group->save();


            $image = null;
           
           if ($collection->has('background') && ($params['background'] instanceof  UploadedFile)) {
                 $group->addMedia($params['background'])
                   ->withResponsiveImages()
                   ->toMediaCollection('bgImage');
           }     
               

            if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {
                $group->addMedia($params['image'])
                ->withResponsiveImages()
                ->toMediaCollection('image');
            }
          

            return $group;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateGroup(array $params)
    {
        $group = $this->findGroupById($params['id']);

        $collection = collect($params)->except('_token');

        if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {

            $group->clearMediaCollection('image');
            $group->addMedia($params['image'])
                ->withResponsiveImages()
                ->toMediaCollection('image');
            
        }

         if ($collection->has('background') && ($params['background'] instanceof  UploadedFile)) {
            
            $group->clearMediaCollection('bgImage');
        
            $group->addMedia($params['background'])
                ->withResponsiveImages()
                ->toMediaCollection('bgImage');
            
        }

        $featured = $collection->has('featured') ? 1 : 0;

        $merge = $collection->merge(compact('featured'));

        $group->update($merge->all());

        return $group;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteGroup($id)
    {
        $group = $this->findGroupById($id);

        if ($group->image != null) {
            $this->deleteOne($group->image);
        }

        $group->delete();

        return $group;
    }

    /**
     * @return mixed
     */
    public function treeList()
    {
        return Group::orderByRaw('-title ASC')
            ->get()
            ->nest()
            ->setIndent('|–– ')
            ->listsFlattened('title');
    }

    public function findBySlug($slug)
    {
        return Group::with('children')
            ->with('banners')
            ->where('slug', $slug)
            ->first();
    }
}
