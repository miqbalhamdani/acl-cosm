<?php namespace App\Repositories;

abstract class AbstractRepository {
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function get()
    {
        return $this->model->get();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function where($column, $id)
    {
        $query = $this->model->where($column, $id)->get();

        return $query;
    }

    public function update($id, array $data)
    {
        $query = $this->model->find($id);

        return $query->update($data);
    }

    public function destroy($id)
    {
        return $this->model->destroy($id);
    }
}
