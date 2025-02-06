<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        return view('User.dashboard', compact('kategoris'));
    }
}
