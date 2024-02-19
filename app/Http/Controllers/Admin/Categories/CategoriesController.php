<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Cache\Console\CacheTableCommand;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $mainCategories = Category::where('parent_id', '=', 0)->get();
        $allCategories = Category::all();
        return view('admin.categories.index', compact('mainCategories', 'allCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent_id', '=', 0)->get();
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryStoreRequest $request)
    {

        Category::create($request->validated());

        return redirect()->route('admin.categories.index')->with('message', 'Категорія створена успішна');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories = Category::where('parent_id', '=', 0)->where('id', '!=', $category->id)->get();
        return view('admin.categories.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryUpdateRequest $request
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CategoryUpdateRequest $request,Category $category)
    {
        $category->update($request->validated());
        return redirect()->route('admin.categories.index')->with('message', 'Категорія оновлена успішна');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category)
    {
        if($category && count($category->childs) == 0){
            $category->delete();
            return redirect()->route('admin.categories.index')->with('message', 'Категорю видалено успішна');
        }
        if(count($category->childs) > 0){
            return redirect()->route('admin.categories.index')->with('message', 'Error.Category has subcategori/s');
        }
        return redirect()->route('admin.categories.index')->with('message', 'Категорія відсутня');
    }
}
