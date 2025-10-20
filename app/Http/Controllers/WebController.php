<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class WebController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }

    public function careers()
    {
        return view('pages.careers.index');
    }

    public function services()
    {
        return view('pages.services.index');
    }

    public function company()
    {
        return view('pages.company.index');
    }
}
