@extends('normal-view.layout.base')

@section('title')
    | Ferries list
@endsection

@section('content')
    <div class="hero-image d-flex justify-content-center align-items-center text-center">
        <div class="hero-text text-white">
            <h1>Efficient ferries Solutions</h1>
            @auth
                <a href="#list" class="btn btn-dark">Buy Ticket</a>
                <a href="/contact-us" class="btn cont bg-white">Contact us</a>
            @else
                <a href="/login" class="btn btn-dark">Buy Ticket</a>
                <a href="/contact-us" class="btn cont bg-white">Contact us</a>
            @endauth
        </div>
    </div>
    <div class="text-white py-2"
        style="background: #fccb90;
    background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
    background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);">
        <div class="container text-center p-2">
            <h1 class="font-weight-bold"><i class="far fa-ship"></i> Ferries list</h1>
        </div>
    </div>
    <div class="d-flex justify-content-center mt-2 py-5">
        <div class="col-md-6">
            <form class="form-inline" action="{{ route('search') }}" method="GET">
                @csrf
                <div class="input-group">

                    <input type="search" class="form-control" placeholder="Search..." aria-label="Search"
                        aria-describedby="button-addon2" name="search">
                    <div class="input-group-append">
                        <button class="btn btn-dark" type="submit" id="button-addon2"><i
                                class="far fa-magnifying-glass"></i> Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="container">
        <div class="row" id="list">
            @forelse ($categories as $category)
                <div class="col-6 mb-4">
                    <div class="card" data-aos="zoom-in-left">
                        <img src="{{ Storage::url($category->ship_image) }}" class="card-img-top"
                            alt="{{ $category->name }}" style="width: 100%; height: 350px;">
                        <div class="card-body">
                            <h3 class="card-title"><strong>{{ $category->name }}</strong></h3>
                            <p class="card-text">{{ $category->remarks }}</p>
                            <p class="card-text"><strong>Total Tickets: </strong>{{ $category->ships_count }}</p>
                            <a href="/category/{{ $category->id }}" class="btn btn-primary">See more details <i class="far fa-arrow-right"></i> </a>
                        </div>
                    </div>
                </div>
            @empty
                <h5 class="text-center">
                    No records list
                </h5>
            @endforelse
        </div>
    </div>
@endsection


<style>
    .hero-image {
        background-image: url('/images/bg.png');
        background-size: cover;
        height: 100vh;
        position: relative;
    }

    .cont:hover {
        color: #000000 !important;
        background-color: rgb(186, 179, 179) !important;
    }
</style>
