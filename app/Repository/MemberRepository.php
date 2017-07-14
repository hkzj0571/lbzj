<?php
namespace App\Repository;

use App\Models\Member;

class MemberRepository implements Repository
{
    protected $model;

    public function __construct(Member $member)
    {
        $this->model = $member;
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
        return $this->model->where($where)->paginate($int);
    }
}