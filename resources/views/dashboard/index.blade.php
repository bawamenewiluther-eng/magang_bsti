@extends('layouts.app')

@section('content')

<h2 class="mb-4">Dashboard</h2>

<div class="row">

    <div class="col-md-3">
        <div class="card card-stat">
            <div class="card-body">
                <h6>Total Buku</h6>
                <h2>{{ $totalBooks }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-stat">
            <div class="card-body">
                <h6>Total Penulis</h6>
                <h2>{{ $totalAuthors }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-stat">
            <div class="card-body">
                <h6>Total Kategori</h6>
                <h2>{{ $totalCategories }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="card mt-4">
    <div class="card-header">
        Buku Terbaru
    </div>

    <div class="card-body">

        <table class="table">

            <thead>
            <tr>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Tahun</th>
            </tr>
            </thead>

            <tbody>

            @forelse($latestBooks as $book)

            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->publication_year }}</td>
            </tr>

            @empty

            <tr>
                <td colspan="3" class="text-center">
                    Belum ada data buku
                </td>
            </tr>

            @endforelse

            </tbody>

        </table>

    </div>
</div>

@endsection