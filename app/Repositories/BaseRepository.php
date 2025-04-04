<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Container\BindingResolutionException;
use App\Contracts\Repositories\BaseRepositoryInterface;
use Carbon\Carbon;
abstract class BaseRepository implements BaseRepositoryInterface
{
    /**
     * Model
     */
    protected Model $model;

    /**
     * Constructor
     *
     * @throws BindingResolutionException
     */
    public function __construct()
    {
        $this->setModel();
    }

    /**
     * Create query
     */
    public function query(): Builder
    {
        return $this->model->newQuery();
    }

    /**
     * Get model
     */
    abstract public function getModel(): mixed;

    /**
     * Set model
     *
     * @throws BindingResolutionException
     */
    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    /**
     * Get all
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    /**
     * Find by id
     */
    public function find($id): mixed
    {
        return $this->model->find($id);
    }

    /**
     * find first
     */
    public function whereFirst($conditions): ?object
    {
        return $this->model->newQuery()->where($conditions)->first();
    }

    /**
     * find all by where
     */
    public function where($conditions): Collection|array
    {
        return $this->model->newQuery()->where($conditions)->get();
    }

    /**
     * Create
     */
    public function create(array $attributes = []): mixed
    {
        $attributes['created_by'] = auth()->user()->id ?? null;

        return $this->model->create($attributes);
    }

    /**
     * Insert data
     */
    public function insert($data): bool
    {
        return $this->model->newQuery()->insert($data);
    }

    /**
     * Insert get id
     */
    public function insertGetId(array $attributes = []): int
    {
        return $this->model->newQuery()->insertGetId($attributes);
    }

    /**
     * Update
     *
     * @return false|mixed
     */
    public function update($id, array $attributes = []): mixed
    {
        $attributes['updated_by'] = auth()->user()->id ?? null;
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);

            return $result;
        }

        return false;
    }

    /**
     * Soft Delete
     *
     * @return false|mixed
     */
    public function softDelete($id): mixed
    {
        $attributes['deleted_by'] = auth()->user()->id ?? null;
        $attributes = [
            'deleted_by' => auth()->user()->id ?? null,
            'deleted_at' => Carbon::now(),
        ];
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);

            return $result;
        }

        return false;
    }

    /**
     * Delete
     */
    public function delete($id): bool
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }

    /**
     * Find first with relationship
     */
    public function findOneWithRelation(array $conditions = [], array $relations = []): ?object
    {
        return $this->model->newQuery()
            ->with($relations)
            ->where($conditions)
            ->first();
    }
}
