<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

use App\Models\Address;

use App\Http\Resources\AddressResource;
use App\Http\Controllers\Controller;
use App\Http\Collections\AddressCollection;

use App\Http\Requests\Addresses\GetRequest;
use App\Http\Requests\Addresses\StoreRequest;
use App\Http\Requests\Addresses\UpdateRequest;

class AddressController extends Controller
{
    protected $sin;
    protected $plu;

    public function __construct() 
    {
        $this->sin = 'Address';
        $this->plu = 'Addresses';
    }

    public function index(GetRequest $req)
    {
        $fil = $req->validated();
        $col = Address::searchable();
        $dat = Address::filter($fil, $col);
        $res = new AddressCollection($dat);
        $mes = sprintf('%s data retrieved!', $this->plu);

        return APIResponse('success', $mes, $res, 200);
    }
    
    public function store(StoreRequest $req)
    {
        $val = $req->validated();
        $dat = Address::create($val);
        $res = new AddressResource($dat);
        $mes = sprintf('%s data has been created!', $this->sin);

        return APIResponse('success', $mes, $res, 200);
    }

    public function show(Address $dat)
    {
        $dat = new AddressResource($dat);
        $mes = sprintf('%s found!', $this->sin);

        return APIResponse('success', $mes, $dat, 200);
    }

    public function update(UpdateRequest $req, Address $dat)
    {
        $val = $req->validated();
        $dat->update($val);

        $res = new AddressResource($dat);
        $mes = sprintf('%s data has been updated!', $this->sin);

        return APIResponse('success', $mes, $res, 200);
    }

    public function destroy(Address $dat)
    {
        $dat->delete();
        $res = new AddressResource($dat);
        $mes = sprintf('%s data has been deleted!', $this->sin);

        return APIResponse('success', $mes, $res, 200);
    }
}
