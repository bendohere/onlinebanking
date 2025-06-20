<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use App\Models\Settings;
//use App\Models\TermsPrivacy;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        

        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(5)->by($request->email.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        Fortify::twoFactorChallengeView(function () {
            return view('auth.two-factor-challenge', [
                'title' => 'Two Factor Authentication',
            ]);
        });

        Fortify::confirmPasswordView(function () {
            return view('auth.confirm-password', [
                'title' => 'Password Confirmation',
            ]);
        });

        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.forgot-password',[
                'title' => 'Enter email to reset your password',
            ]);
        });

        // Fortify::registerView(function () {
        //     return view('auth.registers',[
        //         'terms' => TermsPrivacy::find(1),
        //     ]);
        // });
    }
}
