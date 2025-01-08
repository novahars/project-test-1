<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
;

class DatadashboardController extends Controller
{



    public function index()
    {
        // Get recent tickets
        $recentTickets = Ticket::latest()->take(5)->get();

        // Return view with the recentTickets variable
        return view('dashboard', compact('recentTickets'));
    }






    public function dashboard()
    {
        $user = auth()->user();

        $openTicketsCount = Ticket::where('status', 'open')->count();
        $closedTicketsCount = Ticket::where('status', 'closed')->count();
        $inProgressTicketsCount = Ticket::where('status', 'in_progress')->count();
        $recentTickets = Ticket::orderBy('created_at', 'desc')->take(5)->get();

        return view('dashboard', compact(
            'user',
            'openTicketsCount',
            'closedTicketsCount',
            'inProgressTicketsCount',
            'recentTickets'
        ));
    }

}
