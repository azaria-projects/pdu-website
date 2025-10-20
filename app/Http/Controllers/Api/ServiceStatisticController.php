<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

use App\Models\ServiceStatistic;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceStatisticResource;
use App\Http\Collections\ServiceStatisticCollection;

use App\Http\Requests\ServiceStatistics\GetRequest;
use App\Http\Requests\ServiceStatistics\StoreRequest;
use App\Http\Requests\ServiceStatistics\UpdateRequest;

class ServiceStatisticController extends Controller
{
    protected $sin;
    protected $plu;

    public function __construct() 
    {
        $this->sin = 'Service Statistic';
        $this->plu = 'Service Statistics';
    }

    public function index(GetRequest $req)
    {
        $fil = $req->validated();
        $col = ServiceStatistic::searchable();
        $dat = ServiceStatistic::filter($fil, $col);
        $res = new ServiceStatisticCollection($dat);
        $mes = sprintf('%s data retrieved!', $this->plu);

        return APIResponse('success', $mes, $res, 200);
    }
    
    public function store(StoreRequest $req)
    {
        $val = $req->validated();
        $dat = ServiceStatistic::create($val);
        $res = new ServiceStatisticResource($dat);
        $mes = sprintf('%s data has been created!', $this->sin);

        return APIResponse('success', $mes, $res, 200);
    }

    public function show(ServiceStatistic $dat)
    {
        $dat = new ServiceStatisticResource($dat);
        $mes = sprintf('%s found!', $this->sin);

        return APIResponse('success', $mes, $dat, 200);
    }

    public function update(UpdateRequest $req, ServiceStatistic $dat)
    {
        $val = $req->validated();
        $dat->update($val);

        $res = new ServiceStatisticResource($dat);
        $mes = sprintf('%s data has been updated!', $this->sin);

        return APIResponse('success', $mes, $res, 200);
    }

    public function destroy(ServiceStatistic $dat)
    {
        $dat->delete();
        $res = new ServiceStatisticResource($dat);
        $mes = sprintf('%s data has been deleted!', $this->sin);

        return APIResponse('success', $mes, $res, 200);
    }
}
