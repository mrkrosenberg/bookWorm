@extends('layouts.app')

@section('content')

    <nav class="navbar navbar-light bg-light">
    <form class="form-inline">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    </nav>

@endsection

<nav class="navbar sticky-top navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Sticky top</a>
</nav>
