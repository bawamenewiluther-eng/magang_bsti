@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-body">

        <div class="row">

            <div class="col-md-3">

                <img
                    src="{{ asset('images/book.jpg') }}"
                    class="img-fluid">

            </div>

            <div class="col-md-9">

                <h2>{{ $book->title }}</h2>

                <hr>

                <p>
                    <strong>ISBN :</strong>
                    {{ $book->isbn }}
                </p>

                <p>
                    <strong>Penulis :</strong>
                    {{ $book->author->name }}
                </p>

                <p>
                    <strong>Kategori :</strong>
                    {{ $book->category->name }}
                </p>

                <p>
                    <strong>Tahun :</strong>
                    {{ $book->publish_year }}
                </p>

                <p>
                    {{ $book->description }}
                </p>

                <a
                    href="{{ $downloadUrl }}"
                    class="btn btn-success">

                    Download Buku

                </a>

            </div>

        </div>

    </div>

</div>

@endsection