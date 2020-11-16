<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Get languages
     *
     * @OA\Get(
     *     path="/api/languages",
     *     tags={"language"},
     *     description="Get languages",
     *     @OA\Response(
     *         response="200",
     *         description="Return languages"
     *     )
     * )
     *
     * @param Request $request
     *
     * @return Languages
     */
    public function index(Request $request)
    {
        $languages = Language::all();

        return response()->json($languages);
    }
}
