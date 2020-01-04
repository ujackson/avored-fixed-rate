<?php
namespace Ujackson\AvoredFixedRate;

use AvoRed\Framework\Support\Facades\Shipping;
use AvoRed\Framework\Support\Facades\Tab;
use AvoRed\Framework\Tab\TabItem;
use Illuminate\Support\ServiceProvider;

class Module extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerResources();
        $this->registerShippingOption();
        $this->registerTab();
        $this->publishFiles();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Registering Ujackson AvoredFixedRate Resource
     * e.g. Route, View, Database  & Translation Path
     *
     * @return void
     */
    protected function registerResources()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'express-delivery');
    }

    /**
     * Register Menu Tab.
     *
     * @return void
     */
    public function registerTab()
    {
        Tab::put('system.configuration', function (TabItem $tab) {
            $tab->key('system.configuration.express_delivery')
                ->label('Express Delivery')
                ->view('express-delivery::system.configuration.index');
        });
    }

    /**
     * Register Shipping Option for App.
     *
     * @return void
     */
    protected function registerShippingOption(): void
    {
        $shipping = new FixedRate();
        Shipping::put($shipping);
    }

    /**
     * Publish Files for this module.
     * @return void
     */
    public function publishFiles()
    {
        $this->publishes([
            __DIR__ . '/../dist/js' => public_path('avored-admin/js'),
        ]);
    }
}
