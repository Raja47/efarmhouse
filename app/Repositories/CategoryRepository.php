<?php

namespace App\Repositories;

use App\Category;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\CategoryContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class CategoryRepository
 *
 * @package \App\Repositories
 */
class CategoryRepository extends BaseRepository implements CategoryContract
{
    use UploadAble;

    /**
     * CategoryRepository constructor.
     * @param Category $model
     */
    public function __construct(Category $model)
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
    public function listCategories(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findCategoryById(int $id)
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
    public function createCategory(array $params)
    {
        try {
            $collection = collect($params);

            

            $featured = $collection->has('featured') ? 1 : 0;
            $featured = $collection->has('status') ? 1 : 0;

            $merge = $collection->merge(compact('status','featured'));

            $category = new Category($merge->all());

            $category->save();


           $image = null;
           
           if ($collection->has('background') && ($params['background'] instanceof  UploadedFile)) {
                 $category->addMedia($params['background'])
                   ->withResponsiveImages()
                   ->toMediaCollection('bgImage');
           }     
               

            if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {
                $category->addMedia($params['image'])
                ->withResponsiveImages()
                ->toMediaCollection('image');
            }
          

            return $category;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateCategory(array $params)
    {
        $category = $this->findCategoryById($params['id']);

        $collection = collect($params)->except('_token');

        if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {

            $category->clearMediaCollection('image');
            $category->addMedia($params['image'])
                ->withResponsiveImages()
                ->toMediaCollection('image');
            
        }

        if ($collection->has('background') && ($params['background'] instanceof  UploadedFile)) {
            
            $category->clearMediaCollection('bgImage');
        
            $category->addMedia($params['background'])
                ->withResponsiveImages()
                ->toMediaCollection('bgImage');
            
        }

        
        
        

        $featured = $collection->has('featured') ? 1 : 0;

        $merge = $collection->merge(compact('featured'));

        $category->update($merge->all());

        return $category;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteCategory($id)
    {
        $category = $this->findCategoryById($id);

        if ($category->image != null) {
            $this->deleteOne($category->image);
        }

        $category->delete();

        return $category;
    }

    /**
     * @return mixed
     */
    public function treeList()
    {
        return Category::orderByRaw('-title ASC')
            ->get()
            ->nest()
            ->setIndent('|–– ')
            ->listsFlattened('title');
    }

    public function findBySlug($slug)
    {
        return Category::with('children')
            ->with('banners')
            ->where('slug', $slug)
            ->first();
    }
}
