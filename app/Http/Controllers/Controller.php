<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function getNews(int $id = null): array
    {
        if ($id != null) {
            return [
                'id' => $id,
                'title' => fake()->jobTitle(),
                'author' => fake()->userName(),
                'image' => fake()->imageUrl(100, 100),
                'status' => 'ACTIVE',
                'description' => fake()->text(100),
                'created_at' => now()->format('d-m-Y H:i'),
            ];
        }

        $quantityNews = 10;
        $news = [];
        for ($i = 0; $i < $quantityNews; $i++) {
            $news[] = [
                'id' => ($i === 0) ? ++$i : $i,
                'title' => fake()->jobTitle(),
                'author' => fake()->userName(),
                'image' => fake()->imageUrl(100, 100),
                'status' => 'ACTIVE',
                'description' => fake()->text(100),
                'created_at' => now()->format('d-m-Y H:i'),
            ];
        }
        return $news;
    }

    public function getCategories(int $id = null): array
    {
        $quantityCategories = 5;
        $categories = [];
        for ($i = 0; $i <= $quantityCategories; $i++) {
            $categories[] = [
                'id' => ($i === 0) ? ++$i : $i,
                'name' => fake()->jobTitle()
            ];
        }
        return $categories;
    }

    function getCategoryWithNews(int $id = null): array
    {
        return $this->getNews();
    }
}
