<?php

namespace App\Http\Controllers;
use App\Models\Books;
use App\Models\categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class BooksController extends Controller
{
    // Menampilkan daftar buku
public function index(Request $request)
{
$query = Books::with('category');
// Search title atau author
if ($request->filled('search')) {

    $query->where(function ($q) use ($request) {

        $q->where(
            'title',
            'like',
            '%' . $request->search . '%'
        )

        ->orWhere(
            'author',
            'like',
            '%' . $request->search . '%'
        );

    });

}

// Filter kategori
if ($request->filled('category_id')) {

    $query->where(
        'category_id',
        $request->category_id
    );

}

// Filter tahun
if ($request->filled('publication_year')) {

    $query->where(
        'publication_year',
        $request->publication_year
    );

}

$books = $query
    ->latest()
    ->paginate(8)
    ->withQueryString();

$categories = categories::all();

return view(
    'books.index',
    compact(
        'books',
        'categories'
    )
);

}



    // Menampilkan form tambah buku
public function create()
{
    $categories = categories::all();

    return view('books.create', compact('categories'));
}

    // Menyimpan data buku
public function store(Request $request)
{
    $request->validate([
        'category_id' => 'required|exists:categories,id',
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'publisher' => 'required|string|max:255',
        'publication_year' => 'required|digits:4',
        'description' => 'required',
        'cover_image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);

$coverPath = Storage::disk('s3')->putFile(
    '2309020038/books',
    $request->file('cover_image')
);

    Books::create([
        'category_id' => $request->category_id,
        'title' => $request->title,
        'author' => $request->author,
        'publisher' => $request->publisher,
        'publication_year' => $request->publication_year,
        'description' => $request->description,
        'cover_image_path' => $coverPath,
    ]);

    return redirect()
        ->route('books.index')
        ->with('success', 'Buku berhasil ditambahkan');
}

    // Menampilkan detail buku
    public function show($id)
    {
        $book = Books::findOrFail($id);

        return view('books.show', compact('book'));
    }

    // Menampilkan form edit
public function edit($id)
    {
    $book = Books::findOrFail($id);

    $categories = categories::all();

    return view(
        'books.edit',
        compact('book', 'categories')
    );

    }
    // Update data buku

    public function update(Request $request, $id)
{
$book = Books::findOrFail($id);
$request->validate([
    'category_id' => 'required|exists:categories,id',
    'title' => 'required|max:255',
    'author' => 'required|max:255',
    'publisher' => 'required|max:255',
    'publication_year' => 'required|digits:4',
    'description' => 'required',
    'cover_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
]);

$coverPath = $book->cover_image_path;

if ($request->hasFile('cover_image')) {

    if ($book->cover_image_path) {

        Storage::disk('s3')
            ->delete($book->cover_image_path);

    }

$coverPath = Storage::disk('s3')->putFile(
    '2309020038/books',
    $request->file('cover_image')
);
}

$book->update([
    'category_id' => $request->category_id,
    'title' => $request->title,
    'author' => $request->author,
    'publisher' => $request->publisher,
    'publication_year' => $request->publication_year,
    'description' => $request->description,
    'cover_image_path' => $coverPath,
]);

return redirect()
    ->route('books.index')
    ->with('success', 'Data buku berhasil diperbarui');
}

    // Hapus data buku
   public function destroy($id)
{
$book = Books::findOrFail($id);
if ($book->cover_image_path) {

    Storage::disk('s3')
        ->delete($book->cover_image_path);

}

$book->delete();

return redirect()
    ->route('books.index')
    ->with(
        'success',
        'Buku berhasil dihapus'
    );


}

}