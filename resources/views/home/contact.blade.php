@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-4 ms-auto">
            <p class="lead">Email: {{ $viewData["email"] }}</p>
            <p class="lead">Phone: {{ $viewData["phone"]}}</p>
        </div>
        <div class="col-lg-4 me-auto">
            <p class="lead">Address: {{ $viewData["address"] }}</p>
        </div>
    </div>
</div>
@endsection
