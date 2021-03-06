<?php

namespace Inferno\Foundation;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Inferno\Foundation\Listeners\RolePermissionEventListener;
use Inferno\Foundation\Listeners\SettingEventListener;
use Inferno\Foundation\Listeners\UserEventListeners;

class FoundationEventProvider extends ServiceProvider
{
	 /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\SomeEvent' => [
            'App\Listeners\EventListener',
        ],
    ];

     /**
     * The array of Event subscriber classes
     *
     * @var array
     */
    protected $subscribe = [
        UserEventListeners::class,
        RolePermissionEventListener::class,
        SettingEventListener::class,
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
