<?php

namespace App\Http\Controllers\Lessor;

use App\Enum\General;
use App\Http\Controllers\Controller;
use App\Http\Requests\HouseRequest;
use App\Services\HouseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;
use Inertia\Response;

class HouseController extends Controller
{
    public function __construct(
        protected HouseService $houseService,
    ) {

    }

    /**
     * House list
     */
    public function index(Request $request): Response
    {
        return Inertia::render('Dashboard/House/Index', [
            'currentPage' => $request->page,
        ]);
    }

    /**
     * House detail
     */
    public function view(): Response
    {
        return Inertia::render('Dashboard/House/View');
    }

    /**
     * House create form
     */
    public function create(): Response
    {
        return Inertia::render('Dashboard/House/Create');
    }

    /**
     * House store
     * @param HouseRequest $request
     * @return Response
     */
    public function store(HouseRequest $request): Response
    {
        if ($house = $this->houseService->storeHouse($request->all())) {
            $response = [
                'data' => $house,
                'status' => General::STATUS_SUCCESS,
            ];
        } else {
            $response = [
                'data' => null,
                'status' => General::STATUS_ERROR,
            ];
        }

        return Inertia::render('Dashboard/House/Index', $response);
    }
}
