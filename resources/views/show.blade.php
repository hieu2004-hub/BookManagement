@extends('layout')
@section('content')
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{ $book -> img }}" alt="404" width="200px" height="450px"></div>
                <div class="col-md-6">
                    <h1 class="display-5 fw-bolder">Genre: {{ $book -> genre }}</h1><br>
                    <div class="fs-5 mb-5">
                        <span>ISBN: {{ $book -> isbn }}</span>
                    </div>
                    <div class="fs-5 mb-5">
                        <span>Price: {{ $book -> price }}</span>
                    </div>
                    <div class="fs-5 mb-5">
                        <span>Author: {{ $book -> author }}</span>
                    </div>
                    <div class="fs-5 mb-5">
                        <span>Number of Page: {{ $book -> numPage }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
