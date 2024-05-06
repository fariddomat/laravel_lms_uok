<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs=Blog::latest()->get();
        return view('dashboard.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.blogs.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=> 'required',
            'image'=> 'required',
            'content'=> 'required',
        ]);

                // Handle image upload (if needed)
                if ($request->has('image')) {
                    $image = $request->file('image');
                    $directory = '/uploads/courses'; // Replace with the desired directory
                    $helper = new ImageHelper;
                    $fullPath = $helper->storeImageInPublicDirectory($image, $directory, 800, 500);
                    // Save the full path with name in the database
                    $imagePath = $fullPath;
                }

                $blog = Blog::create([
                    'title' => $request->title,
                    'content' => $request->content,
                    'image' => $imagePath ?? null, // Store image path or null
                ]);
                return redirect()->route('dashboard.blogs.index')->with('success', 'Course created successfully!');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->back();
    }
}
