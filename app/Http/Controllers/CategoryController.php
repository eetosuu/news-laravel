<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public  function index(): View
    {
        return view('category.index', [
            'categoriesList' => $this->getCategories()
        ]);
    }

    public function show(int $id): View
    {
        return view('news.index', [
            'newsList' => $this->getCategoryWithNews($id)
        ]);
    }
}
