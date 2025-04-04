<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class SessionController extends Controller
{
    /**
     * Change app language
     * @param string $language
     * @return JsonResponse
     */
    public function changeLanguage(string $language): JsonResponse
    {
        \session(['lang' => $language]);

        return response()->json([
            'success' => true,
            'language' => $language,
        ]);
    }
}
