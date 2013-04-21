<?php
namespace Machuga\Haml;

/*
 * Concepts taken from Villimag's MtHaml package
 */

use MtHaml\Environment;
use Illuminate\Foundation\Application;
use Illuminate\View\Engines\CompilerEngine;
use Illuminate\Support\ServiceProvider;

class HamlServiceProvider extends ServiceProvider
{

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
        $this->app['mthaml'] = $this->app->share(function ($app) {
            return new Environment('php', array('enable_escaper' => false));
        });
    }

    public function boot()
    {
        $app = $this->app;

        $app['view.engine.resolver']->register('mthaml', function() use ($app) {
            $cache = $app['path.storage'].'/views';

            $compiler = new HamlCompiler($app['files'], $cache);
            $compiler->setEnvironment($app['mthaml']);

            return new CompilerEngine($compiler, $app['files']);
        });

        $app['view']->addExtension('haml.php', 'mthaml');
        $app['view']->addExtension('haml', 'mthaml');
    }
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

}
