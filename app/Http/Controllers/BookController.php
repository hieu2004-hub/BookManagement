<?php

namespace App\Http\Controllers;

use App\Models\BookManagement;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $keyword = $request -> input('find');
        if (!empty($keyword)) {
            $book = DB::table('book_management')
                -> where('isbn', 'like', '%'.$keyword.'%')
                -> orWhere('publisher', 'like', '%'.$keyword.'%')
                -> orWhere('genre', 'like', '%'.$keyword.'%')
                -> orWhere('author', 'like', '%'.$keyword.'%')
                -> paginate();
        } else {
            $book = BookManagement::paginate(3);
        }

        return view('index', compact('book'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Foundation\Application|Redirector|RedirectResponse|Application
    {
        $storeData = $request -> validate([
           'isbn' => 'required|max:255',
           'publisher' => 'required|max:255',
           'numPage' => 'required|max:255',
           'genre' => 'required|max:255',
           'author' => 'required|max:255',
           'img' => 'required|string',
           'price' => 'required|numeric',
        ]);

        $book = BookManagement::create($storeData);
        return redirect('/book') -> with('completed', 'Book has been saved!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $book = BookManagement::find($id);
        return view('show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $book = BookManagement::findOrFail($id);
        return view('edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): \Illuminate\Foundation\Application|Redirector|RedirectResponse|Application
    {
        $updateData = $request -> validate([
            'isbn' => 'required|max:255',
            'publisher' => 'required|max:255',
            'numPage' => 'required|max:255',
            'genre' => 'required|max:255',
            'author' => 'required|max:255',
            'img' => 'required|string',
            'price' => 'required|numeric',
        ]);

        BookManagement::whereId($id) -> update($updateData);
        return redirect('/book') -> with('completed', 'Book has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): \Illuminate\Foundation\Application|Redirector|RedirectResponse|Application
    {
        $book = BookManagement::findOrFail($id);
        $book -> delete();
        return redirect('/book') -> with('completed', 'Book has been deleted');
    }
}
