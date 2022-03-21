<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class UserController extends Controller
{
    public function edit(User $user)
    {
        $time = strtotime($user->tanggal_lahir);

        $user['tgl'] = date('d', $time);
        $user['bln'] = date('m', $time);
        $user['thn'] = date('Y', $time);

        return view('user.edit',compact('user'));
    }

    public function update(Request $request , User $user)
    {
        $tanggal_lahir = $request["thn"].str_pad($request["bln"],2,0,STR_PAD_LEFT).
                        str_pad($request["tgl"],2,0,STR_PAD_LEFT);
        $request['tanggal_lahir'] = $tanggal_lahir;

        $validateData = request()->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'name' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'date', 'before:-10 years', 'after:-100 years'],
            'pekerjaan' => ['sometimes', 'nullable', 'string', 'max:255'],
            'kota' => ['sometimes', 'nullable', 'string'],
            'bio_profile' => ['sometimes', 'nullable', 'string'],
            'gambar_profile' => ['sometimes', 'file', 'image', 'max:100'],
            'background_profile' => ['required', 'integer', 'min:1', 'max:12'],
        ]);

        if ($request->hasFile('gambar_profile'))
                        {
                            $slug = Str::slug($request['name']);

                            $extFile = $request->gambar_profile->getClientOriginalExtension();

                            $namaFile = $slug.'-'.time().".".$extFile;

                            $request->gambar_profile->storeAs('public/uploads',$namaFile);
                        }
                        else {
                            $namaFile = 'default_profile.jpg';
                        }

                        $validateData['gambar_profile'] = $namaFile;

                        $user->update($validateData);

                        return redirect()->route('home')->with(['pesan' => 'update', 'name' => $user->name]);
    }

    public function delete(User $user)
    {
        $user->delete();
        return redirect()->route('home')->with(['pesan' => 'delete', 'name' => $user->name]);
    }
}
