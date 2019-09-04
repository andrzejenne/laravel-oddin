<?php

namespace BigBIT\Oddin\Support\Laravel;

use BigBIT\Oddin\Singletons\DIResolver;
use Illuminate\Support\ServiceProvider;

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
        DIResolver::create($this->app);
    }
}
