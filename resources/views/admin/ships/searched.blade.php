@extends('admin.layout.base')

@section('title')
    | @if ($search)
        Search result for "{{ $search }}"
    @else
        Ops! No records found!
    @endif
@endsection

@section('content-header')
    <h3>
        @if ($search)
            Search result for "{{ $search }}"
        @else
            Ops! No records found!
        @endif
    </h3>
@endsection

@section('content')
    @if ($search)
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>ID.</th>
                        <th>Ship name</th>
                        <th>Departure</th>
                        <th>Arrival</th>
                        <th>Departure time</th>
                        <th>Arrival time</th>
                        <th>Ticket price</th>
                        <th>Ship contact</th>
                        <th>Quantity</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($ships as $ship)
                        <tr>
                            <td>{{ $ship->id }}</td>
                            <td>{{ $ship->category->name }}</td>
                            <td>{{ $ship->departure }}</td>
                            <td>{{ $ship->arrival }}</td>
                            <td>{{ \Carbon\Carbon::parse($ship->departure_time)->format('h:i A') }}</td>
                            <td>{{ \Carbon\Carbon::parse($ship->arrival_time)->format('h:i A') }}</td>
                            <td>&#8369;{{ number_format($ship->ticket_price, 2) }}</td>
                            <td>{{ $ship->contact }}</td>
                            <td>{{ $ship->ticket_quantity }}</td>
                            <td>
                                <a href="/admin/ships/update/{{ $ship->id }}" class="btn btn-primary mb-1"><i
                                        class="far fa-pen-to-square"></i> Edit</a>
                                <a href="#" class="btn btn-danger mb-1" data-bs-toggle="modal"
                                    data-bs-target="#deleteShip{{ $ship->id }}"><i class="far fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                        @include('admin.ships.delete')
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">
                                No data found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <button class="btn btn-dark" onclick="goBack()">Back <i class="far fa-arrow-left"></i></button>
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>ID.</th>
                        <th>Ship name</th>
                        <th>Departure</th>
                        <th>Arrival</th>
                        <th>Departure time</th>
                        <th>Arrival time</th>
                        <th>Ticket price</th>
                        <th>Ship contact</th>
                        <th>Quantity</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="9" class="text-center">
                            No data found.
                        </td>
                    </tr>
                </tbody>
            </table>
            <button class="btn btn-dark" onclick="goBack()">Back <i class="far fa-arrow-left"></i></button>
        </div>
    @endif
@endsection
