@extends('admin.layout.base')

@section('title')
    | Tickets
@endsection

@section('content-header')
    <h3>
        Tickets
    </h3>
@endsection

@section('content')
    @if (session('message'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="col-sm-12">
        <a href="/admin/tickets/create" class="btn btn-primary mb-3 me-2 float-end">
            <i class="fa-solid fa-plus"></i> Create Ticket
        </a>
        <form action="{{ route('admin.tickets.search') }}" method="GET">
            @csrf
            <input type="search" name="search" class="form-control mb-3 mx-2 float-start" style="width: 198px;"
                placeholder="Search">
            <button class="btn btn-primary"><i class="far fa-magnifying-glass"></i></button>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>ID.</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Mobile Number</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->created_at }}</td>
                    </tr>
                    <tr>
                        <td colspan="6" class="p-0">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed text-white"
                                            style="background: #fccb90;
                                        background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
                                        background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{ $user->id }}" aria-expanded="false"
                                            aria-controls="collapseTwo">
                                            View {{ $user->name }}&apos;s tickets
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $user->id }}" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <table class="table table-striped table-hovered">
                                                <thead>
                                                    <tr>
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
                                                    @forelse ($user->tickets as $ticket)
                                                        <tr>
                                                            <td>{{ $ticket->ship->category->name }}</td>
                                                            <td>{{ $ticket->ship->departure }} -
                                                                {{ $ticket->ship->arrival }}</td>
                                                            <td>{{ $ticket->booking_date }}</td>
                                                            <td>{{ $ticket->ship->departure_time }} -
                                                                {{ $ticket->ship->arrival_time }}</td>
                                                            <td>{{ $ticket->ticket_quantity }}</td>
                                                            <td>
                                                                @if ($ticket->ticket_type == 145)
                                                                    Student without Aircon (&#8369;-145/Ticket)
                                                                @elseif($ticket->ticket_type == 50)
                                                                    Student with Aircon (&#8369;-50/Ticket)
                                                                @elseif($ticket->ticket_type == 0)
                                                                    Regular without Aircon
                                                                    (&#8369;{{ number_format($ticket->ship->ticket_price, 2) }}/Orig
                                                                    price)
                                                                @elseif($ticket->ticket_type == 150)
                                                                    Regular with Aircon (&#8369;+150/Ticket)
                                                                @else
                                                                    Premium with Aircon (&#8369;+200/Ticket)
                                                                @endif
                                                            </td>
                                                            <td>&#8369;{{ number_format($ticket->ship->ticket_price, 2) }}
                                                            </td>
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
                                                                    <span
                                                                        class="badge rounded-pill text-bg-danger">Pending</span>
                                                                @else
                                                                    <span
                                                                        class="badge rounded-pill text-bg-success">Paid</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($ticket->status == false)
                                                                    <a href="#" class="btn btn-info"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#mark{{ $ticket->id }}"><i
                                                                            class="far fa-xmark-circle"></i>
                                                                        Mark as paid</a>
                                                                @else
                                                                    <span class="btn btn-success">Paid</span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        @include('admin.tickets.mark')
                                                    @empty
                                                        <tr>
                                                            <td colspan="10" class="text-center">No tickets found</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="11" class="text-center">
                            No data found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div>
            {{ $users->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
