<?php

namespace App\Http\Controllers;

use App\Models\Jawab;
use App\Models\Profile;
use App\Models\Tanya;
use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule as ValidationRule;

class ProfileController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $detail_profile = Profile::where('user_id', $user_id)->first();
        $totalJawab = Jawab::where('users_id', $user_id)->count();
        $totalTanya = Tanya::where('users_id', $user_id)->count();
        $tanya = Tanya::where('users_id', $user_id)->orderBy('created_at', 'desc')->get();
        $title = 'profile';

        return view('profile.index', ['detail_profile' => $detail_profile, 'title' => $title, 'totalJawab' => $totalJawab, 'totalTanya' => $totalTanya, 'tanyas' => $tanya]);
    }

    public function edit()
    {
        $user_id = Auth::id();
        $detail_profile = Profile::where('user_id', $user_id)->first();
        $title = 'profile';

        return view('profile.update', ['detail_profile' => $detail_profile, 'title' => $title]);
    }

    public function update(Request $request, $id)
    {
        $data = Profile::find($id);
        $dataUser = User::find($data->user_id);

        // Validasi data yang dikirimkan dari request
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'regex:/^[a-z._]+$/'],
            'email' => ['required', 'string', 'email', 'max:255', ValidationRule::unique('users')->ignore($dataUser->id)],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'tanggal_lahir' => ['required'],
            'gender' => ['required'],
        ]);

        // Update data di model Profile
        $data->name = $request->name;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->gender = $request->gender;
        $data->alamat = $request->alamat;
        $data->bio = $request->bio;
        $data->save();

        // Update data di model User (jika email berubah)
        if ($dataUser->email !== $request->email) {
            $dataUser->email = $request->email;
            $dataUser->save();
        }

        return redirect('/profile')->with('message', 'Profile Berhasil di Perbarui');
    }
}
