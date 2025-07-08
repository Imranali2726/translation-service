<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\TranslationService;
use Illuminate\Http\Request;

/**
 * @OA\Tag(name="Translations", description="Operations related to translations")
 */
class TranslationController extends Controller
{
    public function __construct(protected TranslationService $service) {}
    /**
     * @OA\Get(
     *     path="/api/translations",
     *     tags={"Translations"},
     *     summary="Get a list of translations",
     *     description="Returns a paginated list of translations based on filters.",
     *     @OA\Parameter(
     *         name="locale",
     *         in="query",
     *         description="Filter by locale",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="tag",
     *         in="query",
     *         description="Filter by tag (mobile, web, etc.)",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="A list of translations",
     *         @OA\JsonContent(
     *             type="array",  // Correctly defining it as an array
     *             @OA\Items(
     *                 ref="#/components/schemas/Translation"  // Correct reference to the Translation schema
     *             )
     *         )
     *     )
     * )
     */
    public function index(Request $request)
    {
        return response()->json($this->service->get($request->all()));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'locale' => 'required|string|max:5',
            'key' => 'required|string',
            'value' => 'required|string',
            'tag' => 'nullable|string',
        ]);

        return response()->json($this->service->create($validated));
    }

    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'value' => 'required|string',
            'tag' => 'nullable|string',
        ]);

        return response()->json($this->service->update($id, $validated));
    }

    public function export(string $locale)
    {
        return response()->json($this->service->export($locale));
    }
}
