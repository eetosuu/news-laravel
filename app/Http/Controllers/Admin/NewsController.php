<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.news.index', [
            'newsList' => News::query()->status()->with('category')->paginate(8),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::all();
        return view('admin.news.create', [
            'categoriesList' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $data = $request->only(['title', 'author', 'status', 'description', 'category_id']);
        $news = new News($data);

        if ($news->save())
        {
          return redirect()->route('admin.news.index')->with('success', 'Запись успешно сохранена');
        }

        return back()->with('error', 'Запись не создана');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        $categories = Category::all();
        return view('admin.news.edit', [
            'categoriesList' => $categories,
            'news' => $news
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $data = $request->only(['title', 'author', 'status', 'description', 'category_id']);

        $news = $news->fill($data);

        if ($news->save())
        {
            return redirect()->route('admin.news.index')->with('success', 'Запись успешно сохранена');
        }

        return back()->with('error', 'Запись не изменена');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
