@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header">
        Tambah Buku
    </div>

    <div class="card-body">

        @if ($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form action="{{ route('books.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="mb-3">

                <label>Kategori</label>

                <select
                    name="category_id"
                    class="form-select">

                    <option value="">
                        Pilih Kategori
                    </option>

                    @foreach($categories as $category)

                        <option value="{{ $category->id }}">
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
                    value="{{ old('title') }}">

            </div>

            <div class="mb-3">

                <label>Penulis</label>

                <input
                    type="text"
                    name="author"
                    class="form-control"
                    value="{{ old('author') }}">

            </div>

            <div class="mb-3">

                <label>Penerbit</label>

                <input
                    type="text"
                    name="publisher"
                    class="form-control"
                    value="{{ old('publisher') }}">

            </div>

            <div class="mb-3">

                <label>Tahun Terbit</label>

                <input
                    type="number"
                    name="publication_year"
                    class="form-control"
                    value="{{ old('publication_year') }}">

            </div>

            <div class="mb-3">

                <label>Deskripsi</label>

                <textarea
                    name="description"
                    class="form-control"
                    rows="5">{{ old('description') }}</textarea>

            </div>

            <div class="mb-3">

                <label>Cover Buku</label>

                <input
                    type="file"
                    name="cover_image"
                    class="form-control">

            </div>

            <button
                type="submit"
                class="btn btn-primary">

                Simpan Buku

            </button>

            <a href="{{ route('books.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </div>

</div>

@endsection