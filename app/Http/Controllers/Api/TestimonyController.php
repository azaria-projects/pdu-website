<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

use App\Models\Testimony;

use App\Http\Resources\TestimonyResource;
use App\Http\Controllers\Controller;
use App\Http\Collections\TestimonyCollection;

use App\Http\Requests\Testimonies\GetRequest;
use App\Http\Requests\Testimonies\StoreRequest;
use App\Http\Requests\Testimonies\UpdateRequest;

class TestimonyController extends Controller
{
    protected $sin;
    protected $plu;

    public function __construct() 
    {
        $this->sin = 'Testimony';
        $this->plu = 'Testimonies';
    }

    public function index(GetRequest $req)
    {
        $fil = $req->validated();
        $col = Testimony::searchable();
        $dat = Testimony::filter($fil, $col);
        $res = new TestimonyCollection($dat);
        $mes = sprintf('%s data retrieved!', $this->plu);

        return APIResponse('success', $mes, $res, 200);
    }
    
    public function store(StoreRequest $req)
    {
        $val = $req->validated();
        $dat = Testimony::create($val);
        $res = new TestimonyResource($dat);
        $mes = sprintf('%s data has been created!', $this->sin);

        return APIResponse('success', $mes, $res, 200);
    }

    public function show(Testimony $dat)
    {
        $dat = new TestimonyResource($dat);
        $mes = sprintf('%s found!', $this->sin);

        return APIResponse('success', $mes, $dat, 200);
    }

    public function update(UpdateRequest $req, Testimony $dat)
    {
        $val = $req->validated();
        $dat->update($val);

        $res = new TestimonyResource($dat);
        $mes = sprintf('%s data has been updated!', $this->sin);

        return APIResponse('success', $mes, $res, 200);
    }

    public function destroy(Testimony $dat)
    {
        $dat->delete();
        $res = new TestimonyResource($dat);
        $mes = sprintf('%s data has been deleted!', $this->sin);

        return APIResponse('success', $mes, $res, 200);
    }
}
