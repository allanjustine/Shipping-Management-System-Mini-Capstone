@extends('admin.layout.base')

@section('title')
    | Admin Ships
@endsection

@section('content-header')
    <h3>
        Ships
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
        <a href="/admin/ships/create" class="btn btn-primary mb-3 me-2 float-end">
            <i class="fa-solid fa-plus"></i> Add Ship
        </a>
        <form action="{{ route('admin.ships.search') }}" method="GET">
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
        <div>
            {{ $ships->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
