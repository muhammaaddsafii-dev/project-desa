<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Organizer;
use App\Models\Asset;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $announcements = Announcement::with('images')->get();
        $news = News::with('author')->get();
        $organizers = Organizer::all();
        $activities = Activity::all();
        $assets = Asset::all();
        return view('application.index', [
            'news' => $news,
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
        $news = News::all();
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

    public function activity_details($id)
    {
        $assets = Asset::all();
        $activity = Activity::with('images')->findOrFail($id);
        return view('application.activity-details', [
            'activity' => $activity,
            'assets' => $assets,
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
