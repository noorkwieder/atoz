<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Rolecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  /*  function __construct()
{

$this->middleware('permission:عرض صلاحية', ['only' => ['index']]);
$this->middleware('permission:اضافة صلاحية', ['only' => ['create','store']]);
$this->middleware('permission:تعديل صلاحية', ['only' => ['edit','update']]);
$this->middleware('permission:حذف صلاحية', ['only' => ['destroy']]);

}*/


    public function index()
    {
       

        $role=Role::all();
        return $this->sendResponse($role);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $permission = Permission::get();
        {
            $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
            ]);
            $role = Role::create(['name' => $request->input('name')]);
            $role->syncPermissions($request->input('permission'));
            
           
        return $this->sendResponse($role);

    }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        return $this->sendResponse($role);
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
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
            ]);
            $role = Role::find($id);
            $role->name = $request->input('name');
            $role->save();
            $role->syncPermissions($request->input('permission'));

        return $this->sendResponse($role);
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resturant->delete();
        return $this-> sendresponse(null);
    }
}
