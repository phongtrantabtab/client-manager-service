<?php

namespace App\Contracts\Repositories;

interface BaseRepositoryInterface
{
    /**
     * Create query
     */
    public function query(): mixed;

    /**
     * Get all
     */
    public function all(): mixed;

    /**
     * Get one
     */
    public function find($id): mixed;

    /**
     * Create
     */
    public function create(array $attributes = []): mixed;

    /**
     * Update
     */
    public function update($id, array $attributes = []): mixed;

    /**
     * Soft Delete
     *
     * @return false|mixed
     */
    public function softDelete($id): mixed;

    /**
     * Delete
     */
    public function delete($id): mixed;

    /**
     * Find first with relationship
     */
    public function findOneWithRelation(array $conditions = [], array $relations = []): ?object;
}
