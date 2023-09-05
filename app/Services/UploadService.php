<?php

namespace App\Services;

use App\Services\Contracts\Upload;
use Exception;
use Illuminate\Http\UploadedFile;

class UploadService implements Upload
{

    /**
     * @throws Exception
     */
    public function create(UploadedFile $file): string
    {
        $path = $file->storeAs('public/news', $file->hashName(), 'public');
        if ($path === false) {
            throw new \Exception("File was not upload");
        }

        return $path;
    }
}