<?php


namespace App\Http\Services;


use Illuminate\Database\Eloquent\Collection;

abstract class BaseService
{
    /**
     * @var Application
     */
    public $model;

    /**
     * BaseService constructor.
     */
    public function __construct()
    {
        $this->model = app($this->model());
    }
    /**
     * @return mixed
     */
    public function query()
    {
        return $this->model->query();
    }

    /**
     * @return mixed
     */
    public function truncate() {
        return $this->model->truncate();
    }

    /**
     * @return mixed
     */
    public function all() {
        return $this->model->all();
    }

    /**
     * @param $insertData
     * @return Collection|Model|null
     */
    public function create($insertData)
    {
        return $this->model->create($insertData);
    }
    /**
     * @return mixed
     */
    public abstract  function model();
}
