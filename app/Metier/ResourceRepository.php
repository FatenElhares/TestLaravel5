<?php

namespace App\Metier;

abstract class ResourceRepository
{

    protected $model;

    public function getPaginate($n)
    {
        return $this->model->paginate($n);
    }

    public function store(Array $inputs)
    {
        return $this->model->create($inputs);
    }

    public function getById($id)
    {
        return $this->model->find($id);
    }

    public function update($id, Array $inputs)
    {
        $this->getById($id)->update($inputs);
    }

    public function destroy($id)
    {
        $this->getById($id)->delete();
    }

    public function getAll()
    {
        return $this->model->all();
    }


}
