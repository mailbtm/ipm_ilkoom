<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $tanggal_lahir = $data["thn"].str_pad($data["bln"],2,0,STR_PAD_LEFT).
                        str_pad($data["tgl"],2,0,STR_PAD_LEFT);
        $data['tanggal_lahir'] = $tanggal_lahir;

        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'name' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'date', 'before:-10 years', 'after:-100 years'],
            'pekerjaan' => ['sometimes', 'nullable', 'string', 'max:255'],
            'kota' => ['sometimes', 'nullable', 'string'],
            'bio_profile' => ['sometimes', 'nullable', 'string'],
            'gambar_profile' => ['sometimes', 'file', 'image', 'max:100'],
            'background_profile' => ['required', 'integer', 'min:1', 'max:12'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $tanggal_lahir = $data["thn"].str_pad($data["bln"],2,0,STR_PAD_LEFT).
                        str_pad($data["tgl"],2,0,STR_PAD_LEFT);

        $request = request();

                        if ($request->hasFile('gambar_profile'))
                        {
                            $slug = Str::slug($data['name']);

                            $extFile = $request->gambar_profile->getClientOriginalExtension();

                            $namaFile = $slug.'-'.time().".".$extFile;

                            $request->gambar_profile->storeAs('public/uploads',$namaFile);
                        }
                        else {
                            $namaFile = 'default_profile.jpg';
                        }

        return User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'name' => $data['name'],
            'tanggal_lahir' => $tanggal_lahir,
            'pekerjaan' => $data['pekerjaan'],
            'kota' => $data['kota'],
            'bio_profile' => $data['bio_profile'],
            'gambar_profile' => $namaFile,
            'background_profile' => $data['background_profile']
        ]);
    }
}
