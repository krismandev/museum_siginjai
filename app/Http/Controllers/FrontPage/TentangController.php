<?php

namespace App\Http\Controllers\FrontPage;

use App\Http\Controllers\Controller;
use App\Tentang;
use Illuminate\Http\Request;

class TentangController extends Controller
{
    public function index()
    {
        $tentang = Tentang::first();
        return view("frontpage.tentang",compact(['tentang']));
    }
}
