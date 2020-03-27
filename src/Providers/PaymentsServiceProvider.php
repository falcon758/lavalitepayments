<?php

namespace Shopping\Payments\Providers;

use Illuminate\Support\ServiceProvider;

class PaymentsServiceProvider extends ServiceProvider
{
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
        // Load view
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'payments');

        // Load translation
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'payments');

        // Load migrations
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

        // Call pblish redources function
        $this->publishResources();

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // Bind facade
        $this->app->bind('shopping.payments', function ($app) {
            return $this->app->make('Shopping\Payments\Payments');
        });

        // Bind Payment to repository
        $this->app->bind(
            'Shopping\Payments\Interfaces\PaymentRepositoryInterface',
            \Shopping\Payments\Repositories\Eloquent\PaymentRepository::class
        );
        // Bind Transaction to repository
        $this->app->bind(
            'Shopping\Payments\Interfaces\TransactionRepositoryInterface',
            \Shopping\Payments\Repositories\Eloquent\TransactionRepository::class
        );

        $this->app->register(\Shopping\Payments\Providers\AuthServiceProvider::class);
        
        $this->app->register(\Shopping\Payments\Providers\RouteServiceProvider::class);
                
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['shopping.payments'];
    }

    /**
     * Publish resources.
     *
     * @return void
     */
    private function publishResources()
    {
        // Publish configuration file
        $this->publishes([__DIR__ . '/../../config/config.php' => config_path('shopping/payments.php')], 'config');

        // Publish admin view
        $this->publishes([__DIR__ . '/../../resources/views' => base_path('resources/views/vendor/payments')], 'view');

        // Publish language files
        $this->publishes([__DIR__ . '/../../resources/lang' => base_path('resources/lang/vendor/payments')], 'lang');

        // Publish public files and assets.
        $this->publishes([__DIR__ . '/public/' => public_path('/')], 'public');
    }
}
