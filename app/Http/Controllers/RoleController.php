<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('site.Role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('site.Role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255','lowercase','unique:roles']
        ]);

        $role = Role::create([
            'name' => $request->name,
        ]);
            return redirect()->route('roles.index')->with('create', " Yangi rol qo'shildi!");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $role = Role::find($id);
        return view('site.Role.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $role = Role::find($id);
        return view('site.Role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $roles = Role::find($id);
        $request->validate([
            'name' => ['required', 'string', 'max:255','lowercase'],
        ]);

        $roles->update([
            'name' => $request->name,
        ]);
            return redirect()->route('roles.index')->with('update', "Rol ma'lumoti o'zgaritirildi!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('roles.index')->with('delete', "Rol o'chirildi!");
    }
}
