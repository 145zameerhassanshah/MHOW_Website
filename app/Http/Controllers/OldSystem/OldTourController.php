<?php

namespace App\Http\Controllers\OldSystem;

use App\Http\Controllers\Controller;
use App\Models\OldTour;
use Illuminate\Http\Request;

class OldTourController extends Controller
{
    public function index()
    {
        $events = OldTour::select('title')->distinct()->pluck('title');
        $tours = OldTour::limit(50)->get();
        return view('oldsystem.tours.index', compact('tours', 'events'));
    }

    public function search(Request $request)
    {
        $query = OldTour::query();

        if ($request->filled('name')) {
            $query->whereRaw("CONCAT(first_name, ' ', surname) LIKE ?", ['%' . $request->name . '%']);
        }

        if ($request->filled('event')) {
            $query->where('title', $request->event);
        }

        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        $tours = $query->get();

        $html = view('oldsystem.tours.table', compact('tours'))->render();

        return response()->json(['html' => $html]);
    }
}
