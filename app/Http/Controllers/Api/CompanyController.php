<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

use App\Models\Company;

use App\Http\Resources\CompanyResource;
use App\Http\Controllers\Controller;
use App\Http\Collections\CompanyCollection;

use App\Http\Requests\Companies\GetRequest;
use App\Http\Requests\Companies\StoreRequest;
use App\Http\Requests\Companies\UpdateRequest;

class CompanyController extends Controller
{
    protected $sin;
    protected $plu;

    public function __construct() 
    {
        $this->sin = 'Company';
        $this->plu = 'Companies';
    }

    public function index(GetRequest $req)
    {
        $fil = $req->validated();
        $col = Company::searchable();
        $dat = Company::filter($fil, $col);
        $res = new CompanyCollection($dat);
        $mes = sprintf('%s data retrieved!', $this->plu);

        return APIResponse('success', $mes, $res, 200);
    }
    
    public function store(StoreRequest $req)
    {
        $val = $req->validated();
        $dat = Company::create($val);
        $res = new CompanyResource($dat);
        $mes = sprintf('%s data has been created!', $this->sin);

        return APIResponse('success', $mes, $res, 200);
    }

    public function show(Company $dat)
    {
        $dat = new CompanyResource($dat);
        $mes = sprintf('%s found!', $this->sin);

        return APIResponse('success', $mes, $dat, 200);
    }

    public function update(UpdateRequest $req, Company $dat)
    {
        $val = $req->validated();
        $dat->update($val);

        $res = new CompanyResource($dat);
        $mes = sprintf('%s data has been updated!', $this->sin);

        return APIResponse('success', $mes, $res, 200);
    }

    public function destroy(Company $dat)
    {
        $dat->delete();
        $res = new CompanyResource($dat);
        $mes = sprintf('%s data has been deleted!', $this->sin);

        return APIResponse('success', $mes, $res, 200);
    }
}