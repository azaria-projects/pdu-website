<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class CompanyController extends Controller
{
    public function index()
    {
        return view('pages.company.index');
    }
}
