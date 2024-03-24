<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTagsRequest;
use App\Models\Tags;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use App\Services\TagService;

class TagsController extends Controller
{
    public function __construct(
        private readonly TagService $tagService
    ) {
    }

    public function create(CreateTagsRequest $request): JsonResponse
    {
        $resp = $this->tagService->create($request->validated());
        return $this->build_response_json($resp, 200, 'Tag created!');
    }
}
