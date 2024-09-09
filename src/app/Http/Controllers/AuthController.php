<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Fortify;
use Illuminate\Routing\Pipeline;
use Laravel\Fortify\Actions\EnsureLoginIsNotThrottled;
use Laravel\Fortify\Actions\CanonicalizeUsername;
use Laravel\Fortify\Features;
use Laravel\Fortify\Actions\RedirectIfTwoFactorAuthenticatable;
use Laravel\Fortify\Actions\AttemptToAuthenticate;
use Laravel\Fortify\Actions\PrepareAuthenticatedSession;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login');
    }

    public function login(LoginRequest $request)
    {
        return $this->loginPipeline($request)->then(function ($request) {
            // After change the redirect route to Administrator page
            return redirect()->route('admin.index');
        });
    }

    /**
     * Get the authentication pipeline instance.
     *
     * @param  App\Http\Requests\LoginRequest  $request
     * @return \Illuminate\Pipeline\Pipeline
     */
    protected function loginPipeline(LoginRequest $request)
    {
        if (Fortify::$authenticateThroughCallback) {
            return (new Pipeline(app()))->send($request)->through(array_filter(
                call_user_func(Fortify::$authenticateThroughCallback, $request)
            ));
        }

        if (is_array(config('fortify.pipelines.login'))) {
            return (new Pipeline(app()))->send($request)->through(array_filter(
                config('fortify.pipelines.login')
            ));
        }

        return (new Pipeline(app()))->send($request)->through(array_filter([
            config('fortify.limiters.login') ? null : EnsureLoginIsNotThrottled::class,
            config('fortify.lowercase_usernames') ? CanonicalizeUsername::class : null,
            Features::enabled(Features::twoFactorAuthentication()) ? RedirectIfTwoFactorAuthenticatable::class : null,
            AttemptToAuthenticate::class,
            PrepareAuthenticatedSession::class,
        ]));
    }

    public function logout() {
        return view('auth.logout');
    }
}
