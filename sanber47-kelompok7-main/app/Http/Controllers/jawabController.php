<?php

namespace App\Http\Controllers;

use App\Models\Jawab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class jawabController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => ['required'],
            'image' => ['mimes:png,jpg,jpeg', 'max: 2048'],
            'tanya_id' => ['required']
        ]);

        $jawab = new Jawab;

        if($request->hasFile('image'))
        {
            // Simpan foto baru
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('jawabImage'), $imageName);
            $jawab->image = $imageName;
        }

        $jawab->content = $request->content;
        $jawab->tanya_id = $request->tanya_id;
        $jawab->users_id = Auth::id();

        $jawab->save();

        return redirect('tanyajawab/'.$request->tanya_id)->with('success', 'Tanggapan Berhasil di Posting');

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => ['required'],
            'image' => ['mimes:png,jpg,jpeg', 'max: 2048'],
        ]);

        $jawab = Jawab::find($id);

        if ($request->hasFile('image')) {
            // Hapus foto lama jika ada
            if ($jawab->image != '') {
                $oldImagePath = public_path('jawabImage/' . $jawab->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Simpan foto baru
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('jawabImage'), $imageName);
            $jawab->image = $imageName;
        }

        $jawab->content = $request->content;
        $jawab->save();

        return redirect('tanyajawab/'.$request->tanya_id)->with('success', 'Tanggapan Berhasil di Update');

    }

    public function delete(Request $request, $id)
    {
        $jawab = Jawab::find($id);

        // Hapus foto jika ada
        if ($jawab->image != '') {
            $oldImagePath = public_path('jawabImage/' . $jawab->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        // Hapus data tanya
        $jawab->delete();

        return redirect('tanyajawab/'.$request->tanya_id)->with('success', 'Tanggapan Berhasil di Hapus.');
    }
}
