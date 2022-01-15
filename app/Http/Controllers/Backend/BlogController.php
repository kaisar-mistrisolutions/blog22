<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $blogs = Blog::with('category')->get();
        return Inertia::render('Backend/Blog/Index', [
            'blogs' => $blogs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return Inertia::render('Backend/Blog/Create', [
            'categories' => $categories
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
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif'
        ]);

        $image=$request->file('image');

        if (isset($image)){
           $imgName=Str::slug($request->title).uniqid().'.'.$image->getClientOriginalExtension();
        }
       
        Blog::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'category_id' => $request->category_id,
            'body' => $request->description,
            'thumbnail' => $request->file('image')->storeAs('blogs',$imgName),
        ]);

        return Redirect::route('app.blogs.index')->with('success', 'Blog Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        $blog = Blog::where('id', $blog->id)->with('category')->first();
        return Inertia::render('Backend/Blog/Show', [
            'blog' => $blog
        ]);
    }


    // Blog Status Method
    public function status(Request $request,Blog $blog)
    {
        if($blog->status == true) {
            $blog->update([
                'status'=>$request->status
            ]);
            return back()->with('success','Blog Status is turned Off');
        }
        else {
            $blog->update([
                'status'=>$request->status
            ]);
            return back()->with('success','Blog Status is turned On');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        // dd($blog);
        $categories = Category::all();
        return Inertia::render('Backend/Blog/Edit', [
            'blog' => $blog,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {

        $image=$request->file('image');

        if (isset($image)){
           $imgName=Str::slug($request->title).uniqid().'.'.$image->getClientOriginalExtension();
        }

        // dd($blog->getRawOriginal('thumbnail'));
       
        $blog->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'category_id' => $request->category_id,
            'body' => $request->description,
            'thumbnail' => isset($request->image) ? $request->file('image')->storeAs('blogs',$imgName): $blog->getRawOriginal('thumbnail'),
        ]);

        return Redirect::route('app.blogs.index')->with('success', 'Blog Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return Redirect::route('app.blogs.index')->with('success', 'Blog Deleted Successfully'); 
    }
}
