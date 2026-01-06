<?php

namespace App\Http\Controllers;

use App\Models\TicketType;
use Illuminate\Http\Request;

class TicketTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ticket_types = TicketType::all();
        return view('site.TicketTypes.index', compact('ticket_types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('site.TicketTypes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255']
        ]);

        TicketType::create([
            'name' => $request->name,
        ]);
            return redirect()->route('ticket_types.index')->with('create', " Yangi chipta turi qo'shildi!");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ticket_types = TicketType::find($id);
        return view('site.TicketTypes.show', compact('ticket_types'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ticket_types = TicketType::find($id);
        return view('site.TicketTypes.edit', compact('ticket_types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TicketType $ticketType)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $ticketType->update([
            'name' => $request->name,
        ]);
            return redirect()->route('ticket_types.index')->with('update', "Chipta ma'lumoti o'zgaritirildi!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TicketType $ticketType)
    {
        $ticketType->delete();
        return redirect()->route('ticket_types.index')->with('delete', "Chipta turi o'chirildi!");

    }
}
