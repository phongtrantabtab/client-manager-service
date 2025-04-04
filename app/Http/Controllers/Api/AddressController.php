<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Services\AddressService;
use App\Http\Controllers\Controller;

class AddressController extends Controller
{
    public function __construct(
        private readonly AddressService $addressService
    ) {}

    /**
     * Get list address
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        return response()->json([
            'message' => __('message.success.default'),
            'data'    => $this->addressService->getMappingData(),
        ]);
    }
}
