<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Categories;

use App\Models\Author;



class DashboardController extends Controller
{
public function index()
{
    $totalBooks = Books::count();

    $totalAuthors = Author::count();

    $totalCategories = categories::count();

    $latestBooks = Books::latest()
                        ->take(5)
                        ->get();

    return view('dashboard.index', compact(
        'totalBooks',
        'totalAuthors',
        'totalCategories',
        'latestBooks'
    ));
}
}