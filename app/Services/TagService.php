<?php

namespace App\Services;

use App\Http\Requests\CreateTagsRequest;
use App\Models\Tags;

class TagService {
    public function create(CreateTagsRequest $request) {
        $tags = Tags::create([
            'tag_name' => $request->tag_name,
            'tag_color' => $request->tag_color
        ]);

        return $tags;
    }
}