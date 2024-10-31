<?php

namespace App\Repositories;


trait Eloquent
{
    /**
     * The connection name for the model.
     *
     * @var \Illuminate\Database\Eloquent\Model $model
     */
    protected $model;

    /**
     * Find resource by given column
     * @param string $field
     * @param $value
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findBy(string $field, $value, array $columns = ['*'])
    {
        return $this->model->where($field, $value)->first($columns);
    }
}
