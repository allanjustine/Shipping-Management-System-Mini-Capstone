@extends('normal-view.layout.base')

@section('title')
    | My Tickets
@endsection

@section('content')
    <div class="container mt-3">
        @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show text-center mt-5" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <h3><i class="far fa-ticket"></i> My tickets</h3>
        <div class="table-responsive">
            <table class="table table-striped table-hovered">
                <thead>
                    <tr>
                        <th>ID no.</th>
                        <th>Ship name</th>
                        <th>Departure/Arrival</th>
                        <th>Date</th>
                        <th>Departure time/Arrival time</th>
                        <th>Ticket quantity</th>
                        <th>Ticket type</th>
                        <th>Ticket price</th>
                        <th>Total price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tickets as $ticket)
                        <tr>
                            <td>{{ $ticket->id }}</td>
                            <td>{{ $ticket->ship->category->name }}</td>
                            <td>{{ $ticket->ship->departure }} - {{ $ticket->ship->arrival }}</td>
                            <td>{{ $ticket->booking_date }}</td>
                            <td>{{ $ticket->ship->departure_time }} - {{ $ticket->ship->arrival_time }}</td>
                            <td>{{ $ticket->ticket_quantity }}</td>
                            <td>
                                @if ($ticket->ticket_type == 145)
                                    Student without Aircon (&#8369;-145/Ticket)
                                @elseif($ticket->ticket_type == 50)
                                    Student with Aircon (&#8369;-50/Ticket)
                                @elseif($ticket->ticket_type == 0)
                                    Regular without Aircon (&#8369;{{ number_format($ticket->ship->ticket_price, 2) }}/Orig
                                    price)
                                @elseif($ticket->ticket_type == 150)
                                    Regular with Aircon (&#8369;+150/Ticket)
                                @else
                                    Premium with Aircon (&#8369;+200/Ticket)
                                @endif
                            </td>
                            <td>&#8369;{{ number_format($ticket->ship->ticket_price, 2) }}</td>
                            <td>
                                @if ($ticket->ticket_type == 145)
                                    &#8369;{{ number_format($ticket->ship->ticket_price * $ticket->ticket_quantity - $ticket->ticket_type * $ticket->ticket_quantity, 2) }}
                                @elseif($ticket->ticket_type == 50)
                                    &#8369;{{ number_format($ticket->ship->ticket_price * $ticket->ticket_quantity - $ticket->ticket_type * $ticket->ticket_quantity, 2) }}
                                @elseif($ticket->ticket_type == 0)
                                    &#8369;{{ number_format($ticket->ship->ticket_price * $ticket->ticket_quantity + $ticket->ticket_type * $ticket->ticket_quantity, 2) }}
                                @elseif($ticket->ticket_type == 150)
                                    &#8369;{{ number_format($ticket->ship->ticket_price * $ticket->ticket_quantity + $ticket->ticket_type * $ticket->ticket_quantity, 2) }}
                                @else
                                    &#8369;{{ number_format($ticket->ship->ticket_price * $ticket->ticket_quantity + $ticket->ticket_type * $ticket->ticket_quantity, 2) }}
                                @endif
                            </td>
                            <td>
                                @if ($ticket->status == false)
                                    <span class="badge rounded-pill text-bg-danger">Pending</span>
                                @else
                                    <span class="badge rounded-pill text-bg-success">Paid</span>
                                @endif
                            </td>
                            <td>
                                @if ($ticket->status == false)
                                    <a href="#" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#cancel{{ $ticket->id }}"><i class="far fa-xmark-circle"></i>
                                        Cancel
                                        ticket</a>
                                @else
                                    <span class="btn btn-success">Paid</span>
                                @endif
                            </td>
                        </tr>
                        @include('normal-view.tickets.cancel')
                    @empty
                        <tr>
                            <td colspan="11" class="text-center">No tickets found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div>
                {{ $tickets->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
