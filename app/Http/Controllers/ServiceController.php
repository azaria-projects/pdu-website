<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class ServiceController extends Controller
{
    public function mudlogging()
    {
        return view('pages.services.mudlogging.index');
    }

    public function mwd()
    {
        return view('pages.services.mwd.index');
    }

    public function plt()
    {
        return view('pages.services.plt.index');
    }
}
