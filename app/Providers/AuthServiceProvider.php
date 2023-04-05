<?php

namespace App\Providers;
use App\Enums\Role;
use App\Models\Image;
use App\Models\User;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        // Image::class => PolicyForImage::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gate::define('update-image', function(User $user, Image $image){
        //     // dump('update-image');
        //     return $user->id ===  $image->user_id || $user->role === Role::Editor;
        // });

        // Gate::define('delte-image', function(User $user, Image $image){
        //     // dump('delete-image');
        //     return $user->id ===  $image->user_id;
        // });

        // Gate::define('update-image', [PolicyForImage::class, 'update']);

        // Gate::define('delte-image', [PolicyForImage::class, 'delete']);


        Gate::before(function($user, $ability) {
            // dump('before Gate');
            if($user->role === Role::Admin) {
                return true;
            }
        });
    }
}
