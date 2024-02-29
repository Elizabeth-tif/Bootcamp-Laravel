<?php

namespace App\Http\Controllers;

use App\Models\Jawab;
use App\Models\Tanya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboardController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            $id = Auth::id();
            $totalTanya = Tanya::where('users_id', $id)->count();
            $totalJawab = Jawab::where('users_id', $id)->count();
            $tanyaNew = Tanya::orderBy('created_at', 'desc')->take(3)->get();
            return view('index', ['title' => 'dashboard', 'totalTanya' => $totalTanya, 'totalJawab' => $totalJawab, 'tanyas' => $tanyaNew]);
        }
        else
        {
            $tanyaNew = Tanya::orderBy('created_at', 'desc')->take(3)->get();
            return view('index', ['title' => 'dashboard', 'tanyas' => $tanyaNew]);
        }
    }
}
