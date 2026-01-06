<?php

namespace App\Http\Controllers;

use App\Models\Brand;   
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::orderBy('id', 'desc')->get();
        return view('site.Brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('site.Brand.create');
    }

    /**
     * Store a newly created resource in storage.   
     */
    public function store(Request $request, )
    {
        // dd($request->all());
        $request->validate([
            'link' => ['required', 'max:255'],
            'image' => ['required', 'image'],
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('Brand', 'public');
        }

        Brand::create([
            'link' => $request->link,
            'image' => $path,
        ]);

        return redirect()->route('brands.index')->with('create', "Yangi hamkor qo'shildi!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        return view('site.Brand.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('site.Brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Brand $brand)
    {
        $request->validate([
            'link' => ['required', 'string', 'max:255'],
        ]);

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => ['required', 'image'],
            ]);
            $path = $request->file('image')->store('brand', 'public');
        } else {
            $path = $brand->image;
        }

        $brand->update([
            'link' => $request->link,
            'image' => $path,
        ]);

        return redirect()->route('brands.index')->with('update', "Hamkor ma'lumotlari o'zgartirildi!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('brands.index')->with('delete', "Hamkor o'chirildi!");
    }
}
