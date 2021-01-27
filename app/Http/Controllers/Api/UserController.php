<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

use App\User;

use Validator;

class UserController extends Controller
{
    public function index() {
        //return User::all();
        return UserResource::collection(User::all());
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'password' => 'required',
            'permissionId' => 'required'
        ]);
        
        if ($validator->fails()) {
            return response($validator->errors());
        } 

        $user = new User();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->permission_id = $request->permissionId;
        $user->save();
    }

    public function delete(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required'
        ]);
        
        if ($validator->fails()) {
            return response($validator->errors());
        } 
        $user = User::find( $request->id );
        $user->delete();
    }
}
