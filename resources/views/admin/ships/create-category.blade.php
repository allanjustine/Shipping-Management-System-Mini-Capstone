@extends('admin.layout.base')

@section('title')
    | Location Category Create
@endsection

@section('content-header')
    <h3>
        Location Category Create
    </h3>
@endsection

@section('content')
    <div class="d-flex justify-content-center">
        <div class="card col-md-6 bg-glass">
            <div class="card-body px-4 py-5 px-md-5">
                <form method="POST" action="{{ route('admin.category.create') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <div class="form-outline">
                            <input id="ship_image" type="file"
                                class="form-control pr-4 @error('ship_image') is-invalid @enderror" name="ship_image"
                                value="{{ old('ship_image') }}" accept="image/*" autocomplete="ship_image" autofocus>
                            <label for="ship_image">Upload ferry image</label>
                            @error('ship_image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="form-outline">
                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" autocomplete="name" autofocus />
                            <label class="form-label" for="name">Ship name</label>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="form-outline">
                            <textarea type="text" id="remarks" name="remarks" rows="5"
                                class="form-control @error('remarks') is-invalid @enderror" autocomplete="remarks" autofocus>{{ old('remarks') }}</textarea>
                            <label for="remarks">Remarks</label>
                            @error('remarks')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">
                        Create Category
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
