@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    
<h2>Data Buku</h2>

<a href="{{ route('books.create') }}"
   class="btn btn-primary">

    + Tambah Buku

</a>
    

</div>

@if(session('success'))

<div class="alert alert-success">

    
{{ session('success') }}
    

</div>

@endif

<div class="card mb-4">

    
<div class="card-body">

    <form method="GET"
          action="{{ route('books.index') }}">

        <div class="row">

            <div class="col-md-4">

                <input
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="Cari judul atau penulis"
                    value="{{ request('search') }}">

            </div>

            <div class="col-md-3">

                <select
                    name="category_id"
                    class="form-select">

                    <option value="">
                        Semua Kategori
                    </option>

                    @foreach($categories as $category)

                        <option
                            value="{{ $category->id }}"
                            {{ request('category_id') == $category->id ? 'selected' : '' }}>

                            {{ $category->name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="col-md-3">

                <input
                    type="number"
                    name="publication_year"
                    class="form-control"
                    placeholder="Tahun Terbit"
                    value="{{ request('publication_year') }}">

            </div>

            <div class="col-md-2">

                <button
                    type="submit"
                    class="btn btn-success w-100">

                    Filter

                </button>

            </div>

        </div>

    </form>

</div>
    

</div>

<div class="mb-3">

    
<strong>Total Buku:</strong>
{{ $books->total() }}
    

</div>

<div class="row">

@forelse($books as $book)

<div class="col-md-3 mb-4">

    
<div class="card h-100 shadow-sm">

    @if($book->cover_image_path)

        <img
            src="https://api-stg.irvan.cloud/magang-bsti/{{ $book->cover_image_path }}"
            class="card-img-top"
            style="height:300px; object-fit:cover;"
            alt="{{ $book->title }}">

    @endif

    <div class="card-body">

        <h5 class="card-title">

            {{ $book->title }}

        </h5>

        <p>

            <strong>Penulis:</strong>
            {{ $book->author }}

        </p>

        <p>

            <strong>Kategori:</strong>
            {{ $book->category->name ?? '-' }}

        </p>

        <p>

            <strong>Penerbit:</strong>
            {{ $book->publisher }}

        </p>

        <p>

            <strong>Tahun:</strong>
            {{ $book->publication_year }}

        </p>

    </div>

    <div class="card-footer d-flex gap-2">


        <a href="{{ route('books.edit', $book->id) }}"
           class="btn btn-warning btn-sm">

            Edit

        </a>

        <form
            action="{{ route('books.destroy', $book->id) }}"
            method="POST">

            @csrf

            @method('DELETE')

            <button
                type="submit"
                class="btn btn-danger btn-sm"
                onclick="return confirm('Yakin ingin menghapus buku ini?')">

                Hapus

            </button>

        </form>

    </div>

</div>
    

</div>

@empty

<div class="col-12">

    
<div class="alert alert-warning">

    Belum ada data buku.

</div>
    

</div>

@endforelse

</div>

<div class="mt-4">

    
{{ $books->links() }}
    

</div>

@endsection
