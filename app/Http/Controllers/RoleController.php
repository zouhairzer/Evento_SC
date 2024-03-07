<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getRoles()
    {
        $roles = Role::orderByDesc('id')->limit(2)->get();
        return view('register',compact('roles'));
    }


}
