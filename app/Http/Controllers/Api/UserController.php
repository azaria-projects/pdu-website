<?php

namespace App\Http\Controllers\Api;

use JWTAuth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

use App\Models\User;

use App\Http\Resources\UserResource;
use App\Http\Controllers\Controller;
use App\Http\Collections\ResponseCollection;

use App\Http\Requests\Users\GetRequest;
use App\Http\Requests\Users\AuthRequest;
use App\Http\Requests\Users\StoreRequest;
use App\Http\Requests\Users\UpdateRequest;

class UserController extends Controller
{
    protected $sin;
    protected $plu;

    public function __construct() 
    {
        $this->sin = 'User';
        $this->plu = 'Users';
    }

    public function index(GetRequest $req)
    {
        $fil = $req->validated();
        $col = User::searchable();
        $dat = User::filter($fil, $col);
        $res = new ResponseCollection($dat);
        $mes = sprintf('%s data retrieved!', $this->plu);

        return APIResponse('success', $mes, $res, 200);
    }
    
    public function store(StoreRequest $req)
    {
        $val = $req->validated();
        $dat = User::create($val);
        $res = new UserResource($dat);
        $mes = sprintf('%s data has been created!', $this->sin);

        return APIResponse('success', $mes, $res, 200);
    }

    public function show(User $dat)
    {
        $dat = new UserResource($dat);
        $mes = sprintf('%s found!', $this->sin);

        return APIResponse('success', $mes, $dat, 200);
    }

    public function update(UpdateRequest $req, User $dat)
    {
        $val = $req->validated();
        $dat->update($val);

        $res = new UserResource($dat);
        $mes = sprintf('%s data has been updated!', $this->sin);

        return APIResponse('success', $mes, $res, 200);
    }

    public function destroy(User $dat)
    {
        $dat->delete();
        $res = new UserResource($dat);
        $mes = sprintf('%s data has been deleted!', $this->sin);

        return APIResponse('success', $mes, $res, 200);
    }

    public function login(AuthRequest $req)
    {
        $val = $req->validated();
        $usr = User::where('email', $req->email)->first();

        if (!$usr || !Hash::check($req->password, $usr->password)) {
            abort(401, "Invalid credentials!");
        }

        try {
            $tkn = JWTAuth::fromUser($usr);
        
        } catch (JWTException $e) {
            abort(500, "Unable not create token!");
        }

        return APIResponse('success', 'Login successful', $tkn, 200);
    }

    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());

        return APIResponse('success', 'Logged out successfully', '', 200);
    }
}
