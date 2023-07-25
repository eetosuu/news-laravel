<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsController extends Controller
{
    public  function index(): View
    {
        return view('news.index', [
            'newsList' => $this->getNews()
        ]);
    }

    public function show(int $id): View
    {
        return view('news.show', [
            'news' => $this->getNews($id)
        ]);
    }
}
