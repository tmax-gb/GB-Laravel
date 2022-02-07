<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;
use App\Http\Requests\News\CreateRequest;
use App\Http\Requests\News\EditRequest;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::query()->select(News::$availableFields)->get();
        
        return view('admin.news.index', [
			'newsList' => $news
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
        return view('admin.news.addnews', [
            'categories'=> $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $created = News::create(
            $request->validated() + [
                'slug' =>\Str::slug($request->input('title'))
            ]
        );

        if($created){
            return redirect()->route('admin.news.index')
            ->with('success', 'Запись успешно добавлена');
        }

        return back()->with('error', 'Не удалось добавить запись') 
        ->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {   
        $categories = Category::all();
        return view('admin.news.edit', [
			'news' => $news,
            'categories' => $categories
		]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EditRequest $request
     * @param  News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, News $news)
    {
    
        $updated = $news->fill($request->validated() + [
                'slug' =>\Str::slug($request->input('title'))
            ])->save();
        if($updated){
            return redirect()->route('admin.news.index')
            ->with('success', 'Запись успешно изменена');
        }

        return back()->with('error', 'Не удалось изменить запись') 
        ->withInput();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        try{
			$news->delete();
			return response()->json('ok');
		}catch(\Exception $e) {
			\Log::error("Error delete news item");
		}
    }
}
