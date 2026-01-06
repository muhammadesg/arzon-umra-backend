<?php

namespace App\Http\Controllers;

use App\Models\Advantage;
use App\Models\Company;
use App\Models\Course;
use App\Models\Package;
use App\Models\TicketType;
use App\Models\Video;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = Package::orderBy('id', 'desc')->get();
        return view('site.Packages.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $advantages = Advantage::all();
        $tour_companies = Company::where('type', 0)->get();
        $avia_companies = Company::where('type', 1)->get();
        $ticket_types = TicketType::all();
        if (count($advantages) <= 0) {
            return redirect()->route('advantages.index')->with('update', "Ma'lumot qo'shilmagan");
        } else if (count($tour_companies) <= 0) {
            return redirect()->route('companies.index')->with('update', "Turga ma'lumot qo'shilmagan");
        } else if (count($avia_companies) <= 0) {
            return redirect()->route('companies.index')->with('update', "Aviaga ma'lumot qo'shilmagan");
        } else if (count($ticket_types) <= 0) {
            return redirect()->route('ticket_types.index')->with('update', "Ma'lumot qo'shilmagan");
        }
        return view('site.Packages.create', compact('advantages', 'tour_companies', 'avia_companies', 'ticket_types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'company_id' => 'required|exists:companies,id',
            'avia_id' => 'required|exists:companies,id',
            'photo' => 'required|image|mimes:jpeg,png,jpg',
            'ticket_type_id' => 'required|exists:ticket_types,id',
            'price' => 'required|numeric',
            'name' => 'required|string|max:255',
            'total_duration' => 'required|integer',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date',
            'visa_type' => 'required|string|max:255',
            'origin_city' => 'required|string|max:255',
            'stopover_cities' => 'nullable|string|max:255',
            'destination_city' => 'required|string|max:255',
            'food' => 'required|string|max:255',
            'ambulance' => 'required|string|max:255',
            'taxi_service' => 'required|string|max:255',
            'gift' => 'required|string|max:255',
            'package_info' => 'required|string',
            'hotel_name' => 'required|string|max:255',
            'hotel_distance' => 'required|integer',
            'hotel_star_count' => 'required|integer|min:1|max:5',
            'hotel_info' => 'required|string',
            'hotel_image1' => 'required|image|mimes:jpeg,png,jpg',
            'hotel_image2' => 'required|image|mimes:jpeg,png,jpg',
            'hotel_image3' => 'required|image|mimes:jpeg,png,jpg',
            'advantages' => 'required|array',
            'advantages.*' => 'exists:advantages,id',
            'count' => 'required|integer|min:1',
        ]);

        $photoPath = $request->file('photo')->store('packages/photos', 'public');
        $hotelImage1Path = $request->file('hotel_image1')->store('packages/hotels', 'public');
        $hotelImage2Path = $request->file('hotel_image2') ? $request->file('hotel_image2')->store('packages/hotels', 'public') : null;
        $hotelImage3Path = $request->file('hotel_image3') ? $request->file('hotel_image3')->store('packages/hotels', 'public') : null;

        $package = new Package();
        $package->company_id = $validated['company_id'];
        $package->avia_id = $validated['avia_id'];
        $package->photo = $photoPath;
        $package->ticket_type_id = $validated['ticket_type_id'];
        $package->price = $validated['price'];
        $package->name = $validated['name'];
        $package->total_duration = $validated['total_duration'];
        $package->departure_time = $validated['departure_time'];
        $package->arrival_time = $validated['arrival_time'];
        $package->visa_type = $validated['visa_type'];
        $package->origin_city = $validated['origin_city'];
        $package->stopover_cities = $validated['stopover_cities'];
        $package->destination_city = $validated['destination_city'];
        $package->food = $validated['food'];
        $package->ambulance = $validated['ambulance'];
        $package->taxi_service = $validated['taxi_service'];
        $package->gift = $validated['gift'];
        $package->package_info = $validated['package_info'];
        $package->hotel_name = $validated['hotel_name'];
        $package->hotel_distance = $validated['hotel_distance'];
        $package->hotel_star_count = $validated['hotel_star_count'];
        $package->hotel_info = $validated['hotel_info'];
        $package->hotel_image1 = $hotelImage1Path;
        $package->hotel_image2 = $hotelImage2Path;
        $package->hotel_image3 = $hotelImage3Path;
        $package->advantages = json_encode($validated['advantages']);
        $package->count = $validated['count'];
        $package->save();

        return redirect()->route('packages.index')->with('create', 'Package created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Package $package)
    {
        $advantageIds = json_decode($package->advantages);
        $advantages = Advantage::whereIn('id', $advantageIds)->pluck('name');
        return view('site.Packages.show', compact('package', 'advantages'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Package $package)
    {
        $advantages = Advantage::all();
        $tour_companies = Company::where('type', 0)->get();
        $avia_companies = Company::where('type', 1)->get();
        $ticket_types = TicketType::all();

        return view('site.Packages.edit', compact('package', 'advantages', 'tour_companies', 'avia_companies', 'ticket_types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'company_id' => 'required|exists:companies,id',
            'avia_id' => 'required|exists:companies,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg',
            'ticket_type_id' => 'required|exists:ticket_types,id',
            'price' => 'required|numeric',
            'name' => 'required|string|max:255',
            'total_duration' => 'required|integer',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date',
            'visa_type' => 'required|string|max:255',
            'origin_city' => 'required|string|max:255',
            'stopover_cities' => 'nullable|string|max:255',
            'destination_city' => 'required|string|max:255',
            'food' => 'required|string|max:255',
            'ambulance' => 'required|string|max:255',
            'taxi_service' => 'required|string|max:255',
            'gift' => 'required|string|max:255',
            'package_info' => 'required|string',
            'hotel_name' => 'required|string|max:255',
            'hotel_distance' => 'required|integer',
            'hotel_star_count' => 'required|integer|min:1|max:5',
            'hotel_info' => 'required|string',
            'hotel_image1' => 'nullable|image|mimes:jpeg,png,jpg',
            'hotel_image2' => 'nullable|image|mimes:jpeg,png,jpg',
            'hotel_image3' => 'nullable|image|mimes:jpeg,png,jpg',
            'advantages' => 'required|array',
            'advantages.*' => 'exists:advantages,id',
            'count' => 'required|integer|min:1',
        ]);

        $package = Package::findOrFail($id);

        // Rasm fayllarini saqlash
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('packages/photos', 'public');
            $package->photo = $photoPath;
        }

        if ($request->hasFile('hotel_image1')) {
            $hotelImage1Path = $request->file('hotel_image1')->store('packages/hotels', 'public');
            $package->hotel_image1 = $hotelImage1Path;
        }

        if ($request->hasFile('hotel_image2')) {
            $hotelImage2Path = $request->file('hotel_image2')->store('packages/hotels', 'public');
            $package->hotel_image2 = $hotelImage2Path;
        }

        if ($request->hasFile('hotel_image3')) {
            $hotelImage3Path = $request->file('hotel_image3')->store('packages/hotels', 'public');
            $package->hotel_image3 = $hotelImage3Path;
        }

        // Boshqa ma'lumotlarni yangilash
        $package->company_id = $validated['company_id'];
        $package->avia_id = $validated['avia_id'];
        $package->ticket_type_id = $validated['ticket_type_id'];
        $package->price = $validated['price'];
        $package->name = $validated['name'];
        $package->total_duration = $validated['total_duration'];
        $package->departure_time = $validated['departure_time'];
        $package->arrival_time = $validated['arrival_time'];
        $package->visa_type = $validated['visa_type'];
        $package->origin_city = $validated['origin_city'];
        $package->stopover_cities = $validated['stopover_cities'];
        $package->destination_city = $validated['destination_city'];
        $package->food = $validated['food'];
        $package->ambulance = $validated['ambulance'];
        $package->taxi_service = $validated['taxi_service'];
        $package->gift = $validated['gift'];
        $package->package_info = $validated['package_info'];
        $package->hotel_name = $validated['hotel_name'];
        $package->hotel_distance = $validated['hotel_distance'];
        $package->hotel_star_count = $validated['hotel_star_count'];
        $package->hotel_info = $validated['hotel_info'];
        $package->advantages = json_encode($validated['advantages']);
        $package->count = $validated['count'];

        $package->save();

        return redirect()->route('packages.index')->with('update', 'Package updated successfully!');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Package $package)
    {
        $package->delete();
        return redirect()->route('packages.index')->with('delete', "To'plam     o'chirildi!");
    }
}
