<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('status', true)->with('category')->latest()->paginate(10);
        return Inertia::render('Frontend/Home', [
            'blogs' => $blogs
        ]);
    }


    public function show($blog)
    {
        $blog= Blog::where('slug', $blog)->with('category')->first();
        return Inertia::render('Frontend/BlogShow', [
            'blog' => $blog
        ]);
    }
}
