<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Entities\House\HouseEntity;
use App\Http\Requests\HouseRequest;
use App\Http\Resources\HouseResource;
use App\Services\HouseService;

class HouseController extends Controller
{
    public function __construct(
        private readonly HouseService $houseService,
    ) {}

    /**
     * Get List
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $response = ResponseHelper::list($this->houseService->listHouse());
        $data = [];
        foreach ($response['data'] as $item) {
            $house = new HouseEntity($item, true);
            $data[] = (new HouseResource($house))->toResponse($item);
        }
        $response['data'] = $data;
        $response['message'] = __('message.success.default');

        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Validate house create
     */
    public function validateStore(HouseRequest $request): JsonResponse
    {
        return response()->json([
            'progress' => $request->step,
        ], Response::HTTP_OK);
    }
}
