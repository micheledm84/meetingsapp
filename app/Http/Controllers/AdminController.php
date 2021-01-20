<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Permission;

use App\Http\Resources\PermissionResource;

class AdminController extends Controller
{
    public function index()
    {
        $permissions = Permission::select('id')->get();

        //$permissions = PermissionResource::collection($permissions);

        return view('admin')->with(['permissions'=>$permissions]);
    }
}
