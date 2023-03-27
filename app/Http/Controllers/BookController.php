<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Grade;
use Illuminate\Support\Str;
use Auth;

class BookController extends Controller
{
    //
    function index(){
        // if(Auth::check()){
        //     dd(Auth::user()->name);
        // }
        $books = Book::get();
        return view('admin.books.index',compact('books'));
    }
    function create(){
        $categories = Category::get();
        $grades = Grade::get();
        return view('admin.books.create',compact('categories','grades'));
    }
    function store(Request $request){
        $request->validate([
            'name'=>'required|unique:books,name',
            'pdf_book'=>'required|mimes:pdf',
            'book_image'=>'mimes:jpg,png,gif',
        ]);
        $book = new Book();
        $book->name = $request->name;
        $book->slug = Str::slug($request->name);
        $book->category = $request->category;
        $book->grade = $request->grade;
        $book->year = $request->year;
        $book->author = $request->author;
        if($request->hasFile('pdf_book')){
            $pdf = $request->pdf_book;
            $pdf_name = $pdf->getClientOriginalName().time().'.'.$pdf->extension();
            $pdf->move(public_path('uploads/books/'),$pdf_name);
            $book->pdf = $pdf_name;
        }
        if($request->hasFile('book_image')){
            $bookImage = $request->book_image;
            $imageName = time().'.'.$bookImage->extension();
            $bookImage->move(public_path('uploads/book/images'),$imageName);
            $book->image = $imageName;
        }
        // $access_code = null;
        // $downloadable = null;
        if($request->has('required_access_code')){
            $access_caode = '1';
        }else{
            $access_caode = '0';
        }
        if($request->has('downloadable')){
            $downloadable = '1';
        }
        else{
            $downloadable = '0';
        }
        $book->access_code = $access_caode;
        $book->downloadable = $downloadable;
        $book->save();
        return redirect()->route('books.index')->with('message','Book Inserted');
    }
    function edit($id){
        $categories = Category::get();
        $grades = Grade::get();
        $book = Book::findOrFail($id);
        return view('admin.books.edit',compact('book','categories','grades'));
    }
    function update(Request $request, $id){
        $request->validate([
            'name'=>'required|unique:books,name,'.$id,
            'pdf_book'=>'mimes:pdf'
        ]);
        $book = Book::findOrFail($id);
        $book->name = $request->name;
        $book->slug = Str::slug($request->name);
        $book->category = $request->category;
        $book->grade = $request->grade;

        $book->year = $request->year;
        $book->author = $request->author;
        if($request->hasFile('pdf_book')){
            $pdf = $request->pdf_book;
            $pdf_name = time().'.'.$pdf->extension();
            $pdf->move(public_path('uploads/books/'),$pdf_name);
            $book->pdf = $pdf_name;
        }
        if($request->hasFile('book_image')){
            $bookImage = $request->book_image;
            $imageName = time().'.'.$bookImage->extension();
            $bookImage->move(public_path('uploads/book/images'),$imageName);
            $book->image = $imageName;
        }
        // $access_code = null;
        // $downloadable = null;
        if($request->has('required_access_code')){
            $access_caode = '1';
        }else{
            $access_caode = '0';
        }
        if($request->has('downloadable')){
            $downloadable = '1';
        }
        else{
            $downloadable = '0';
        }
        $book->access_code = $access_caode;
        $book->downloadable = $downloadable;
        $book->update();
        return redirect()->route('books.index')->with('message','Book Updated');
    }
    function update_code_required(Request $request){
        $book = Book::findOrFail($request->book_id);
        $book->access_code = $request->code_required;
        $book->update();
        return response()->json(['message'=>'Access Code Required Updated']);
    }
    function update_downloadable(Request $request){
        $book = Book::findOrFail($request->book_id);
        $book->downloadable = $request->downloadable;
        $book->update();
        return response()->json(['message'=>'Downloadable Updated']);
    }
    function show($id){
        $book = Book::findOrFail($id);
        return view('admin.books.view',compact('book'));
    }
    function destroy($id){
        $book = Book::findOrFail($id);
        if($book->pdf_file != null){
            $pdf = public_path('uploads/book/'.$book->pdf_file);
            if(file_exists($pdf)){
                File::delete($pdf);
            }
        }
        if($book->image!=null){
            $image = public_path('uploads/book_image'.$book->image);
            if(file_exists($image)){
                File::delete($image);
            }
        }
        $book->delete();
        return back()->with('message','Book Deleted');
    }
}
