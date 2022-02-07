<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Http\Requests\Profiles\EditRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $profile = Profile::query()->select(Profile::$availableFields)->get();
        // return view('admin.profiles.index', [
        //     'profiles' => $profile
		// ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $profile = Profile::all();
        // return view('admin.profile.create',[
        //     'profiles'=> $profile
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        // $created = Source::create(
        //     $request->validated()
        // );

        // if($created){
        //     return redirect()->route('admin.profile.index')
        //     ->with('success', 'Запись успешно добавлена');
        // }

        // return back()->with('error', 'Не удалось добавить запись')
        // ->withInput();
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
     * @param  Profile $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        // $profile = Profile::all();
        // return view('admin.profiles.edit', [
		// 	'profile' => $profile
		// ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EditRequest $request
     * @param  Profile $profile
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, Profile $profile)
    {

//        $updated = $profile->fill($request->validated())->save();
//
//        if($updated){
//            return redirect()->route('admin.profiles.index')
//            ->with('success', 'Категория успешно изменена');
//        }
//        return back()->with('error', 'Не удалось изменить категорию')
//    ->withInput();
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
