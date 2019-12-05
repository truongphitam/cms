<?php
/**
 * Created by PhpStorm.
 * User: PhiTam
 * Date: 11/25/18
 * Time: 10:38 PM
 */

namespace App\Repository;

use App\Models\Admins;
use Illuminate\Support\Str;


class MemberRepository
{
    protected $_model;

    public function __construct(Admins $model)
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
        return $this->_model->findOrFail($id);
    }

    public function findSlug($slug, $columns = ['*'])
    {
        return $this->_model->where('slug', $slug)->firstOrFail($columns);
    }

    public function update($id, array $param)
    {
        $data = $this->_model->findOrFail($id)->update($param);
        return $data;
    }

    public function destroy($id)
    {
        $data = $this->_model->find($id);
        if ($data) {
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

    public function checkEmail($email = '')
    {
        if (!empty($email)) {
            $email = $this->_model->where('email', $email)->count();
            if ($email > 0) {
                return false;
            } else {
                return true;
            }
        }
        return false;
    }
}