<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use library here
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

// use everything here
// use Gate;
// use Auth;

// use model
use App\Models\ManagementAcces\Role;
use App\Models\ManagementAcces\RoleUser;
use App\Models\ManagementAcces\Permission;
use App\Models\ManagementAcces\PermissionRole;

// use custom request
use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // validasi sudah login atau belum
       public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        $role = Role::orderby('created_at','desc')->get();
        return view('pages.backsite.management-acces.role.index', compact('role'));
    }
   
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::orderBy('created_at','desc')->get();
        return view('pages.backsite.management-acces.role.index', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        // get all request data from frontsite
        $data = $request->all();
        // store to database
        $role = Role::create($data);
        alert()->success('Success','Role has been created');
        return redirect()->route('backsite.role.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $role->load('permission');
        return view('pages.backsite.management-acces.role.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Role $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permission = Permission::all();
        $role->load('permission');
        return view('pages.backsite.management-acces.role.edit', compact('role','permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        // get all request data from frontsite
        $data = $request->all();
        // update data to database
        $role->update($data);
        // sinkronnasi permission
        $role->permission()->sync($request->input('permission',[]));
        alert()->success('Success','Role has been updated');
        return redirect()->route('backsite.role.index');
    }
 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->forceDelete();
        alert()->success('Success','Role has been deleted');
        return back();
    }
}
