<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

use App\Models\News;

use App\Http\Resources\NewsResource;
use App\Http\Controllers\Controller;
use App\Http\Collections\NewsCollection;

use App\Http\Requests\News\GetRequest;
use App\Http\Requests\News\StoreRequest;
use App\Http\Requests\News\UpdateRequest;

class NewsController extends Controller
{
    protected $sin;
    protected $plu;

    public function __construct() 
    {
        $this->sin = 'News';
        $this->plu = 'News';
    }

    public function index(GetRequest $req)
    {
        $fil = $req->validated();
        $col = News::searchable();
        $dat = News::filter($fil, $col);
        $res = new NewsCollection($dat);
        $mes = sprintf('%s data retrieved!', $this->plu);

        return APIResponse('success', $mes, $res, 200);
    }
    
    public function store(StoreRequest $req)
    {
        $val = $req->validated();
        $dat = News::create($val);
        $res = new NewsResource($dat);
        $mes = sprintf('%s data has been created!', $this->sin);

        return APIResponse('success', $mes, $res, 200);
    }

    public function show(News $dat)
    {
        $dat = new NewsResource($dat);
        $mes = sprintf('%s found!', $this->sin);

        return APIResponse('success', $mes, $dat, 200);
    }

    public function update(UpdateRequest $req, News $dat)
    {
        $val = $req->validated();
        $dat->update($val);

        $res = new NewsResource($dat);
        $mes = sprintf('%s data has been updated!', $this->sin);

        return APIResponse('success', $mes, $res, 200);
    }

    public function destroy(News $dat)
    {
        $dat->delete();
        $res = new NewsResource($dat);
        $mes = sprintf('%s data has been deleted!', $this->sin);

        return APIResponse('success', $mes, $res, 200);
    }
}
