<?php namespace Xtwoend\News\Categories\Repositories;
    	
/**
 * Part of the package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.  It is also available at
 * the following URL: http://www.opensource.org/licenses/BSD-3-Clause
 *
 * @package    
 * @version    0.1
 * @author     Abdul Hafidz Anshari
 * @license    BSD License (3-clause)
 * @copyright  (c) 2014 
 */

use Xtwoend\News\Categories\CategoryInterface;
use Illuminate\Database\Eloquent\Model;
use Xtwoend\News\Entities\AbstractRepository;

class CategoryRepository extends AbstractRepository implements CategoryInterface  {	
	
	/**
	 * model 
	 */
	protected $model;

	/**
	 * 
	 * @params
	 */	
	public function __construct(Model $model)
	{
		$this->model = $model;
	}

	/**
	 * @doc
	 * 
	 */
	public function getModel()
	{
		return $this->model;
	}

	/**
	 * @doc
	 * 
	 */
	public function setModel(Model $model)
	{
		$this->model = $model;
	}
	
	/**
	 * @doc
	 * 
	 */
	public function create(array $attributes = array())
	{
		$post = $this->model;
		$post->fill($attributes);
		$post->save();
		return $post;
	}
	
}