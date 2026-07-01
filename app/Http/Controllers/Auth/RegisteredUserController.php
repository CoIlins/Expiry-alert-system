<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use App\Models\Role;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
    $roles = Role::query()->where('role_id', '!=', 1)->get();
    $vendors = User::query()->where('role_id', 2)->get(['user_id', 'first_name', 'last_name']);

    return view('auth.register', compact('vendors', 'roles'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
                'first_name' => ['required', 'string', 'max:255'],
                'last_name'  => ['required', 'string', 'max:255'],
                'email'      => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique('users', 'email')
                ],
                'role_id'    => ['required', 'exists:roles,role_id', 'not_in:1'],
                'password'   => ['required', 'confirmed', Rules\Password::defaults()],
                'business_name' => ['required_if:role_id,2', 'nullable', 'string', 'max:255'],
                'vendor_id' => ['nullable', 'required_if:role_id,3', 'exists:users,user_id'],
        ]);

        $businessName = null;

        if ($request->role_id == 2) {
            // If they are a Vendor, use the business name they typed into the form
            $businessName = $request->business_name;
        } elseif ($request->role_id == 3) {
            // If they are a Clerk, fetch their selected employer's business name from the database
            $employer = User::findOrFail($request->vendor_id);
            $businessName = $employer->business_name;
        }
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
            'business_name' => $businessName,
            'vendor_id' => $request->role_id == 3 ? $request->vendor_id : null,
        ]);

        event(new Registered($user));

        Auth::login($user);

        switch ($user->role->role_name) {

            case 'Admin':
                return redirect()->route('admin.dashboard');

            case 'Vendor':
                return redirect()->route('vendor.dashboard');

            case 'Inventory Clerk':
                return redirect()->route('clerk.dashboard');

            default:
                return redirect('/');
        }
    }
}
