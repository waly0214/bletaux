<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Member;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $tempEmail = $request->email;
        $memberUser = Member::where('email', $tempEmail)->first();


        $user = '';

        if(!$memberUser){
            abort(403,'You are not an active member of the BLET Auxiliary or are using an different email address then we have on file.  Please try again or reach out to update your information with us.');
        } elseif ($memberUser->exists()) {

            // dd('Member exists');
            $memberActive = $memberUser->active;
            if($memberActive == true){
                //dd('True Dat');
                $memberRole = 'Member';
                $user = User::create([
                    'member_id' => $memberUser->id,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'name' => $request->first_name .' ' . $request->last_name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
                $user->assignRole($memberRole);
            } else {
                abort(403,'You are not an active member of the BLET Auxiliary or are using an different email address then we have on file.  Please try again or reach out to update your information with us.');
            }

        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
