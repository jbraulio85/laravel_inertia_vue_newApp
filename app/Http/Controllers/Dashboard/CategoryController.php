<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Category\Store;
use App\Http\Requests\Category\Put;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(3);
        return inertia("Dashboard/Category/Index", compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia("Dashboard/Category/Create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Store $request)
    {
        // Valida y obtiene los datos
        $validated = $request->validated();

        // Crea la categoría
        Category::create($validated);

        return to_route('category.index')->with('message','Its Done!');
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
    public function edit(Category $category)
    {
        return inertia('Dashboard/Category/Edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Put $request, Category $category)
    {
        $category->update($request->validated());
        return to_route('category.index')->with('message','Record Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return to_route('category.index')->with('message','Record Deleted Succesfully!');
    }
}
