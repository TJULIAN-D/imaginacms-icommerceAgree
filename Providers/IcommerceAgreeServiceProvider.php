<?php

namespace Modules\Icommerceagree\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Icommerceagree\Events\Handlers\RegisterIcommerceAgreeSidebar;

class IcommerceAgreeServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
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
        $this->registerBindings();
        $this->app['events']->listen(BuildingSidebar::class, RegisterIcommerceAgreeSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('configagrees', array_dot(trans('icommerceagree::configagrees')));
            // append translations

        });
    }

    public function boot()
    {
        $this->publishConfig('IcommerceAgree', 'permissions');
        $this->publishConfig('IcommerceAgree', 'settings');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
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

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Icommerceagree\Repositories\ConfigagreeRepository',
            function () {
                $repository = new \Modules\Icommerceagree\Repositories\Eloquent\EloquentConfigagreeRepository(new \Modules\Icommerceagree\Entities\Configagree());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Icommerceagree\Repositories\Cache\CacheConfigagreeDecorator($repository);
            }
        );
// add bindings

    }
}
