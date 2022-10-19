<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::orderByDesc('id')->paginate(10);

        return response()->json($authors);
    }
    public function detail($id)
    {

        $author = Author::find($id);

        return response()->json($author);
    }
    public function add(Request $request)
    {
        $author = Author::create($request->all());

        return response()->json($author);
    }
    public function edit(Request $request, $id)
    {
        $author = Author::where('id', $id)->update($request->all());

        return response()->json($author);
    }
    public function remove($id)
    {
        $author = Author::where('id', $id)->delete();

        return response()->json($author);
    }
}
