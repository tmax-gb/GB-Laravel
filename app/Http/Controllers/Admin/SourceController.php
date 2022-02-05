<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Source;
use App\Http\Requests\Sources\CreateRequest;
use App\Http\Requests\Sources\EditRequest;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $source = Source::query()->select(Source::$availableFields)->get();

        
        return view('admin.sources.index', [
			'sourceList' => $source
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sources = Source::all();
        return view('admin.sources.create',[
            'sources'=> $sources
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $created = Source::create(
            $request->validated()
        );

        if($created){
            return redirect()->route('admin.sources.index')
            ->with('success', 'Запись успешно добавлена');
        }

        return back()->with('error', 'Не удалось добавить запись') 
        ->withInput();
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
     * @param  Source $source
     * @return \Illuminate\Http\Response
     */
    public function edit(Source $source)
    {
        $sources = Source::all();
        return view('admin.sources.edit', [
			'source' => $source
		]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EditRequest  $request
     * @param  Source $source
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, Source $source)
    {
        $updated = $source->fill($request->validated())->save();
    if($updated){
        return redirect()->route('admin.sources.index')
        ->with('success', 'Запись успешно изменена');
    }

    return back()->with('error', 'Не удалось изменить запись') 
    ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
