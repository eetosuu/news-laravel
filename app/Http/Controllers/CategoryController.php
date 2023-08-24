<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public  function index(): View
    {
        return view('admin.categories.index', [
            'categoriesList' => Category::all(),
        ]);
    }

    public function show(int $id): View
    {
        return view('news.index', [
            'newsList' => $this->getCategoryWithNews($id)
        ]);
    }
}
