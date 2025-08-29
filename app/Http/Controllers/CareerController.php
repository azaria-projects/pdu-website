<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class CareerController extends Controller
{
    public function index()
    {
        return view('pages.careers.index');
    }
}
