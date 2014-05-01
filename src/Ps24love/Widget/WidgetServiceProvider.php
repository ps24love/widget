<?php namespace Ps24love\Widget;

use Illuminate\Support\ServiceProvider;
use Ps24love\Widget\WidgetException as Exception;

class WidgetServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('Ps24love/widget', 'widget');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['widget'] = $this->app->share(function($app)
		{
			return new Widget;
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('widget');
	}

}
