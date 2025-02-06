<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Barryvdh\DomPDF\Facade\Pdf;

class EventController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        return Event::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date'
        ]);

        $event = Event::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'user_id' => auth()->id()
        ]);

        return response()->json($event);
    }

    public function update(Request $request, Event $event)
    {
        // Eğer policy kullanmak istemiyorsanız, authorize satırını kaldırabilirsiniz
        // $this->authorize('update', $event);

        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date'
        ]);

        $event->update($validated);

        return response()->json($event);
    }

    public function destroy(Event $event)
    {

        $event->delete();

        return response()->json(['message' => 'Event deleted successfully']);
    }

    public function exportPDF(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');

        $events = Event::where('user_id', auth()->id())
            ->whereYear('start_date', $year)
            ->whereMonth('start_date', $month)
            ->orderBy('start_date')
            ->get();

        $pdf = PDF::loadView('events', [
            'events' => $events,
            'month' => $month,
            'year' => $year
        ]);

        return $pdf->stream('events.pdf');
    }
}