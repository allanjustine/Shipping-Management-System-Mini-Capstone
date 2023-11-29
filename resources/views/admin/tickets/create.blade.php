@extends('admin.layout.base')

@section('title')
    | Create
@endsection

@section('content-header')
    <h3>
        Create
    </h3>
@endsection

@section('content')
    <div class="card bg-glass">
        <div class="card-body px-4 py-5 px-md-5">
            <form method="POST" action="{{ route('admin.tickets.create') }}">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <select name="user_id" id="user_id" class="form-select @error('user_id') is-invalid animated bounceIn @enderror"
                                name="user_id" autocomplete="user_id" autofocus>
                                <option selected hidden value="">Select User</option>
                                <option disabled>Select User</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            <label class="form-label" for="user_id">Select User</label>
                            @error('user_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>The user field is required.</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <select name="ship_id" id="ship_id" class="form-select @error('ship_id') is-invalid animated bounceIn @enderror"
                                name="ship_id" autocomplete="ship_id" autofocus>
                                <option selected hidden value="">Select Category</option>
                                <option disabled>Select Category</option>
                                @foreach ($ships as $ship)
                                    <option value="{{ $ship->id }}">{{ $ship->category->name }}: {{ $ship->departure }}
                                        - {{ $ship->arrival }} / Time: {{ $ship->departure_time }} -
                                        {{ $ship->arrival_time }}</option>
                                @endforeach
                            </select>
                            <label class="form-label" for="ship_id">Select Category</label>
                            @error('ship_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>The category field is required.</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mb-4">
                    <div class="form-outline">
                        <input type="date" id="booking_date"
                            class="form-control @error('booking_date') is-invalid animated bounceIn @enderror" name="booking_date"
                            value="{{ old('booking_date') }}" autocomplete="booking_date" autofocus />
                        <label class="form-label" for="booking_date">Booking date</label>
                        @error('booking_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-4">
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
                    <div class="col-md-6 mb-4">
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

                <button type="submit" class="btn btn-primary btn-block">
                    Create ticket
                </button>
            </form>
        </div>
    </div>
@endsection
