<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

use App\Models\Service;

use App\Http\Resources\ServiceResource;
use App\Http\Controllers\Controller;
use App\Http\Collections\ServiceCollection;

use App\Http\Requests\Services\GetRequest;
use App\Http\Requests\Services\StoreRequest;
use App\Http\Requests\Services\UpdateRequest;

class ServiceController extends Controller
{
    protected $sin;
    protected $plu;

    public function __construct() 
    {
        $this->sin = 'Service';
        $this->plu = 'Services';
    }

    public function index(GetRequest $req)
    {
        $fil = $req->validated();
        $col = Service::searchable();
        $dat = Service::filter($fil, $col);
        $res = new ServiceCollection($dat);
        $mes = sprintf('%s data retrieved!', $this->plu);

        return APIResponse('success', $mes, $res, 200);
    }
    
    public function store(StoreRequest $req)
    {
        $val = $req->validated();
        $dat = Service::create($val);
        $res = new ServiceResource($dat);
        $mes = sprintf('%s data has been created!', $this->sin);

        return APIResponse('success', $mes, $res, 200);
    }

    public function show(Service $dat)
    {
        $dat = new ServiceResource($dat);
        $mes = sprintf('%s found!', $this->sin);

        return APIResponse('success', $mes, $dat, 200);
    }

    public function update(UpdateRequest $req, Service $dat)
    {
        $val = $req->validated();
        $dat->update($val);

        $res = new ServiceResource($dat);
        $mes = sprintf('%s data has been updated!', $this->sin);

        return APIResponse('success', $mes, $res, 200);
    }

    public function destroy(Service $dat)
    {
        $dat->delete();
        $res = new ServiceResource($dat);
        $mes = sprintf('%s data has been deleted!', $this->sin);

        return APIResponse('success', $mes, $res, 200);
    }
}
