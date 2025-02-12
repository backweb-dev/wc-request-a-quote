<?php

namespace Backweb\WcRequestQuote\Providers;

use Illuminate\Support\ServiceProvider;

class WcRequestQuoteServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /*$this->app->singleton('Example', function () {
            return new Example($this->app);
        });

        $this->mergeConfigFrom(
            __DIR__.'/../../config/example.php',
            'example'
        );*/
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*$this->publishes([
            __DIR__.'/../../config/wc-request-a-quote.php' => $this->app->configPath('wc-request-a-quote.php'),
        ], 'config');

        $this->loadViewsFrom(
            __DIR__.'/../../resources/views',
            'Example',
        );

        $this->commands([
            ExampleCommand::class,
        ]);

        $this->app->make('Example');*/
        // Désactiver l'affichage des prix sur la boutique et les produits
        add_filter('woocommerce_get_price_html', '__return_empty_string');
        add_action('woocommerce_after_shop_loop_item_title', function () {
            remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
        }, 1);

        // Supprimer les prix sur la page produit
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
    }
}
