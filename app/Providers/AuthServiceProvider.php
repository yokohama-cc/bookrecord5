<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\ReadingRecord;
use App\User;
use App\Policies\ReaderPolicy;
use App\Policies\ReadingRecordPolicy;
use App\Policies\UserPolicy;
use App\Reader;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        ReadingRecord::class => ReadingRecordPolicy::class,
        Reader::class => ReaderPolicy::class,
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

            // システム管理者
        Gate::define('system_admin', function ($user) {
                return ($user->level == 99);
            });                   
            
    }
}
