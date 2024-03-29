<?php

namespace App\Providers;

use App\Models\Book;
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
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
        $this->registerPolicies();
        Gate::define('create-book', function(User $user){
            return $user->role_id === 1;
        });

        Gate::define('update-book', function(User $user, Book $book){
            return $user->id === $book->user_id;
        });
    }
}
