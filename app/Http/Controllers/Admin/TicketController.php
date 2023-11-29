<?php

namespace App\Http\Controllers\Admin;

use App\Events\UserLog;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Ship;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index()
    {
        $users = User::has('tickets')->orderBy('created_at', 'asc')->with(['tickets'])->paginate(10);
        return view('admin.tickets.index', compact('users'));
    }


    public function marked(Ticket $ticket)
    {

        $ticket->update([
            'status'        =>      true,
        ]);

        $user = $ticket->user;

        $log_entry = Auth::user()->name . " mark as paid " . $user->name . " ticket. " . " with the id# " . $ticket->id;
        event(new UserLog($log_entry));

        return redirect('/admin/tickets')->with('message', 'Marked as paid successfully');
    }

    public function searchTicket(Request $request)
    {
        $search = $request->search;

        $users = User::has('tickets')->with(['tickets'])->where(function ($query) use ($search) {
            $query->where('name', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%")
                ->orWhere('gender', 'like', "%$search%")
                ->orWhere('address', 'like', "%$search%");
        })
            ->orderBy('created_at', 'asc')
            ->get();

        return view('admin.tickets.searched', compact('users', 'search'));
    }

    public function createTicket()
    {
        $users = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'Admin');
        })->get();
        $categories = Category::all();
        $ships = Ship::all();
        return view('admin.tickets.create', compact('users', 'categories', 'ships'));
    }

    public function createNow(Request $request)
    {
        $request->validate([
            'ship_id'           =>          ['required'],
            'booking_date'      =>          ['required'],
            'ticket_quantity'   =>          ['required'],
            'ticket_type'       =>          ['required'],
            'user_id'           =>          ['required']
        ]);
        $ticket = Ticket::create([
            'ship_id'           =>          $request->ship_id,
            'booking_date'      =>          $request->booking_date,
            'ticket_quantity'   =>          $request->ticket_quantity,
            'ticket_type'       =>          $request->ticket_type,
            'user_id'           =>          $request->user_id
        ]);

        $shipD = $ticket->ship;

        if ($shipD->ticket_quantity == 0) {
            return back()->with('error', 'No available tickets. Please check another one.');
        } else {
            $shipD->decrement('ticket_quantity', $ticket->ticket_quantity);

            $departure = $shipD->departure;
            $arrival = $shipD->arrival;
            $shipName = $shipD->category->name;
            $user = $ticket->user;

            $log_entry = Auth::user()->name . " has booked a ticket on ship: " . $shipName . " departure: " . $departure . " arrival " . $arrival . " for " . $user->name . " with the id# " . $shipD->id;
            event(new UserLog($log_entry));

            return redirect('/admin/tickets')->with('message', 'You successfully booked a ticket of ' . $user->name);
        }
    }
}
