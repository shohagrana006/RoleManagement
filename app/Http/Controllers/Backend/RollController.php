<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::select('id','name')->get();
        return view('backend.layouts.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissionGroups = User::getPermissionGroup();
        return view('backend.layouts.role.create', compact('permissionGroups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:32|unique:roles,name'
        ]);
        $role = Role::create([
            'name' => request()->name,
        ]);
        $permissions = $request->input('permission');
        if(!empty($permissions)){
            $role->syncPermissions($permissions);
        }
        return redirect()->route('role.index')->with('message', __('Role Create successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permissionGroups = User::getPermissionGroup();
        $role = Role::where('id', $id)->first();
        $permissios = Permission::all();
        return view('backend.layouts.role.edit', compact('permissionGroups', 'role','permissios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:32|unique:roles,name,'.$id
        ]);
        $role = Role::where('id', $id)->first();
        $role->update(['name' => $request->name]);
        $permissions = $request->input('permission');
        if(!empty($permissions)){
            $role->syncPermissions($permissions);
        }
        return redirect()->route('role.index')->with('message', __('Role Updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return back()->with('message', __('Role Deleted successfully'));
    }
}
