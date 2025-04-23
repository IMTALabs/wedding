<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface IBaseRepository
{
    /**
     * Get all models.
     *
     * @param  array  $columns
     * @param  array  $relations
     * @return \Illuminate\Support\Collection
     */
    public function all(array $columns = ['*'], array $relations = []): Collection;

    /**
     * Get all paginated models.
     *
     * @param  int  $perPage
     * @param  array  $columns
     * @param  array  $relations
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function paginate(int $perPage = 15, array $columns = ['*'], array $relations = []);

    /**
     * Find a model by its primary key.
     *
     * @param  mixed  $id
     * @param  array  $columns
     * @param  array  $relations
     * @param  array  $appends
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function find(mixed $id, array $columns = ['*'], array $relations = [], array $appends = []);

    /**
     * Find a model by its primary key or throw an exception.
     *
     * @param  mixed  $id
     * @param  array  $columns
     * @param  array  $relations
     * @param  array  $appends
     * @return \Illuminate\Database\Eloquent\Model
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findOrFail(mixed $id, array $columns = ['*'], array $relations = [], array $appends = []);

    /**
     * Create a new model.
     *
     * @param  array  $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $data): Model;

    /**
     * Update an existing model.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  array  $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update(Model $model, array $data): Model;

    /**
     * Delete a model.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return bool|null
     */
    public function delete(Model $model): ?bool;

    /**
     * Find a model by a specific column and value.
     *
     * @param  string  $field
     * @param  mixed  $value
     * @param  array  $columns
     * @param  array  $relations
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function findBy(string $field, mixed $value, array $columns = ['*'], array $relations = []);

    /**
     * Find a model by a specific column and value or throw an exception.
     *
     * @param  string  $field
     * @param  mixed  $value
     * @param  array  $columns
     * @param  array  $relations
     * @return \Illuminate\Database\Eloquent\Model
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findByOrFail(string $field, mixed $value, array $columns = ['*'], array $relations = []);
}
