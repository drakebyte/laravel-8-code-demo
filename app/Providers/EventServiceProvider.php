<?php

namespace App\Providers;

use App\Events\CustomerCreatedEvent;
use App\Listeners\WelcomeNewCustomerListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        CustomerCreatedEvent::class => [   //  event that is registered to be listen to
            WelcomeNewCustomerListener::class,      //  what listeners are listening to the event, can be multiple ToDo: create off-process queue
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
