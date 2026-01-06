<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Advantage;
use App\Models\Brand;
use App\Models\Comment;
use App\Models\Company;
use App\Models\Order;
use App\Models\Package;
use App\Models\SendContact;
use App\Models\Setting;
use App\Models\TicketType;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ApiController extends Controller
{
    public function setting()
    {
        $setting = Setting::all();
        return response()->json($setting, 200);
    }
    public function videos()
    {
        $video = Video::all();
        return $video;
    }
    public function comments()
    {
        $comment = Comment::all();
        return $comment;
    }
    public function packages()
    {
        $package = Package::all();
        return $package;
    }

    public function packages_show($id)
    {
        $package = Package::with(['company', 'ticket', 'avia'])->find($id);

        if (!$package) {
            return response()->json(['error' => 'Package not found'], 404);
        }

        // JSON formatdagi "advantages" ni massivga aylantiramiz
        $advantageIds = json_decode($package->advantages, true);

        // Agar $advantageIds bo'sh bo'lmasa, Advantage modelidan haqiqiy nomlarni olib kelamiz
        $advantages = Advantage::whereIn('id', $advantageIds)->get(['icon_name', 'name']);

        return response()->json([
            'id'              => $package->id,
            'company'         => $package->company->name ?? null,
            'company_photo'   => $package->company->logo ?? null,
            'avia_id'         => $package->avia->name ?? null,
            'avia_photo'      => $package->avia->logo ?? null,
            'photo'           => $package->photo,
            'ticket_type'     => $package->ticket->name ?? null,
            'price'           => $package->price,
            'name'            => $package->name,
            'total_duration'  => $package->total_duration,
            'departure_time'   => $package->departure_time ? Carbon::parse($package->departure_time)->format('d.m.Y') : null,
            'arrival_time'     => $package->arrival_time ? Carbon::parse($package->arrival_time)->format('d.m.Y') : null,
            'visa_type'       => $package->visa_type,
            'origin_city'     => $package->origin_city,
            'stopover_cities' => $package->stopover_cities,
            'destination_city' => $package->destination_city,
            'food'            => $package->food,
            'ambulance'       => $package->ambulance,
            'taxi_service'    => $package->taxi_service,
            'gift'            => $package->gift,
            'package_info'    => $package->package_info,
            'hotel_name'      => $package->hotel_name,
            'hotel_distance'  => $package->hotel_distance,
            'hotel_star_count' => $package->hotel_star_count,
            'hotel_info'      => $package->hotel_info,
            'hotel_image1'    => $package->hotel_image1,
            'hotel_image2'    => $package->hotel_image2,
            'hotel_image3'    => $package->hotel_image3,
            'advantages'      => $advantages, // Haqiqiy nom va ikonlar
            'count'           => $package->count,
        ]);
    }


    public function advantages()
    {
        $advantage = Advantage::all();
        return $advantage;
    }
    public function sendcontacts()
    {
        $sendcontact = SendContact::all();
        return $sendcontact;
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'fullname' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        $contact = SendContact::create($validated);

        return response()->json($contact, 201);
    }

    public function brands()
    {
        $brand = Brand::all();
        return $brand;
    }



    public function abouts()
    {
        $about = About::all();
        return $about;
    }

    public function sliders()
    {
        $sliders = DB::table('packages')
            ->join('companies', 'packages.company_id', '=', 'companies.id')
            ->select(
                'packages.id as id',
                'packages.name as title',
                'packages.package_info as description',
                'packages.photo as image',
                'companies.name as company_name',
                'companies.logo as company_logo'
            )
            ->orderBy('packages.id', 'desc')
            ->limit(5)
            ->get();

        return response()->json($sliders);
    }


    public function tourCards()
    {
        $tours = DB::table('packages')
            ->join('companies as c1', 'packages.company_id', '=', 'c1.id')
            ->join('companies as c2', 'packages.avia_id', '=', 'c2.id')
            ->join('ticket_types', 'packages.ticket_type_id', '=', 'ticket_types.id')
            ->select(
                'c1.logo as brand_logo1',
                'c2.logo as brand_logo2',
                'packages.photo as image',
                'ticket_types.name as title',
                'packages.origin_city',
                'packages.stopover_cities',
                'packages.destination_city',
                'packages.departure_time',
                'packages.arrival_time',
                'packages.price',
                'packages.id',
                'packages.count'
            )
            ->get()
            ->map(function ($item) {
                $departure = Carbon::parse($item->departure_time);
                $now = Carbon::now();
                $deadline = $now->diffInDays($departure, false); // salbiy chiqsa deadline o'tgan

                return [
                    'id' => $item->id,
                    'brand_logo1' => $item->brand_logo1,
                    'brand_logo2' => $item->brand_logo2,
                    'image' => $item->image,
                    'title' => $item->title,
                    'locals' => array_filter([
                        $item->origin_city,
                        ...explode(',', $item->stopover_cities ?? ''),
                        $item->destination_city
                    ]),
                    'date_start' => Carbon::parse($item->departure_time)->format('d M H:i'),
                    'date_end' => Carbon::parse($item->arrival_time)->format('d M H:i'),
                    'deadline' => $deadline > 0 ? $deadline : 0,
                    'price' => $item->price,
                    'count' => $item->count,
                ];
            });

        return response()->json($tours);
    }

    
    public function order_store(Request $request)
    {
        $request->validate([
            'package_id' => ['required', 'integer'],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'count' => ['required', 'integer'],
        ]);
    
        try {
            $order = Order::create([
                'package_id' => $request->package_id,
                'name' => $request->name,
                'phone' => $request->phone,
                'count' => $request->count,
            ]);

            $package = Package::find($request->package_id);
            $package_name = $package ? $package->name : "";
    
            // Xabar tayyorlash
            $text = "🛒 *Yangi Buyurtma!*\n\n"
                  . "📦 Paket ID: *{$package_name}*\n"
                  . "👤 Ismi: *{$order->name}*\n"
                  . "📞 Telefon: *{$order->phone}*\n"
                  . "🔢 Soni: *{$order->count}*\n"
                  . "🕒 Sana: *" . now()->format('d.m.Y H:i') . "*";
    
            // Telegramga yuborish
            Http::post("https://api.telegram.org/bot" . "7025144408:AAHJxgK1jgz25_zQIJxMwiku8wKhQM3MnfY" . "/sendMessage", [
                'chat_id' => -1002535729922,
                'text' => $text,
                'parse_mode' => 'Markdown',
            ]);
    
            return response()->json(['success' => true, 'message' => 'Buyurtma saqlandi'], 201);
    
        } catch (\Exception $e) {
            Log::error('Buyurtma saqlashda xatolik: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Xatolik yuz berdi!'], 500);
        }
    }
    

    public function getFilters()
    {
        // Mehmonxona masofalarini olish
        $distances = Package::whereNotNull('hotel_distance')->pluck('hotel_distance')->toArray();

        if (empty($distances)) {
            return response()->json([
                'avia_companies' => Company::where('type', 1)->select('id', 'name')->get(),
                'tour_types' => TicketType::select('id', 'name')->get(),
                'tour_companies' => Company::where('type', 0)->select('id', 'name')->get(),
                'hotel_distances' => []
            ]);
        }

        // Masofalarni saralash
        sort($distances);

        // Diapazonlar uchun belgilangan chegaralar
        $intervals = [0, 10, 15, 25, 50, 100, 200, 500, 1000, 2000];

        $ranges = [];
        $used = [];

        foreach ($distances as $distance) {
            for ($i = 0; $i < count($intervals) - 1; $i++) {
                if ($distance >= $intervals[$i] && $distance < $intervals[$i + 1]) {
                    $range = "{$intervals[$i]}-{$intervals[$i + 1]}";
                    if (!in_array($range, $used)) {
                        $ranges[] = $range;
                        $used[] = $range;
                    }
                }
            }
        }

        return response()->json([
            'avia_companies' => Company::where('type', 1)->select('id', 'name')->get(),
            'tour_types' => TicketType::select('id', 'name')->get(),
            'tour_companies' => Company::where('type', 0)->select('id', 'name')->get(),
            'hotel_distances' => $ranges
        ]);
    }




    public function searchTours(Request $request)
    {
        $query = Package::query();

        if ($request->has('avia_id') && $request->avia_id) {
            $query->where('avia_id', $request->avia_id);
        }

        if ($request->has('ticket_type_id') && $request->ticket_type_id) {
            $query->where('ticket_type_id', $request->ticket_type_id);
        }

        if ($request->has('company_id') && $request->company_id) {
            $query->where('company_id', $request->company_id);
        }

        // Mehmonxona masofasi bo‘yicha oraliq qidiruv
        if ($request->has('hotel_distance') && $request->hotel_distance) {
            $distanceRange = explode('-', $request->hotel_distance);
            if (count($distanceRange) === 2) {
                $query->whereBetween('hotel_distance', [(int)$distanceRange[0], (int)$distanceRange[1]]);
            }
        }

        // Natijalarni formatlash
        $tours = $query->with(['company', 'avia', 'ticket'])
            ->get()
            ->map(function ($item) {
                $departure = Carbon::parse($item->departure_time);
                $now = Carbon::now();
                $deadline = $now->diffInDays($departure, false);

                return [
                    'id' => $item->id,
                    'brand_logo1' => $item->company->logo ?? null,
                    'brand_logo2' => $item->avia->logo ?? null,
                    'image' => $item->photo,
                    'title' => $item->ticket->name ?? 'Noma’lum',
                    'locals' => array_filter([
                        $item->origin_city,
                        ...explode(',', $item->stopover_cities ?? ''),
                        $item->destination_city
                    ]),
                    'date_start' => Carbon::parse($item->departure_time)->format('d M H:i'),
                    'date_end' => Carbon::parse($item->arrival_time)->format('d M H:i'),
                    'deadline' => $deadline > 0 ? $deadline : 0,
                    'price' => $item->price,
                    'count' => $item->count,
                ];
            });

        return response()->json($tours);
    }
};
