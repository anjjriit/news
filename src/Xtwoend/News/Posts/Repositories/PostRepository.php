<?php namespace Xtwoend\News\Posts\Repositories;
    	
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

use Illuminate\Database\Eloquent\Model;

use Xtwoend\News\Posts\PostInterface;
use Xtwoend\News\Entities\AbstractRepository;
use Xtwoend\News\Entities\AbstractRepositoryInterface;
use Xtwoend\News\Posts\Presenters\PostPresenter;

class PostRepository extends AbstractRepository implements PostInterface , AbstractRepositoryInterface {	
	
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
	public function all()
	{	
		$collections = [];
		$posts = $this->model->all();
		foreach ($posts as $post) {
			$collections[] = new PostPresenter($post);
		}
		unset($posts);
		return $collections;
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
		return new PostPresenter($post);
	}

	/**
	 * @doc
	 * 
	 */
	public function getPostByCategoryId($category_id, $with = array())
	{
		return $this->model->with($with)
					->where('post_status','=', 1)
					->where('post_category','=', $category_id)
					->get();
	}
	
	/**
	 * @doc
	 * 
	 */
	public function getPostByCategorySlug($slug)
	{	
		return $posts = $this->model->with(array('category' => function($query) use ($slug)
		{
		    $query->where('cat_slug', '=', $slug);

		}))->get();
	}
}