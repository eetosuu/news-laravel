<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Enums\News\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\Edit;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Enum;
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

        $news = new News($request->validated());

        if ($news->save())
        {
          return redirect()->route('admin.news.index')->with('success', __("The news was saved successfully"));
        }

        return back()->with('error', __("Couldn't save the news, try again"));
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
    public function update(Edit $request, News $news)
    {

        $news = $news->fill($request->validated());

        if ($news->save())
        {
            return redirect()->route('admin.news.index')->with('success', __("The news was saved successfully"));
        }

        return back()->with('error', __("The news has not been updated"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news): JsonResponse
    {
        try {
            $news->delete();

            return response()->json('ok');
        } catch (\Exception $e) {
            Log::error($e->getMessage(), $e->getTrace());

            return response()->json('error', 400);
        }
    }
}
