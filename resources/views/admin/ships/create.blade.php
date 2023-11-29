@extends('admin.layout.base')

@section('title')
    | Ship Create
@endsection

@section('content-header')
    <h3>
        Ship Create
    </h3>
@endsection

@section('content')
    <div class="card bg-glass">
        <div class="card-body px-4 py-5 px-md-5">
            <form method="POST" action="{{ route('admin.ships.create') }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <div class="form-outline">
                        <select name="category_id" id="category_id"
                            class="form-select @error('category_id') is-invalid @enderror" name="category_id"
                            autocomplete="category_id" autofocus>
                            <option selected hidden value="">Select Category</option>
                            <option disabled>Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <label class="form-label" for="category_id">Select Category</label>
                        @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>The category field is required.</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <input type="text" id="departure"
                                class="form-control @error('departure') is-invalid @enderror" name="departure"
                                value="{{ old('departure') }}" autocomplete="departure" autofocus />
                            <label class="form-label" for="departure">Departure</label>
                            @error('departure')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <input type="text" id="arrival" class="form-control @error('arrival') is-invalid @enderror"
                                name="arrival" value="{{ old('arrival') }}" autocomplete="arrival" autofocus />
                            <label class="form-label" for="arrival">Arrival</label>
                            @error('arrival')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <input type="time" id="departure_time"
                                class="form-control @error('departure_time') is-invalid @enderror" name="departure_time"
                                value="{{ old('departure_time') }}" autocomplete="departure_time" autofocus />
                            <label class="form-label" for="departure_time">Departure time</label>
                            @error('departure_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <input type="time" id="arrival_time"
                                class="form-control @error('arrival_time') is-invalid @enderror" name="arrival_time"
                                value="{{ old('arrival_time') }}" autocomplete="arrival_time" autofocus />
                            <label class="form-label" for="arrival_time">Arrival time</label>
                            @error('arrival_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <input type="number" id="ticket_price"
                                class="form-control @error('ticket_price') is-invalid @enderror" name="ticket_price"
                                value="{{ old('ticket_price') }}" autocomplete="ticket_price" autofocus />
                            <label class="form-label" for="ticket_price">Ticket price</label>
                            @error('ticket_price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <input type="number" id="ticket_quantity"
                                class="form-control @error('ticket_quantity') is-invalid @enderror" name="ticket_quantity"
                                value="{{ old('ticket_quantity') }}" autocomplete="ticket_quantity" autofocus />
                            <label class="form-label" for="ticket_quantity">Ticket quantity</label>
                            @error('ticket_quantity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="form-outline">
                        <input type="number" id="contact"
                            class="form-control @error('contact') is-invalid @enderror" name="contact"
                            value="{{ old('contact') }}" autocomplete="contact" autofocus />
                        <label class="form-label" for="contact">Ship contact</label>
                        @error('contact')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block">
                    Create ship
                </button>
            </form>
        </div>
    </div>
@endsection
