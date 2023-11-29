@extends('normal-view.layout.base')

@section('title')
    | Confirm Ticket
@endsection

@section('content')
    <div class="container">
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show text-center mt-5" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @error('ship_id')
            <div class="alert alert-danger alert-dismissible fade show text-center mt-5" role="alert">
                No available tickets. Please check another one.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @enderror
    </div>
    <div class="container d-flex justify-content-center my-5">
        <div class="card col-md-8">
            <div class="row">
                <img src="{{ Storage::url($ship->category->ship_image) }}" class="card-img-top"
                    alt="{{ $ship->category->name }}" style="width: 100%; height: 450px;">
                <div class="card-body p-5">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Departure: {{ $ship->departure }}</h3>
                        <h3 class="card-title">Arrival: {{ $ship->arrival }}</h3>
                    </div>
                    <p class="card-text"><strong>Ticket price:</strong>
                        &#8369;{{ number_format($ship->ticket_price, 2) }}
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
                    <form action="{{ route('create.ticket', $ship->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="number" name="ship_id" value="{{ $ship->id }}" hidden>
                        <div class="container">
                            <h3 class="mb-3">Please fill up below</h3>
                            <div class="mb-4">
                                <div class="form-outline">
                                    <input type="date" id="booking_date"
                                        class="form-control @error('booking_date') animated bounceIn is-invalid @enderror"
                                        name="booking_date" value="{{ old('booking_date') }}" autocomplete="name"
                                        autofocus />
                                    <label class="form-label" for="booking_date">Choose a date</label>
                                    @error('booking_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="form-outline">
                                    <input type="number" id="ticket_quantity"
                                        class="form-control @error('ticket_quantity') animated bounceIn is-invalid @enderror"
                                        name="ticket_quantity" value="{{ old('ticket_quantity') }}" autocomplete="name"
                                        autofocus />
                                    <label class="form-label" for="ticket_quantity">Ticket quantity</label>
                                    @error('ticket_quantity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="form-outline">
                                    <select name="ticket_type" id="ticket_type"
                                        class="form-select @error('ticket_type') animated bounceIn is-invalid @enderror"
                                        name="ticket_type" autocomplete="ticket_type" autofocus>
                                        <option selected hidden value="">Select ticket type</option>
                                        <option disabled>Select ticket type</option>
                                        <option value="145">Student without Aircon (&#8369;-145/Ticket)</option>
                                        <option value="50">Student with Aircon (&#8369;-50/Ticket)</option>
                                        <option value="0">Regular without Aircon
                                            (&#8369;{{ number_format($ship->ticket_price, 2) }}/Orig
                                            price)</option>
                                        <option value="150">Regular with Aircon (&#8369;+150/Ticket)</option>
                                        <option value="200">Premium with Aircon (&#8369;+200/Ticket)</option>
                                    </select>
                                    <label class="form-label" for="ticket_type">Ticket type</label>
                                    @error('ticket_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        @if ($ship->ticket_quantity == 0)
                            <button class="btn btn-primary w-100" disabled><i class="far fa-check"></i>
                                Book now</button>
                        @else
                            <button class="btn btn-primary w-100" type="submit"><i class="far fa-check"></i>
                                Book now</button>
                        @endif
                    </form>
                    <p><a href="#" class="btn btn-dark my-1 w-100" onclick="goBack()"><i
                                class="far fa-arrow-left"></i>
                            Back</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
