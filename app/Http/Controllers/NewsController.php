<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index($id_news){
        $news = News::find($id_news);
        return view('news',compact('news'));
    }
}
