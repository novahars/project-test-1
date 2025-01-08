<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\User;

class Ticketcontroller extends Controller
{
    public function index()
    {
        // Cek peran pengguna
        if (auth()->user()->role == 'regular_user') {
            // Ambil tiket yang dibuat oleh user yang sedang login
            $tickets = Ticket::where('user_id', auth()->user()->id)
                ->paginate(10);
        } elseif (auth()->user()->role == 'agent') {
            // Ambil tiket yang ditugaskan ke agen yang sedang login
            $tickets = Ticket::where('assigned_agent_id', auth()->user()->id)
                ->paginate(10);
        } else {
            // Ambil semua tiket jika pengguna adalah admin
            $tickets = Ticket::paginate(10);
        }

        // Kirim data tiket ke view
        return view('admin/tickets.index', compact('tickets'));
    }

    public function create()
    {
        return view('admin/tickets.create');
    }

    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:open,in_progress,closed',
        ]);

        // Simpan data ticket
        Ticket::create([
            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->priority,
            'status' => $request->status,
            'created_by' => auth()->id(), // Gunakan created_by alih-alih user_id
        ]);


        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('tickets.index')->with('success', 'Ticket berhasil dibuat!');
    }
    public function destroy($id)
    {
        // Cari tiket berdasarkan ID
        $ticket = Ticket::findOrFail($id);

        // Hapus tiket
        $ticket->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('tickets.index')->with('success', 'Tiket berhasil dihapus!');
    }

    public function edit($id)
    {
        // Cari tiket berdasarkan ID
        $ticket = Ticket::findOrFail($id);

        $agents = User::where('role', 'agent')->get();
        // Kirim data tiket ke view edit
        return view('admin/tickets.edit', compact('ticket', 'agents'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:open,in_progress,closed',
            'assigned_agent_id' => 'nullable|exists:users,id',

        ]);

        // Cari tiket berdasarkan ID
        $ticket = Ticket::findOrFail($id);

        // Update data tiket
        $ticket->update([
            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->priority,
            'status' => $request->status,
            'assigned_agent_id' => $request->assigned_agent_id,
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('tickets.index')->with('success', 'Tiket berhasil diperbarui!');
    }
    public function show($id)
    {
        // Ambil data tiket beserta relasi terkait
        $ticket = Ticket::with(['user', 'comments.user', 'categories', 'labels', 'attachments'])
            ->findOrFail($id);

        return view('admin.tickets.show', compact('ticket'));
    }
    public function agentDashboard()
    {
        // Ambil semua tiket dengan paginasi
        $allTickets = Ticket::paginate(10);

        // Ambil tiket yang ditugaskan ke agent yang sedang login
        $assignedTickets = Ticket::where('assigned_agent_id', auth()->id())->paginate(10);

        return view('agent.dashboard', compact('allTickets', 'assignedTickets'));
    }
    public function comments($id)
    {
        // Ambil tiket berdasarkan ID
        $ticket = Ticket::with('comments')->findOrFail($id);

        // Kirim data ke view
        return view('agent.tickets.comments', compact('ticket'));
    }


}
