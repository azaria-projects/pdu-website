<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

class AdminController extends Controller
{
    protected $viw;

    public function __construct() 
    {
        $this->viw = 'pages.admin-panel';
    }

    public function index()
    {
        $pge = 'index';
        $pth = sprintf('%s.%s', $this->viw, $pge);

        return view($pth);
    }

    public function services()
    {        
        $pge = 'services';
        $pth = sprintf('%s.%s.index', $this->viw, $pge);

        return view($pth);
    }

    public function careers()
    {
        
        $pge = 'careers';
        $pth = sprintf('%s.%s.index', $this->viw, $pge);
        
        return view($pth);
    }

    public function codes()
    {
        $pge = 'com-codes';
        $pth = sprintf('%s.%s.index', $this->viw, $pge);

        return view($pth);
    }

    public function companies()
    {
        $pge = 'companies';
        $pth = sprintf('%s.%s.index', $this->viw, $pge);

        return view($pth);
    }

    public function partners()
    {
        $pge = 'partners';
        $pth = sprintf('%s.%s.index', $this->viw, $pge);

        return view($pth);
    }

    public function files()
    {
        $pge = 'files';
        $pth = sprintf('%s.%s.index', $this->viw, $pge);

        return view($pth);
    }

    public function news()
    {
        $rte = Route::getRoutes();
        $web = collect($rte)->filter(function ($rte) {
            $uri = $rte->uri();
            return in_array('web', $rte->middleware()) &&
                !str_starts_with($uri, 'api') &&
                !str_starts_with($uri, 'admin');
        });

        $frm = $web->map(function ($rte) { 
            return [
                'id'   => url($rte->uri()),
                'text' => url($rte->uri())
            ];
        });

        $frm = $frm->values();

        $pge = 'news';
        $pth = sprintf('%s.%s.index', $this->viw, $pge);

        return view($pth, compact('frm'));
    }

    public function statistics()
    {
        $pge = 'statistics';
        $pth = sprintf('%s.%s.index', $this->viw, $pge);

        return view($pth);
    }

    public function testimonies()
    {
        $pge = 'testimonies';
        $pth = sprintf('%s.%s.index', $this->viw, $pge);

        return view($pth);
    }
}
