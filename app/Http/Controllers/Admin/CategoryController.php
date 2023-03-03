<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\CreateCategoryRequest;
use App\Http\Requests\Categories\EditCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\QueryBuilders\CategoriesQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoriesQueryBuilder $categoriesQueryBuilder)
    {
        return \view('admin.categories.categories', [
            'categoriesList' => $categoriesQueryBuilder->getAll(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CategoriesQueryBuilder $categoriesQueryBuilder)
    {
        return \view('admin.categories.create', [
            'categories' => $categoriesQueryBuilder->getAll(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request): RedirectResponse
    {
        $categories = Category::create($request->validated());
        if ($categories) {
            return redirect()->route('admin.categories.index')->with('success', __('messages.admin.category.create.success'));
        } else \back()->with('errror', __('messages.admin.category.create.fail'));
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
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category): View
    {
        return \view('admin.categories.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditCategoryRequest $request, Category $category): RedirectResponse
    {
        $category = $category->fill($request->validated());
        if ($category->save()) {
            return redirect()->route('admin.categories.index')->with('success', __('messages.admin.category.edit.success'));
            \back()->with('errror', __('messages.admin.category.edit.fail'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            // dd($category);
            // die;
            return \response()->json('ok');
        } catch (\Exception $exception) {

            return \response()->json('error', 400);
        }
    }
}
