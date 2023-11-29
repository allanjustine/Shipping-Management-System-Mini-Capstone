@extends('admin.layout.base')

@section('title')
    | Dashboard
@endsection

@section('content-header')
    <h3>Dashboard</h3>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <a href="/admin/users">
                    <div class="card shadow bg-dark">
                        <div class="card-body">
                            <h1><i class="far fa-users float-end mt-3"></i></h1>
                            <h5><strong>Total Users</strong></h5>
                            <h5><strong>{{ App\Models\User::count() }}</strong></h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-sm-4">
                <a href="/admin/categories">
                    <div class="card shadow bg-dark">
                        <div class="card-body">
                            <h1><i class="far fa-grid-2 float-end mt-3"></i></h1>
                            <h5><strong>Total Categories</strong></h5>
                            <h5><strong>{{ App\Models\Category::count() }}</strong></h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-sm-4">
                <a href="/admin/ships">
                    <div class="card shadow bg-dark">
                        <div class="card-body">
                            <h1><i class="far fa-ship float-end mt-3"></i></h1>
                            <h5><strong>Total Ships</strong></h5>
                            <h5><strong>{{ App\Models\Ship::count() }}</strong></h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-sm-4">
                <a href="/admin/tickets">
                    <div class="card shadow bg-dark">
                        <div class="card-body">
                            <h1><i class="far fa-ticket float-end mt-3"></i></h1>
                            <h5><strong>Total Tickets</strong></h5>
                            <h5><strong>{{ App\Models\Ticket::count() }}</strong></h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-sm-4">
                <a href="/admin/feedbacks">
                    <div class="card shadow bg-dark">
                        <div class="card-body">
                            <h1><i class="far fa-comments float-end mt-3"></i></h1>
                            <h5><strong>Total Feedbacks</strong></h5>
                            <h5><strong>{{ App\Models\Contact::count() }}</strong></h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-sm-4">
                <a href="/admin/logs">
                    <div class="card shadow bg-dark">
                        <div class="card-body">
                            <h1><i class="far fa-notebook float-end mt-3"></i></h1>
                            <h5><strong>Total Logs</strong></h5>
                            <h5><strong>{{ App\Models\Log::count() }}</strong></h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
