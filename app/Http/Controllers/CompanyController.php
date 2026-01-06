<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Company;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::orderBy('id', 'desc')->get();
        return view('site.Companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('site.Companies.create');
    }

    /**
     * Store a newly created resource in storage.   
     */
    public function store(Request $request, )
    {
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'max:255'],
            'type' => ['required', 'max:255'],
            'logo' => ['required', 'image'],
        ]);

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('Company', 'public');
        }

        Company::create([
            'name' => $request->name,
            'type' => $request->type,
            'logo' => $path,
        ]);

        return redirect()->route('companies.index')->with('create', "Yangi kompaniya qo'shildi!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return view('site.Companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('site.Companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Company $company)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
        ]);

        if ($request->hasFile('logo')) {
            $request->validate([
                'logo' => ['required', 'image'],
            ]);
            $path = $request->file('logo')->store('Company', 'public');
        } else {
            $path = $company->logo;
        }

        $company->update([
            'name' => $request->name,
            'type' => $request->type,
            'logo' => $path,
        ]);

        return redirect()->route('companies.index')->with('update', "Kompaniya ma'lumotlari o'zgartirildi!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('delete', "Kompaniya o'chirildi!");
    }
}
