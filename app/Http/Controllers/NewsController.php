<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewsController extends Controller
{
    public function index() {

        $news = Http::get("https://newsapi.org/v2/everything?q=tesla&from=2021-11-30&sortBy=publishedAt&apiKey=a46180f934e042839deef8911aa84260");
          return view ('news.index', [
              'news' => $news['articles']
          ]);
    }
}
