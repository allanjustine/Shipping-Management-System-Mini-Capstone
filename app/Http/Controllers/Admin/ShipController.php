<?php

namespace App\Http\Controllers\Admin;

use App\Events\UserLog;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Ship;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ShipController extends Controller
{
    public function searchShip(Request $request)
    {
        $search = $request->search;

        $ships = Ship::with('category')
            ->where(function ($query) use ($search) {
                $query->where('departure', 'like', "%$search%")
                    ->orWhere('arrival', 'like', "%$search%")
                    ->orWhere('departure_time', 'like', "%$search%")
                    ->orWhere('arrival_time', 'like', "%$search%")
                    ->orWhere('ticket_price', 'like', "%$search%")
                    ->orWhere('contact', 'like', "%$search%")
                    ->orWhere('ticket_quantity', 'like', "%$search%");
            })
            ->orWhereHas('category', function ($categoryQuery) use ($search) {
                $categoryQuery->where('name', 'like', "%$search%");
            })
            ->orderBy('created_at', 'asc')
            ->get();

        return view('admin.ships.searched', compact('ships', 'search'));
    }

    public function index(Ship $ship)
    {
        $ships = Ship::orderBy('created_at', 'asc')->with('category')->paginate(10);

        return view('admin.ships.index', compact('ships'));
    }

    public function createShip()
    {
        $categories = Category::all();

        return view('admin.ships.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'departure'               =>          ['required'],
            'arrival'                 =>          ['required'],
            'departure_time'          =>          ['required'],
            'arrival_time'            =>          ['required'],
            'ticket_price'            =>          ['required', 'numeric', 'min:1'],
            'contact'                 =>          ['required'],
            'ticket_quantity'         =>          ['required', 'numeric', 'min:1'],
            'category_id'             =>          ['required']
        ]);

        $ship = Ship::create([
            'departure'             =>          $request->departure,
            'arrival'               =>          $request->arrival,
            'departure_time'        =>          $request->departure_time,
            'arrival_time'          =>          $request->arrival_time,
            'ticket_price'          =>          $request->ticket_price,
            'contact'               =>          $request->contact,
            'ticket_quantity'       =>          $request->ticket_quantity,
            'category_id'           =>          $request->category_id
        ]);

        $log_entry = Auth::user()->name . " added a new ship detail departure: " . $ship->departure . " arrival: " . $ship->arrival .  " with the id# " . $ship->id;
        event(new UserLog($log_entry));

        return redirect('/admin/ships')->with('message', 'Ship detail added successfully');
    }

    public function updateShip(Ship $ship)
    {

        $categories = Category::all();
        return view('admin.ships.edit', compact('ship', 'categories'));
    }

    public function update(Request $request, Ship $ship)
    {
        $request->validate([
            'departure'               =>          ['required'],
            'arrival'                 =>          ['required'],
            'departure_time'          =>          ['required'],
            'arrival_time'            =>          ['required'],
            'ticket_price'            =>          ['required', 'numeric', 'min:1'],
            'contact'                 =>          ['required'],
            'ticket_quantity'         =>          ['required', 'numeric', 'min:1'],
            'category_id'             =>          ['required']
        ]);

        $ship->update([
            'departure'             =>          $request->departure,
            'arrival'               =>          $request->arrival,
            'departure_time'        =>          $request->departure_time,
            'arrival_time'          =>          $request->arrival_time,
            'ticket_price'          =>          $request->ticket_price,
            'contact'               =>          $request->contact,
            'ticket_quantity'       =>          $request->ticket_quantity,
            'category_id'           =>          $request->category_id
        ]);

        $log_entry = Auth::user()->name . " updated an ship detail departure: " . $ship->departure . " arrival: " . $ship->arrival . " with the id# " . $ship->id;
        event(new UserLog($log_entry));

        return redirect('/admin/ships')->with('message', 'Ship detail updated successfully');
    }

    public function delete(Ship $ship)
    {
        $log_entry = Auth::user()->name . " deleted the ship detail with the id# " . $ship->id;
        event(new UserLog($log_entry));

        if (!empty($ship->ship_image)) {
            foreach ($ship->ship_image as $existingImage) {
                if (!Str::contains($existingImage, 'no-image.png')) {
                    Storage::disk('public')->delete($existingImage);
                }
            }
        }

        $ship->delete();

        return redirect('/admin/ships')->with('message', 'Ship detail deleted successfully');
    }
}
