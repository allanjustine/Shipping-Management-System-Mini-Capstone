@extends('normal-view.layout.base')

@section('title')
    | {{ $category->name }} list
@endsection

@section('content')
    <div class="container">
        <h3 class="my-4"><i class="far fa-ship"></i> {{ $category->name }} details</h3>
        <div class="card">
            <img src="{{ Storage::url($category->ship_image) }}" class="card-img-top" alt="{{ $category->name }}"
                style="width: 100%; height: 450px;">
            <div class="row p-5">
                <h3 class="p-4"><i class="far fa-ship"></i> {{ $category->name }} details</h3>
                @if ($category)
                    @forelse ($category->ships as $ship)
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h3 class="card-title">Departure: {{ $ship->departure }}</h3>
                                        <h3 class="card-title">Arrival: {{ $ship->arrival }}</h3>
                                    </div>
                                    <p class="card-text"><strong>Ticket price:</strong>
                                        &#8369;{{ number_format($ship->ticket_price, 2) }}
                                    </p>
                                    <p class="card-text">
                                        <strong>Ship contact: </strong>
                                        {{ $ship->contact }}
                                    </p>
                                    <p class="card-text">
                                        <strong>Available ticket: </strong>
                                        @if ($ship->ticket_quantity != 0)
                                            {{ $ship->ticket_quantity }}
                                        @else
                                            <span class="badge bg-danger">
                                                No ticket available
                                            </span>
                                        @endif
                                    </p>

                                    <h5><strong>Departure and Arrival Time</strong></h5>
                                    <div class="d-flex justify-content-between">
                                        <p>{{ \Carbon\Carbon::parse($ship->departure_time)->format('h:i A') }}
                                            -
                                            {{ \Carbon\Carbon::parse($ship->arrival_time)->format('h:i A') }}
                                        </p>
                                    </div>
                                    <p class="card-text">{{ $ship->description }}</p>
                                    <a href="/confirm-ticket/{{ $ship->id }}" class="btn btn-primary"><i
                                            class="far fa-ticket"></i> Buy Ticket</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>No ships found</p>
                    @endforelse
                @else
                    <h1>No category found</h1>
                    <p><a href="#" class="btn btn-dark my-2 w-25" onclick="goBack()"><i class="far fa-arrow-left"></i>
                            Back</a></p>
                @endif
                <p><a href="#" class="btn btn-dark my-2 w-25" onclick="goBack()"><i class="far fa-arrow-left"></i>
                        Back</a></p>
            </div>
        </div>

    </div>
@endsection
