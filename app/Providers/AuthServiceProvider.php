<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth; // Pastikan namespace Auth ditambahkan
use App\Models\User; // Pastikan model User diimpor

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
        // Menyesuaikan login menggunakan username
        Auth::viaRequest('username', function ($request) {
            return User::where('username', $request->input('username'))->first();
        });
    }
}
