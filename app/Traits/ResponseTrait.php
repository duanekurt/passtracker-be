<?php
namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ResponseTrait
{
    /** Trait for building json response
     * @param array $data
     * @param string $message
     * @param integer $code
     * @return JsonResponse
     */
    public function build_response_json($data, int $code = 200, string $message = ''): JsonResponse
    {
        return response()->json(['message' => $message, 'data' => $data], $code);
    }
}
