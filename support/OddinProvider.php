<?php

namespace BigBIT\Oddin\Support\Laravel;

use BigBIT\Oddin\Singletons\DIResolver;
use BigBIT\Oddin\Utils\CacheResolver;
use BigBIT\Oddin\Utils\ClassMapResolver;
use Illuminate\Container\Container;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Psr\Container\ContainerInterface;
use Psr\SimpleCache\CacheInterface;

/**
 * Class OddinProvider
 * @package BigBIT\Oddin\Support\Laravel
 */
class OddinProvider extends ServiceProvider
{
    /**
     *
     */
    public function register()
    {
        $this->app->singleton(ClassMapResolver::class, function(Application $app) {
            return new ClassMapResolver(
                realpath(base_path('vendor/autoload.php'))
            );
        });

        $this->app->singleton(CacheResolver::class, function(Application $app) {
            return new CacheResolver(
                $app->make(ClassMapResolver::class),
                $app->make(CacheInterface::class)
            );
        });

        DIResolver::create($this->app);
    }
}
