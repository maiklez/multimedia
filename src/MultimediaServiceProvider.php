<?php namespace	Maiklez\Multimedia;
/**
 * 
 * @author maiklez <maik.ledzep@gmail.com>
 */
use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class MultimediaServiceProvider extends ServiceProvider{
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;
	public function boot()
	{
		$this->loadViewsFrom(realpath(__DIR__.'/../views'), 'multimedia');
		
		$this->publishes([
				realpath(__DIR__.'/../views') => base_path('resources/views/vendor/multimedia'),
		]);
		
		$this->setupRoutes($this->app->router);
		
		// this  for conig
		$this->publishes([
				__DIR__.'/config/multimedia.php' => config_path('multimedia.php'),
		], 'config');
		
		//this for migrations
		$this->publishes([
				__DIR__.'/database/migrations/' => database_path('migrations')
		], 'migrations');
		
		//this for css and js
		$this->publishes([
				realpath(__DIR__.'/../assets') => public_path('maiklez/multimedia'),
		], 'public');

	}
	/**
	 * Define the routes for the application.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function setupRoutes(Router $router)
	{
		$router->group(['namespace' => 'Maiklez\Multimedia\Http\Controllers'], function($router)
		{
			require __DIR__.'/Http/routes.php';
		});
	}
	public function register()
	{
		$this->registerContact();
		config([
				'config/multimedia.php',
		]);
	}
	private function registerContact()
	{
		$this->app->bind('multimedia',function($app){
			return new Multimedia($app);
		});
	}
}