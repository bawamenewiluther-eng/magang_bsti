@extends('layouts.app')
@php
use Illuminate\Support\Facades\Storage;
@endphp
@section('content')

<div class="card">
<div class="card-header">
    Edit Buku
</div>

<div class="card-body">

    <form action="{{ route('books.update', $book->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Kategori</label>

            <select name="category_id"
                    class="form-select">

                @foreach($categories as $category)

                    <option
                        value="{{ $category->id }}"
                        {{ $book->category_id == $category->id ? 'selected' : '' }}>

                        {{ $category->name }}

                    </option>

                @endforeach

            </select>
        </div>

        <div class="mb-3">
            <label>Judul Buku</label>

            <input
                type="text"
                name="title"
                class="form-control"
                value="{{ $book->title }}">
        </div>

        <div class="mb-3">
            <label>Penulis</label>

            <input
                type="text"
                name="author"
                class="form-control"
                value="{{ $book->author }}">
        </div>

        <div class="mb-3">
            <label>Penerbit</label>

            <input
                type="text"
                name="publisher"
                class="form-control"
                value="{{ $book->publisher }}">
        </div>

        <div class="mb-3">
            <label>Tahun Terbit</label>

            <input
                type="number"
                name="publication_year"
                class="form-control"
                value="{{ $book->publication_year }}">
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>

            <textarea
                name="description"
                rows="5"
                class="form-control">{{ $book->description }}</textarea>
        </div>

        <div class="mb-3">

            <label>Cover Saat Ini</label>

            <br>

            <img
                src="{{ Storage::disk('s3')->url($book->cover_image_path) }}"
                width="150">

        </div>

        <div class="mb-3">

            <label>Ganti Cover</label>

            <input
                type="file"
                name="cover_image"
                class="form-control">

        </div>

        <button
            type="submit"
            class="btn btn-warning">

            Update Buku

        </button>

    </form>

</div>

</div>

@endsection
