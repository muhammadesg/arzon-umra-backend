<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $package_count = DB::table('packages')->count();
        $comments_count = DB::table('comments')->count();
        $tour_companies_count = Company::where('type', 0)->count();
        $avia_companies_count = Company::where('type', 1)->count();
        return view('site.index', compact('package_count','comments_count','tour_companies_count','avia_companies_count'));

    }
}
