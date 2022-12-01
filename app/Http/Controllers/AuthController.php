<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    /**
     * Hanya user yang belum login bisa mengakses controller ini
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout', 'profil', 'update', 'edit');
    }

    /**
     * return halaman form login
     */
    public function formLogin()
    {
        return view('auth.login');
    }

    public function authenticate()
    {
        $remember = request()->has('remember');

        $credentials = request()->validate([
            'email' => 'required|string|max:55|email',
            'password' => [
                'required',
                'min:8',
                Password::default()
                    ->letters()
                    ->numbers()
            ],
        ]);

        if (auth()->attempt($credentials, $remember)) {
            if (auth()->user()->hasRole('User')) {
                request()->session()->regenerate();

                return redirect()->intended('/');
            } else if (auth()->user()->hasRole('Admin')) {
                request()->session()->regenerate();

                return redirect()->intended('dashboard');
            }
        }

        return back()->with('error', 'Email atau Password salah. Coba lagi!');
    }

    /**
     * return halaman form register
     */
    public function formRegister()
    {
        return view('auth.register');
    }

    protected function getValidationRules()
    {
        if (request()->route('register')) {
            $foto = 'required|file|image|mimes:jpg,jpeg,png';
        } else if (request()->routeIs('profile.update')) {
            $foto = 'nullable|file|image|mimes:jpg,jpeg,png';
        }

        return request()->validate([
            'foto' => $foto,
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email|string|max:55|sometimes',
            'no_telp' => 'required|string|max:13',
            'alamat' => 'required|string',
            'password' => [
                'required',
                'min:8',
                'sometimes',
                Password::default()
                    ->numbers()
                    ->letters()
            ],
        ]);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     * Validasi data request dari form & membuat User baru
     */
    public function store()
    {
        $data = $this->getValidationRules();

        $data['foto'] = request()->file('foto')->store('foto-user');

        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        $user->assignRole('User');

        return redirect()->route('login')->with('message', 'Registrasi Berhasil.');
    }

    public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect()->route('login')->with('message', 'Berhasil Logout!');
    }

    public function edit()
    {
        return view('profil.edit');
    }

    public function update(User $user)
    {
        if (auth()->id() !== $user->id) {
            abort(403, "Anda Tidak Memiliki Akses!");
        }

        $data = $this->getValidationRules();

        if (request()->foto) {
            if (auth()->user()->foto) {
                Storage::delete(auth()->user()->foto);
            }

            $data['foto'] = request()->file('foto')->store('foto-user');
        }

        $user->update($data);

        return redirect()->route('profile')->with('message', 'Profil berhasil diubah!');
    }

    public function profil()
    {
        return view('profil.index');
    }
}
