<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $data = Http::get('https://jsonplaceholder.typicode.com/posts')->object();
        return view('index', [
            'data' => $data
        ]);
    }

    public function edit($id)
    {
        $item = Http::get('https://jsonplaceholder.typicode.com/posts/'.$id)->object();

        return view('edit', [
            'item' => $item
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string'
        ]);

        $response = Http::put('https://jsonplaceholder.typicode.com/posts/'.$id, [
            'title' => $request->title,
            'body' => $request->body,
        ]);

        
        return redirect()->route('index')->with([
            'status' => $response->status()
        ]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string'
        ]);

        $response = Http::post('https://jsonplaceholder.typicode.com/posts', [
            'title' => $request->title,
            'body' => $request->body,
        ]);

        
        return redirect()->route('index')->with([
            'status' => $response->status()
        ]);
    }

    public function delete($id)
    {
        $response = Http::delete('https://jsonplaceholder.typicode.com/posts/'.$id);

        return redirect()->route('index')->with([
            'status' => $response->status()
        ]);
    }
}
