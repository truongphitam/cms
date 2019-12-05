<?php
/**
 * Created by PhpStorm.
 * User: PhiTam
 * Date: 11/25/18
 * Time: 10:38 PM
 */

namespace App\Repository;

use App\Models\Products;
use Illuminate\Support\Str;


class ProductsRepository
{
    protected $_model;

    public function __construct(Products $model)
    {
        $this->_model = $model;
    }

    public function getAll()
    {
        return $this->_model->orderBy('id', 'desc')->get();
    }

    public function getPublish($columns = ['*'])
    {
        return $this->_model->where('is_published', 'on')->orderBy('id', 'desc')->get($columns);
    }

    public function paginate($limit = null, $columns = ['*'])
    {
        $limit = is_null($limit) ? env('POST_LIMIT', 12) : $limit;

        return $this->model->paginate($limit, $columns);
    }

    public function create(array $param)
    {
        $data = $this->_model->create($param);
        return $data->id;
    }

    public function find($id)
    {
        return $this->_model->find($id);
    }

    public function findSlug($slug, $columns = ['*'])
    {
        return $this->_model->where('slug', $slug)->first($columns);
    }

    public function update($id, array $param)
    {
        $data = $this->_model->find($id)->update($param);
        return $data;
    }

    public function destroy($id)
    {
        $data = $this->_model->find($id);
        if ($data) {
            $data->categories()->detach($id);
            $data->delete();
            return true;
        } else {
            return false;
        }
    }

    public function generateSlug($slug, $id = 0)
    {
        $slug = Str::slug($slug);
        $count = $this->_model->where('slug', $slug);
        if ($id > 0) {
            $count = $count->where('id', '!=', $id);
        }
        $count = $count->count();
        if ($count > 0) {
            $slug = $slug . '-' . generateRandomString(6);
        }
        return $slug;
    }
}