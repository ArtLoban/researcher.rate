<?php

namespace App\Utilities\Repository\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface MainRepository
{
    /**
     * @param array $params
     * @return mixed
     */
    public function create(array $params);

    /**
     * @return mixed
     */
    public function all();

    /**
     * @param array $relations
     * @return Collection|null
     */
    public function allWithRelations(array $relations): ?Collection;

    /**
     * @param int $id
     * @param array $relations
     * @return mixed
     */
    public function getWithRelationsById(int $id, array $relations);

    /**
     * @param string $column
     * @param $value
     * @param array $relations
     * @return mixed
     */
    public function getAllWithRelationsBy(string $column, $value, array $relations);

    /**
     * @param int $id
     * @return mixed
     */
    public function whereId(int $id);

    /**
     * @param string $column
     * @param string|null $operator
     * @param null $value
     * @param string $boolean
     * @return mixed
     */
    public function where(string $column, string $operator = null, $value = null, string $boolean = 'and');

    /**
     * @param int $id
     * @param array $params
     * @return mixed
     */
    public function updateById(int $id, array $params);

    /**
     * @param int $id
     * @return mixed
     */
    public function deleteById(int $id);

    /**
     * @param $model
     * @return mixed
     */
    public function delete($model);

    /**
     * @param string $name
     * @return mixed
     */
    public function getByName(string $name);
}