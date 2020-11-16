<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContentRequest;
use App\Http\Requests\UpdateContentRequest;
use App\Models\Content;
use App\Services\ContentService;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Get contents
     *
     * @OA\Get(
     *     path="/api/contents",
     *     tags={"content"},
     *     description="Get contents. If params is empty returns all",
     *     @OA\Response(
     *         response="200",
     *         description="Return contents"
     *     ),
     *     @OA\Parameter(
     *         description="language_id",
     *         name="language_id",
     *         required=false,
     *         in="query"
     *     ),
     *     @OA\Parameter(
     *         description="code",
     *         name="code",
     *         required=false,
     *         in="query"
     *     ),
     * )
     *
     * @param Request $request
     *
     * @return Languages
     */
    public function index(Request $request)
    {
        $contents = \DB::table('contents');

        if (!empty($request->code)) {
            $contents = $contents->where('code', $request->code);
        }

        if (!empty($request->language_id)) {
            $contents = $contents->where('language_id', $request->language_id);
        }

        $contents = $contents->get();

        return response()->json($contents);
    }

    /**
     * Create new content
     *
     * @OA\Post(
     *     path="/api/contents",
     *     tags={"content"},
     *     description="Get all contents",
     *     @OA\Response(
     *         response="200",
     *         description="Return contents"
     *     ),
     *     @OA\Parameter(
     *         description="code",
     *         name="code",
     *         required=true,
     *         in="query"
     *     ),
     * )
     *
     * @param CreateContentRequest $request
     *
     * @return Array contents
     */
    public function store(CreateContentRequest $request)
    {
        $contentService = new ContentService();

        $contents = $contentService->create($request);

        return response()->json($contents);
    }

    /**
     * Update content
     *
     * @OA\Put(
     *     path="/api/contents",
     *     tags={"content"},
     *     description="Update content",
     *     @OA\Response(
     *         response="200",
     *         description="Return content"
     *     ),
     *     @OA\Parameter(
     *         description="code",
     *         name="code",
     *         required=true,
     *         in="query"
     *     ),
     *     @OA\Parameter(
     *         description="language_id",
     *         name="language_id",
     *         required=true,
     *         in="query"
     *     ),
     *     @OA\Parameter(
     *         description="content",
     *         name="content",
     *         required=true,
     *         in="query"
     *     ),
     * )
     *
     * @param  UpdateContentRequest $request
     * 
     * @return Content
     */
    public function update(UpdateContentRequest $request)
    {
        $content = Content::where('code', $request->code)->where('language_id', $request->language_id)->first();

        $content->content = $request->content;
        $content->update();

        return response()->json($content);
    }
}
