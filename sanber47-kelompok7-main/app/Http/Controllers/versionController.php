<?php

namespace App\Http\Controllers;

use App\Models\Version;
use Illuminate\Http\Request;

class versionController extends Controller
{
    public function index()
    {
        $data = Version::all();

        return view('versi.index', ['data' => $data,'title' => 'version']);
    }
}
