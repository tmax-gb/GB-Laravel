<?php

namespace App\Http\Controllers\Admin;

use XmlParser;
use App\Contracts\Parser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Parser $service)
    {

        dd(
			$service->load('https://news.yandex.ru/movies.rss')
				    ->start()
		);

    }
}
