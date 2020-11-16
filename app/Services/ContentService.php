<?php

namespace App\Services;

use App\Http\Requests\CreateContentRequest;
use App\Models\Content;
use App\Models\Language;

class ContentService
{

    /**
     * Create content from request
     * 
     * @param CreateContentRequest $request
     * 
     * @return array $contents
     */
    public function create(CreateContentRequest $request)
    {
        $languages = Language::all();

        $contents = [];

        foreach ($languages as $language) {
            $content = new Content();
            $content->language_id = $language->id;
            $content->code = $request->code;
            $content->content = '';
            $content->save();

            $contents[] = $content;
        }

        return $contents;
    }
}