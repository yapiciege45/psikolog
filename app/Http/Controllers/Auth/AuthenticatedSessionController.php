<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Office;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {

        $request->authenticate();

        $request->session()->regenerate();

        if($request->user()->is_admin) {
            return redirect()->intended(route('dashboard.index', absolute: false));
        }

        if($request->user()->is_office_admin) {
            $office = Office::find($request->user()->office_id);

            return to_route('office.dashboard.index', ['slug' => $office->slug]);
        }

        if($request->user()->is_psychologist) {
            $office = Office::find($request->user()->office_id);

            return to_route('office.psychologist.index', ['slug' => $office->slug]);
        }

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
