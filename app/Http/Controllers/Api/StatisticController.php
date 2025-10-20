<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Models\Statistic;

use App\Http\Controllers\Controller;
use App\Http\Resources\StatisticResource;
use App\Http\Collections\ResponseCollection;

use App\Http\Requests\Statistics\GetRequest;
use App\Http\Requests\Statistics\StoreRequest;
use App\Http\Requests\Statistics\UpdateRequest;

class StatisticController extends Controller
{
    protected $sin;
    protected $plu;

    public function __construct() 
    {
        $this->sin = 'Statistic';
        $this->plu = 'Statistics';
    }

    public function index(GetRequest $req)
    {
        $fil = $req->validated();
        $col = Statistic::searchable();
        $dat = Statistic::filter($fil, $col);
        $res = new ResponseCollection($dat);
        $mes = sprintf('%s data retrieved!', $this->plu);

        return APIResponse('success', $mes, $res, 200);
    }
    
    public function store(StoreRequest $req)
    {
        $val = $req->validated();
        $dat = Statistic::create($val);
        $res = new StatisticResource($dat);
        $mes = sprintf('%s data has been created!', $this->sin);

        return APIResponse('success', $mes, $res, 200);
    }

    public function show(Statistic $dat)
    {
        $dat = new StatisticResource($dat);
        $mes = sprintf('%s found!', $this->sin);

        return APIResponse('success', $mes, $dat, 200);
    }

    public function update(UpdateRequest $req, Statistic $dat)
    {
        $val = $req->validated();
        $dat->update($val);

        $res = new StatisticResource($dat);
        $mes = sprintf('%s data has been updated!', $this->sin);

        return APIResponse('success', $mes, $res, 200);
    }

    public function destroy(Statistic $dat)
    {
        $dat->delete();
        $res = new StatisticResource($dat);
        $mes = sprintf('%s data has been deleted!', $this->sin);

        return APIResponse('success', $mes, $res, 200);
    }
}
