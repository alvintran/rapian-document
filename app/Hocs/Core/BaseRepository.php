<?php

namespace Nht\Hocs\Core;

use Nht\Http\Requests\Request;

/**
 * An abstract class for repository.
 *
 * @author	AlvinTran
 */
abstract class BaseRepository
{
	/**
	 * Get all items of model
	 * @return Illuminate\Support\Collection Model collections
	 */
	public function getAll()
	{
		return $this->model->all();
	}

	/**
	 * Get item of model. If model not exist then it will throw an exception
	 * @param  int $id Model ID
	 * @return Model
	 */
	public function getById($id)
	{
		return $this->model->findOrFail($id);
	}

	/**
	 * Get item of model
	 * @param  int $id Model ID
	 * @return Model
	 */
	public function find($id)
	{
		return $this->model->find($id);
	}

	/**
	 * Get items with filter & paginate
	 * @param  array  $filter
	 * @param  integer $pageSize
	 * @return Illuminate\Support\Collection Model collections
	 */
	public function getAllWithPaginate($filter = [], $pageSize = 20)
	{
		if ( ! empty($filter))
		{
			foreach ($filter as $key => $value)
			{
				if ($value == '')
				{
					unset($filter[$key]);
				}
			}
			return $this->model->where($filter)->paginate($pageSize);
		}
		return $this->model->paginate($pageSize);
	}

	/**
	 * Get items with filter LIKE, paginate and sort
	 * @param  array  $filter
	 * @param  integer $pageSize
	 * @param  array $sort
	 * @return Illuminate\Support\Collection Model collections
	 */
	public function getWithFilter($filter = [], $where = [], $betwen = [], $sort = [], $pageSize = 20)
	{
		$return = $this->model;
		if ( ! empty($filter))
		{
			foreach ($filter as $key => $value)
			{
				if ($value == '')
				{
					unset($filter[$key]);
				} else {
					$return = $return->where($key, 'LIKE', '%'.$value.'%');
				}
			}
		}

		if ( ! empty($where))
		{
			foreach ($where as $key => $value)
			{
				if ($value == '')
				{
					unset($where[$key]);
				}
			}
			$return = $return->where($where);
		}

		if ( ! empty($betwen)) {
			foreach ($betwen as $key => $value) {
				if ($value == '' || $key == '') {
					unset($betwen[$key]);
				} else {
					$return = $return->whereBetween($key, $value);
				}
			}
		}
		if ( ! empty($sort))
		{
			foreach ($sort as $key => $value)
			{
				if ($value == '' || $key == '')
				{
					unset($filter[$key]);
				} else {
					$return = $return->orderBy($key, $value);break;
				}
			}
		}
		return $return->paginate($pageSize);
	}

	/**
	 * Create a new model
	 * @param  array $attributes
	 * @return Bool
	 */
	public function create($attributes)
	{
		return $this->model->create($attributes);
	}

	/**
	 * Update an exitst model
	 * @param  array $attributes
	 * @param  array $condition
	 * @return Bool
	 */
	public function update($attributes, $condition = [])
	{
		if ( ! empty($condition))
		{
			return $this->model->where($condition)->update($attributes);
		}
		return $this->model->update($attributes);
	}

	/**
	 * Delete an exist model
	 * @return Bool
	 */
	public function delete($id)
	{
		$user = $this->getById($id);
		return $user->delete();
	}

	public function getInstance() {
		return new $this->model;
	}
}
