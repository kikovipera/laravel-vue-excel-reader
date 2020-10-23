<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class Repository implements RepositoryInterface
{
    /**
     * model property on class instances
     *
     * @var Model
     */
    protected $model;

    /**
     * Constructor to bind model to repository
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Get all instances of model
     *
     * @return Collection
     */
    public function all()
    {
        return $this->model->get();
    }

    /**
     * Get paginate instances of model
     *
     * @return Model
     */
    public function paginate()
    {
        return $this->model->paginate(15);
    }

    /**
     * create a new record in the database
     *
     * @param array $data
     * @return Model
     */
    public function create($data)
    {
        return $this->model->create($data);
    }

    /**
     * update record in the database
     *
     * @param array $data
     * @param int $id
     * @return Model
     */
    public function update($data, $id)
    {
        $record = $this->model->findOrFail($id);
        $record->update($data);
        return $record;
    }

    /**
     * remove record from the database
     *
     * @param int $id
     * @return bool
     */
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    /**
     * show the record with the given id
     *
     * @param int $id
     * @return Model
     */
    public function show($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Get the associated model
     *
     * @return Model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set the associated model
     *
     * @param Model $model
     * @return Model
     */
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    /**
     * Eager load database relationships
     *
     * @param string $relations
     * @return void
     */
    public function with($relations)
    {
        return $this->model->with($relations);
    }
}
