<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::withOptions(['verify' => false])->get('https://jsonplaceholder.typicode.com/posts');

        return response()->json($response->json());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $response = Http::withOptions(['verify' => false])->post('https://jsonplaceholder.typicode.com/posts', $request->all());

        return response()->json($response->json());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $response = Http::withOptions(['verify' => false])->get("https://jsonplaceholder.typicode.com/posts/{$id}");

        return response()->json($response->json());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $response = Http::withOptions(['verify' => false])->put("https://jsonplaceholder.typicode.com/posts/{$id}", $request->all());

        return response()->json($response->json());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = Http::withOptions(['verify' => false])->delete("https://jsonplaceholder.typicode.com/posts/{$id}");

        return response()->json(['message' => 'Post deleted successfully']);
    }
}
