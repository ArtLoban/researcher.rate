<?php

namespace App\Utilities\Repository;

use Closure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use App\Utilities\Repository\Interfaces\MainRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

abstract class RepositoryAbstract implements MainRepository
{
    /**
     * @var string
     */
    protected $className;

    /**
     * RepositoryAbstract constructor.
     */
    public function __construct()
    {
        $this->className = $this->getClassName();
    }

    /**
     * @return string
     */
    abstract protected function getClassName(): string;

    /**
     * @param array $params
     * @return mixed
     */
    public function create(array $params)
    {
        return $this->className::create($params);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function insert(array $data)
    {
        return $this->className::insert($data);
    }

    /**
     * @return Collection|null
     */
    public function all(): ?Collection
    {
        return $this->className::all();
    }

    /**
     * @param $relations
     * @return mixed
     */
    public function with($relations)
    {
        return $this->className::with($relations);
    }

    /**
     * @param string $column
     * @param null $key
     * @return Collection|null
     */
    public function pluck(string $column, $key = null): ?Collection
    {
        return $this->className::pluck($column, $key = null);
    }

    /**
     * @param string $relation
     * @param string $operator
     * @param int $count
     * @param string $boolean
     * @param Closure|null $callback
     * @return mixed
     */
    public function has(string $relation, string $operator = '>=', int $count = 1, string $boolean = 'and', Closure $callback = null)
    {
        return $this->className::has($relation, $operator = '>=', $count = 1, $boolean = 'and', $callback = null);
    }

    /**
     * @param string $relation
     * @param Closure|null $callback
     * @param string $operator
     * @param int $count
     * @return mixed
     */
    public function whereHas(string $relation, Closure $callback = null, string $operator = '>=', int $count = 1)
    {
        return $this->className::whereHas($relation, $callback = null, $operator = '>=', $count = 1);
    }

    /**
     * @param int $id
     * @param array $relations
     * @return mixed
     */
    public function getWithRelationsById(int $id, array $relations)
    {
        return $this->className::with($relations)->whereId($id)->first();
    }

    /**
     * @param array $relations
     * @return Collection|null
     */
    public function allWithRelations(array $relations): ?Collection
    {
        return $this->className::with($relations)->get();
    }

    /**
     * @param string $column
     * @param $value
     * @param array $relations
     * @return mixed
     */
    public function getAllWithRelationsBy(string $column, $value, array $relations)
    {
        return $this->className::where($column, $value)->with($relations)->get();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function whereId(int $id)
    {
        return $this->className::whereId($id)->firstOrFail();
    }

    /**
     * @return mixed
     */
    public function where(string $column, string $operator = null, $value = null, string $boolean = 'and')
    {
        return $this->className::where($column, $operator, $value, $boolean);
    }

    /**
     * @param int $id
     * @param array $params
     * @return Model
     */
    public function updateById(int $id, array $params)
    {
        $model = $this->whereId($id); // firstOrFail

//        if (! $model) {
//            throw new ModelNotFoundException();
//        }

        $model->update($params);

        return $model;
    }

    /**
     * @param int $id
     * @return mixed
     * @throws \Exception
     */
    public function deleteById(int $id)
    {
        $model = $this->whereId($id);

        if (! $model) {
            throw new ModelNotFoundException();
        }

        return $this->delete($model);
    }

    /**
     * @param $model
     * @return mixed
     */
    public function delete($model)
    {
        return $model->delete();
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function getByName(string $name)
    {
        return $this->className::where('name', $name)->first();
    }
}
