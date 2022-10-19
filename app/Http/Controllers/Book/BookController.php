<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookPdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\PdfToImage\Pdf;

class BookController extends Controller
{
    public function index()
    {
        $authors = Book::with('author', 'publisher', 'category')->orderByDesc('id')->paginate(10);

        return response()->json($authors);
    }

    public function detail($id)
    {

        $book = Book::with('author', 'publisher', 'category', 'files')->find($id);

        return response()->json($book);
    }

    public function add(Request $request)
    {
        $rules = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpg,png,jpeg',
            'pdf' => 'required|mimes:pdf',
            'name' => 'required',
            'desc' => 'required',
            'year' => 'required',
            'publisher_id' => 'required',
            'author_id' => 'required',
            'category_id' => 'required',
        ]);

        // if ($rules->fails()) {
        //     return response()->json(['status' => false, 'message' => 'Lütfen Tüm Alanları Doldurunuz.']);
        // }

        $image = $request->file('image');

        $imgName = rand(0, 999) . '-' . time() . '.' . $image->extension();

        if ($image->isValid()) {
            $image->move('assets/images/books/', $imgName);
        }

        $book = Book::create([
            'image' => $imgName,
            'name' => $request->name,
            'desc' => $request->desc,
            'year' => $request->year,
            'publisher_id' => $request->publisher_id,
            'author_id' => $request->author_id,
            'category_id' => $request->category_id,
        ]);

        $pdfFile = $request->file('pdf');

        $pdfName = rand(0, 999) . '-' . time() . '.' . $pdfFile->extension();

        $path = 'assets/pdf/' . $pdfName;

        if ($pdfFile->isValid()) {
            $pdfFile->move('assets/pdf/', $pdfName);
        }

        $pdf = new Pdf($path);
        $numberOfPages = $pdf->getNumberOfPages();

        for ($i = 1; $i <= $numberOfPages; $i++) {
            $pdfName = rand(0, 999) . '-' . time() . '_' . $i . '.jpg';
            $pdf->setPage($i)->saveImage('assets/pdf/' . $pdfName);

            BookPdf::create([
                'book_id' => $book->id,
                'file' => $pdfName
            ]);
        }

        unlink($path);

        return response()->json($book);
    }

    public function edit(Request $request, $id)
    {
        $book = Book::where('id', $id)->update($request->all());

        return response()->json($book);
    }

    public function remove($id)
    {
        $book = Book::where('id', $id)->first();

        $bookPdf = BookPdf::where('book_id', $id)->get();

        $imagePath = 'assets/images/books/' . $book->image;

        unlink($imagePath);

        foreach ($bookPdf as $key => $value) {
            $pdfPath = 'assets/pdf/' . $value->file;
            unlink($pdfPath);
            $value->delete();
        }

        $book->delete();

        return response()->json($book);
    }
}
