<?php namespace Xtwoend\News;

use Illuminate\Support\ServiceProvider;
use Xtwoend\News\Posts\Repositories\PostRepository;

class NewsServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->registerPosts();
	}

	/**
	 * @doc
	 * 
	 */
	public function registerPosts()
	{	
		$this->app->bind('Xtwoend\News\Posts\Repositories\PostRepository', function($app)
		{	
			// initial model post 
			$model = 'Xtwoend\News\Posts\Post';
			$class = '\\'.ltrim($model, '\\');

			//register post repository
			return new PostRepository(new $class);
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return [];
	}

}
