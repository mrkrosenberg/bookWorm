@extends('layouts.main')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> --}}
        <div class="header"> 
            <h1 class="main-title">Welcome to Bookworm</h1>
            <a href="/indexByAuthor" class="btn--main btn--white btn--animated">build your reading list</a>
        </div>
@endsection
