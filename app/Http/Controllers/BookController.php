<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\BookImage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('book.index', [
            'books' => Book::orderBy('updated_at', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|min:3|max:40',
                'description' => 'required|min:15|max:500',
                'isbn' => 'required|min:13|max:20',
                'pages' => 'required|min:1|max:5000',
                'photo.*' => 'sometimes|required|mimes:jpg|max:10000',
                'category_id' => 'required|numeric|gt:0',
            ],
            [
                'category_id.gt' => 'Category not chosen.'
            ]
        );

        Book::create([
            'title' => $request->title,
            'isbn' => $request->isbn,
            'pages' => $request->pages,
            'description' => $request->description,
            'category_id' => $request->category_id
        ])->addImages($request->file('photo'));

        return redirect()->route('b_index')->with('ok', 'Book successfuly added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('book.show', [
            'book' => $book
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('book.edit', [
            'book' => $book,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $request->validate(
            [
                'title' => 'required|min:3|max:40',
                'description' => 'required|min:15|max:500',
                'isbn' => 'required|min:13|max:20',
                'pages' => 'required|min:1|max:5000',
                'photo.*' => 'sometimes|required|mimes:jpg|max:10000',
                'category_id' => 'required|numeric|gt:0',
            ],
            [
                'category_id.gt' => 'Category not chosen.'
            ]
        );

        $book->update([
            'title' => $request->title,
            'isbn' => $request->isbn,
            'pages' => $request->pages,
            'description' => $request->description,
            'category_id' => $request->category_id
        ]);
        $book->removeImages($request->delete_photo)
            ->addImages($request->file('photo'));

        return redirect()->route('b_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        if ($book->getPhotos()->count()) {
            $delIds = $book->getPhotos()->pluck('id')->all();
            $book->removeImages($delIds);
        }

        $book->delete();
        return redirect()->route('b_index');
    }
}
