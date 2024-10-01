<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Organizer;
use App\Models\Asset;
use App\Models\Resident;
use Illuminate\Support\Facades\DB;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $announcements = Announcement::with('images')->get();
        $announcements = Announcement::with('images')->latest()->take(3)->get();
        $recentNews = News::latest()->take(3)->get();
        $organizers = Organizer::all();
        $activities = Activity::orderBy('created_at', 'desc')->latest()->take(8)->get();
        $assets = Asset::all();
        return view('application.index', [
            'recentNews' => $recentNews,
            'announcements' => $announcements,
            'organizers' => $organizers,
            'activities' => $activities,
            'assets' => $assets,
        ]);
    }

    public function map()
    {
        $assets = Asset::all();
        return view('application.map', [
            'assets' => $assets,
        ]);
    }

    public function petakependudukan()
    {
        $assets = Asset::all();
        return view('application.maps.peta-kependudukan', [
            'assets' => $assets,
        ]);
    }

    public function petakondisijalan()
    {
        $assets = Asset::all();
        return view('application.maps.peta-kondisi-jalan', [
            'assets' => $assets,
        ]);
    }

    public function petasaranaprasarana()
    {
        $assets = Asset::all();
        return view('application.maps.peta-sarana-prasarana', [
            'assets' => $assets,
        ]);
    }

    public function news()
    {
        $assets = Asset::all();

        $news = News::paginate(9);
        return view('application.news', [
            'news' => $news,
            'assets' => $assets,
        ]);
    }

    public function news_details($slug)
    {
        $assets = Asset::all();
        $news = News::with('author')->where('slug', $slug)->firstOrFail();
        $recentNews = News::where('slug', '!=', $slug)->latest()->take(5)->get();

        return view('application.news-details', [
            'news' => $news,
            'assets' => $assets,
            'recentNews' => $recentNews,
        ]);
    }


    public function activity()
    {
        $assets = Asset::all();

        $activities = Activity::latest()->take(12)->paginate(12);
        return view('application.activities', [
            'activities' => $activities,
            'assets' => $assets,
        ]);
    }

    public function activity_details($id)
    {
        $assets = Asset::all();
        $activity = Activity::with('images')->findOrFail($id);
        return view('application.activity-details', [
            'activity' => $activity,
            'assets' => $assets,
        ]);
    }

    public function announcement()
    {
        $assets = Asset::all();

        $announcements = Announcement::with('images')->latest()->take(10)->paginate(10);
        return view('application.announcements', [
            'announcements' => $announcements,
            'assets' => $assets,
        ]);
    }

    public function datakependudukan()
    {
        $assets = Asset::all();
        $residents = Resident::latest()->paginate(10);
        $residentsByRT = Resident::select('RT', DB::raw('count(*) as total'))
            ->groupBy('RT')
            ->orderBy('RT')
            ->get();

        $residentsByRW = Resident::select('RW', DB::raw('count(*) as total'))
            ->groupBy('RW')
            ->orderBy('RW')
            ->get();
        return view('application.data-kependudukan', [
            'assets' => $assets,
            'residents' => $residents,
            'residentsByRT' => $residentsByRT,
            'residentsByRW' => $residentsByRW,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
