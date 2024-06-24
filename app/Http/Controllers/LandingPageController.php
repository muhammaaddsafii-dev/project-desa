<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Models\News;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $announcements = Announcement::all();
        $news = News::all();
        return view('application.index', [
            'news' => $news,
            'announcements' => $announcements,
        ]);
    }

    public function news()
    {
        $news = News::all();
        return view('application.news', [
            'news' => $news,
        ]);
    }

    public function news_details($slug)
    {
        $news = News::find($slug);
        return view('application.news-details', compact('news'));
    }

    public function activity()
    {
        return view('application.activity-details');
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
