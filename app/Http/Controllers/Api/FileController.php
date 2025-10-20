<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

use App\Models\File;

use App\Http\Resources\FileResource;
use App\Http\Controllers\Controller;
use App\Http\Collections\FileCollection;

use App\Http\Requests\Files\GetRequest;
use App\Http\Requests\Files\StoreRequest;
use App\Http\Requests\Files\UpdateRequest;

class FileController extends Controller
{
    protected $sin;
    protected $plu;

    public function __construct() 
    {
        $this->sin = 'File';
        $this->plu = 'Files';
    }

    public function index(GetRequest $req)
    {
        $fil = $req->validated();
        $col = File::searchable();
        $dat = File::filter($fil, $col);
        $res = new FileCollection($dat);
        $mes = sprintf('%s data retrieved!', $this->plu);

        return APIResponse('success', $mes, $res, 200);
    }
    
    public function store(StoreRequest $req)
    {
        $val = $req->validated();

        $fle = $val['file'];
        $sze = $fle->getSize();
        $nme = $fle->getClientOriginalName();
        $ext = $fle->getClientOriginalExtension();
        $pth = $fle->storeAs('uploads', $nme, 'public');

        $val['name'] = $nme;
        $val['path'] = $pth;
        $val['size'] = $sze/1024;
        $val['extension'] = $ext;

        $dat = File::create($val);
        $res = new FileResource($dat);
        $msg = sprintf('%s data has been created!', $this->sin);

        return APIResponse('success', $msg, $res, 200);
    }

    public function show(File $dat)
    {
        $dat = new FileResource($dat);
        $mes = sprintf('%s found!', $this->sin);

        return APIResponse('success', $mes, $dat, 200);
    }

    public function update(UpdateRequest $req, File $dat)
    {
        $val = $req->validated();

        $fle = $val['file'];
        $sze = $fle->getSize();
        $nme = $fle->getClientOriginalName();
        $ext = $fle->getClientOriginalExtension();
        $pth = $fle->storeAs('uploads', $nme, 'public');

        $val['name'] = $nme;
        $val['path'] = $pth;
        $val['size'] = $sze/1024;
        $val['extension'] = $ext;

        $this->deleteFile($dat->id);
        $dat->update($val);

        $res = new FileResource($dat);
        $mes = sprintf('%s data has been updated!', $this->sin);

        return APIResponse('success', $mes, $res, 200);
    }

    public function destroy(File $dat)
    {
        $dat->delete();
        $this->deleteFile($dat->id);
        
        $res = new FileResource($dat);
        $mes = sprintf('%s data has been deleted!', $this->sin);

        return APIResponse('success', $mes, $res, 200);
    }

    protected function deleteFile($id) : void
    {
        $dat = File::where('id', $id)->first();
        if (Storage::exists($dat->path)) {
            Storage::delete($dat->path);
        }
    }
}
