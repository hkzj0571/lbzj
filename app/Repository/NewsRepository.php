<?php
namespace App\Repository;

use App\Models\News;

class NewsRepository implements Repository
{
    protected $model;

    public function __construct(News $news)
    {
        $this->model = $news;
    }

    public function selectAll()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

//    public function checkEmailUnique($email)
//    {
//        $resource = $this->model->where('email',$email)->get();
//        if (count($resource)) {
//            return true;
//        }
//        return false;
//    }

    public function create(Array $array)
    {
        return $this->model->create($array);
    }

    public function destroy($id)
    {
        return $this->model->destroy($id);
    }
    public function update($id, Array $array)
    {
        return $this->model->where('id',$id)->update($array);
    }
    public function paginate($int,$where = [])
    {
        return $this->model->orderBy('created_at', 'DESC')->where($where)->paginate($int);
    }
}