@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Welcome Back Section -->
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="text-3xl font-semibold text-gray-800">
                @auth
                    Welcome back, {{ auth()->user()->name }}!
                @else
                    Welcome back, Guest!
                @endauth
            </h1>
        </div>
    </div>

    <!-- Recent Tickets Section -->
    <div class="row">
        <div class="col-12">
            <h2 class="text-2xl font-semibold mb-4">Recent Tickets</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Ticket ID</th>
                        <th>Title</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <div class="recent-tickets">
                        <h5>Recent Tickets</h5>
                        <ul>
                            @forelse ($recentTickets as $ticket)
                                <li>{{ $ticket->title }} - {{ ucfirst($ticket->status) }}</li>
                            @empty
                                <li>No recent tickets available.</li>
                            @endforelse
                        </ul>
                    </div>

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection