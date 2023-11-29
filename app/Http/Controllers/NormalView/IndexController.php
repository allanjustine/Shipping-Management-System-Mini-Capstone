<?php

namespace App\Http\Controllers\NormalView;

use App\Events\UserLog;
use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\Category;
use App\Models\Ship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function shipList()
    {
        $categories = Category::withCount('ships')->get();

        return view('normal-view.pages.index', compact('categories'));
    }

    public function categoryList(Category $category)
    {

        $categories = Category::orderBy('name', 'asc')->with('ships')->get();

        return view('normal-view.pages.category-list', compact('category', 'categories'));
    }

    public function tickets()
    {

        $tickets = Ticket::orderBy('created_at', 'asc')->where('user_id', auth()->id())->with('ship')->paginate(10);

        return view('normal-view.tickets.index', compact('tickets'));
    }

    public function confirmTicket(Ship $ship)
    {
        return view('normal-view.tickets.confirm-tickets', compact('ship'));
    }

    public function ticketCreate(Request $request)
    {
        $request->validate([
            'ship_id'           =>          ['required'],
            'booking_date'      =>          ['required'],
            'ticket_quantity'   =>          ['required'],
            'ticket_type'       =>          ['required']
        ]);
        $ticket = Ticket::create([
            'ship_id'           =>          $request->ship_id,
            'booking_date'      =>          $request->booking_date,
            'ticket_quantity'   =>          $request->ticket_quantity,
            'ticket_type'       =>          $request->ticket_type,
            'user_id'           =>          auth()->id()
        ]);

        $shipD = $ticket->ship;

        if ($shipD->ticket_quantity == 0) {
            return back()->with('error', 'No available tickets. Please check another one.');
        } else {
            $shipD->decrement('ticket_quantity', $ticket->ticket_quantity);

            $departure = $shipD->departure;
            $arrival = $shipD->arrival;
            $shipName = $shipD->category->name;

            $log_entry = Auth::user()->name . " has booked a ticket on ship: " . $shipName . " departure: " . $departure . " arrival " . $arrival . " with the id# " . $shipD->id;
            event(new UserLog($log_entry));

            return redirect('/tickets')->with('message', 'You successfully booked a ticket. Please pay to the cashier if you arrived at the pier');
        }
    }

    public function cancelled(Ticket $ticket)
    {
        $ship = $ticket->ship;
        $ship->increment('ticket_quantity', $ticket->ticket_quantity);

        $ticket->delete();

        $departure = $ship->departure;
        $arrival = $ship->arrival;
        $shipName = $ship->category->name;

        $log_entry = Auth::user()->name . " has cancelled a booking ticket on ship: " . $shipName . " departure: " . $departure . " arrival " . $arrival . " with the id# " . $ticket->id;
        event(new UserLog($log_entry));

        return redirect('/tickets')->with('message', 'Ticket cancelled successfully');
    }

    public function searchShip(Request $request)
    {
        $search = $request->search;

        $categories = Category::with(['ships' => function ($query) use ($search) {
            $query->where('departure', 'like', "%$search%")
                ->orWhere('arrival', 'like', "%$search%")
                ->orWhere('departure_time', 'like', "%$search%")
                ->orWhere('arrival_time', 'like', "%$search%")
                ->orWhere('ticket_price', 'like', "%$search%")
                ->orWhere('contact', 'like', "%$search%")
                ->orWhere('ticket_quantity', 'like', "%$search%");
        }])
            ->where(function ($query) use ($search) {
                $query->where('name', 'like', "%$search%")
                    ->orWhere('remarks', 'like', "%$search%");
            })
            ->orWhereHas('ships', function ($query) use ($search) {
                $query->where('departure', 'like', "%$search%")
                    ->orWhere('arrival', 'like', "%$search%")
                    ->orWhere('departure_time', 'like', "%$search%")
                    ->orWhere('arrival_time', 'like', "%$search%")
                    ->orWhere('ticket_price', 'like', "%$search%")
                    ->orWhere('contact', 'like', "%$search%")
                    ->orWhere('ticket_quantity', 'like', "%$search%");
            })
            ->orderBy('created_at', 'asc')
            ->withCount('ships')
            ->get();
        $navCategories = Category::all();
        return view('normal-view.pages.searched', compact('search', 'categories', 'navCategories'));
    }
}
