<?php

namespace App\Http\Controllers;

use App\Models\Jawab;
use App\Models\Tanya;
use App\Models\Version;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class tanyajawabController extends Controller
{
    public function index()
    {
        // $datatanya =
        $versi = Version::all();
        $questions = Tanya::orderBy('created_at', 'desc')->get();
        return view('tanyajawab.index', ['versions' => $versi, 'title' => 'tanyajawab', 'questions' => $questions]);
    }

    public function show($id)
    {
        $question = Tanya::find($id);
        $waktuPost = $question->created_at->diffInSeconds();
        $jawab = Jawab::where('tanya_id', $id)->orderBy('created_at', 'desc')->get();
        return view('tanyajawab.detail', ['question' => $question, 'title' => 'tanyajawab', 'waktuPost' => $waktuPost, 'jawabs' => $jawab]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required'],
            'image' => ['required', 'mimes:png,jpg,jpeg', 'max: 2048'],
            'version_id' => ['required']
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('tanyaImage'), $imageName);

        $tanya = new Tanya;

        $tanya->title = $request->title;
        $tanya->content = $request->content;
        $tanya->image = $imageName;
        $tanya->version_id = $request->version_id;
        $tanya->users_id = Auth::id();

        $tanya->save();

        return redirect('/tanyajawab')->with('success', 'Pertanyaan Berhasil di Posting');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required'],
            'image' => ['mimes:png,jpg,jpeg', 'max: 2048'],
            'version_id' => ['required']
        ]);

        $tanya = Tanya::find($id);

        if ($request->hasFile('image')) {
            // Hapus foto lama jika ada
            if ($tanya->image) {
                $oldImagePath = public_path('tanyaImage/' . $tanya->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Simpan foto baru
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('tanyaImage'), $imageName);
            $tanya->image = $imageName;
        }

        $tanya->title = $request->title;
        $tanya->content = $request->content;
        $tanya->version_id = $request->version_id;

        $tanya->save();
        return redirect('/tanyajawab')->with('success', 'Pertanyaan Berhasil di Update');
    }

    public function delete($id)
    {
        $tanya = Tanya::find($id);

        // Hapus jawabs terkait
        $tanya->jawabs()->delete();

        // Hapus foto jika ada
        if ($tanya->image) {
            $oldImagePath = public_path('tanyaImage/' . $tanya->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        // Hapus data tanya
        $tanya->delete();

        return redirect('/tanyajawab')->with('success', 'Data Pertanyaan berhasil dihapus.');
    }
}
