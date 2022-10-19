<?php

namespace App\Http\Controllers\Publisher;

use App\Http\Controllers\Controller;
use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function index()
    {
        $authors = Publisher::orderByDesc('id')->paginate(10);

        return response()->json($authors);
    }
    public function detail($id)
    {

        $publisher = Publisher::find($id);

        return response()->json($publisher);
    }
    public function add(Request $request)
    {
        $publisher = Publisher::create($request->all());

        return response()->json($publisher);
    }
    public function edit(Request $request, $id)
    {
        $publisher = Publisher::where('id', $id)->update($request->all());

        return response()->json($publisher);
    }
    public function remove($id)
    {
        $publisher = Publisher::where('id', $id)->delete();

        return response()->json($publisher);
    }
}
