<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Package;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('package')->orderBy('id', 'desc')->get();
        return view('site.Order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $packages = Package::all();
        return view('site.Order.create', compact('packages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'package_id' => ['required', 'integer'],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'count' => ['required', 'integer'],
        ]);

        Order::create([
            'package_id' => $request->package_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'count' => $request->count,
        ]);

        return redirect()->route('orders.index')->with('create', "Yangi buyurtma qo'shildi!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('site.Order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $packages = Package::all();
        return view('site.Order.edit', compact('order', 'packages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'package_id' => ['required', 'integer'],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'count' => ['required', 'integer'],
        ]);

        $order->update([
            'package_id' => $request->package_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'count' => $request->count,
        ]);

        return redirect()->route('orders.index')->with('update', "Buyurtma ma'lumotlari o'zgartirildi!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('delete', "Buyurtma o'chirildi!");
    }
}
