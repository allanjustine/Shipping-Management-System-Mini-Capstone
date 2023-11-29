@extends('normal-view.layout.base')

@section('title')
    | Contact Us
@endsection

@section('content')
    <section>
        <div class="container contact-form border">
            <div class="contact-image">
                <img src="/images/icon.png" class="bg-info" alt="icon" />
            </div>
            <form action="{{ route('feedback') }}" method="POST">
                @csrf
                @method('PUT')
                <h3>Drop Us a Message</h3>

                @if (session('message'))
                    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <input type="text" id="name" name="name"
                                class="form-control  @error('name') is-invalid animate bounceIn @enderror"
                                value="@auth{{ auth()->user()->name }}@else{{ old('name') }}@endauth"
                                @auth readonly @endauth autocomplete="name" placeholder="Your Name *">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <input type="text" id="email" name="email"
                                class="form-control @error('email') is-invalid animate bounceIn @enderror"
                                value="@auth{{ auth()->user()->email }}@else{{ old('email') }}@endauth"
                                autocomplete="email" @auth readonly @endauth placeholder="Your Email *">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="">
                            <div class="form-group">
                                <textarea name="message" class="form-control @error('message') is-invalid animate bounceIn @enderror" autocomplete="message" autofocus
                                    placeholder="Your Message *" style="width: 100%; height: 150px;">{{ old('message') }}</textarea>
                                @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" class="btnContact form-control w-100">Send Message <i
                                    class="far fa-paper-plane"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

<style>
    .contact-form {
        background: #fff;
        margin-top: 5%;
        margin-bottom: 5%;
    }

    .contact-image img {
        border-radius: 6rem;
        width: 11%;
        margin-top: -3%;
    }

    .contact-form .form-control {
        border-radius: 1rem;
    }

    .contact-image {
        text-align: center;
    }

    .contact-form form {
        padding: 14%;
    }

    .contact-form form .row {
        margin-bottom: -7%;
    }

    .contact-form h3 {
        margin-bottom: 8%;
        margin-top: -10%;
        text-align: center;
        color: #0062cc;
    }

    .contact-form .btnContact {
        width: 50%;
        border: none;
        border-radius: 1rem;
        padding: 1.5%;
        background: #dc3545;
        font-weight: 600;
        color: #fff;
        cursor: pointer;
    }

    .btnContactSubmit {
        width: 50%;
        border-radius: 1rem;
        padding: 1.5%;
        color: #fff;
        background-color: #0062cc;
        border: none;
        cursor: pointer;
    }
</style>
