<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;
use App\Http\Requests\Categories\CreateRequest;
use App\Http\Requests\Categories\EditRequest;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::query()->select(Category::$availableFields)->get();

        
        return view('admin.categories.index', [
			'categoryList' => $category
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
        return view('admin.categories.create',[
            'categories'=> $categories
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateRequest   $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest  $request)
    {
        $created = Category::create(
            $request->validated()
        );

        if($created){
            return redirect()->route('admin.categories.index')
            ->with('success', 'Запись успешно добавлена');
        }

        return back()->with('error', 'Не удалось добавить запись') 
        ->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
			'category' => $category
		]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EditRequest $request
     * @param  Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, Category $category)
    {
        $updated = $category->fill($request->validated())->save();
    if($updated){
        return redirect()->route('admin.categories.index')
        ->with('success', 'Категория успешно изменена');
    }

    return back()->with('error', 'Не удалось изменить категорию') 
    ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
