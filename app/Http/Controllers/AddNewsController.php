<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;

use App\Models\Contact;


use Illuminate\Http\Request;

class AddNewsController extends Controller
{
    public function submit(NewsRequest $req){
        $news->name=$req->input('name');
        $news->description=$req->input('description');
        $news->desc=$req->input('desc');

        $news->save();

        return redirect()->route('home');
    }  
}
