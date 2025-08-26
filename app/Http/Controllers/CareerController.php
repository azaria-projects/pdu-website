<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class CareerController extends Controller
{
    public function opportunities()
    {
        return view('pages.careers.opportunities.index');
    }

    public function descriptions()
    {
        return view('pages.careers.descriptions.index');
    }
}
