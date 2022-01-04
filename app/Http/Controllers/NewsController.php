<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
	public function index()
	{
		$news = $this->getNews();

		return view('newsIndex', [
			'news' => $news
		]);
	}

	public function show(int $id)
	{
		if($id > 10) {
			abort(404);
		}
		$news = $this->getNewsById($id);

		return view('newsShow', [
			'newsItem' => $news
		]);
	}
}
