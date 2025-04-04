<?php

namespace App\Services;

use App\Contracts\Repositories\HouseRepositoryInterface;
use App\Core\Files\FileManager;
use App\Enum\General;
use App\Models\House\Definitions\HouseConst;
use Exception;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;

class HouseService extends BaseService
{
    /**
     * Constructor
     */
    public function __construct(
        protected HouseRepositoryInterface $houseRepository,
    ) {
        $this->repository = $this->houseRepository;
    }

    /**
     * List House
     */
    public function listHouse(): LengthAwarePaginator
    {
        $request = request()->toArray();
        $condition = array_filter([
            'province_code' => $request['province_code'] ?? null,
            'district_code' => $request['district_code'] ?? null,
            'ward_code' => $request['ward_code'] ?? null,
            'category_id' => $request['category_id'] ?? null,
        ]);

        return $this->list($condition);
    }

    /**
     * Store new house
     * Created by PhongTranNTQ
     */
    public function storeHouse(array $request = []): mixed
    {
        try {
            $request['lessor_id'] = auth()->user()->id;
            if ($request['thumbnail']) {
                $request['thumbnail'] = FileManager::storeFile(
                    $request['thumbnail'],
                    HouseConst::FILE_PATH
                );
            }
            if (isset($request['method']) && $request['method'] == General::REQUEST_DRAFT) {
                $request['status'] = HouseConst::STATUS_DRAFT;
            }

            return $this->store($request);
        } catch (Exception $exception) {
            Log::channel('fatal')->error(
                'Message: '.$exception->getMessage()
                .' File: '.$exception->getFile()
                .' Line: '.$exception->getLine()
            );

            return false;
        }
    }

    /**
     * Update house by ID
     * Created by PhongTranNTQ
     */
    public function updateHouse(int $id, array $request = []): mixed
    {
        try {
            if (! $house = $this->houseRepository->find($id)) {
                Log::channel('warning')->error(
                    'Message: Resource not found '.$id
                );

                return false;
            }
            //            FileManager::removeFile(
            //                $house->thumbnail,
            //                HouseDefs::FILE_PATH
            //            );
            $request['thumbnail'] = FileManager::storeFile(
                $request['thumbnail'],
                HouseConst::FILE_PATH
            );

            return $this->houseRepository->update($id, $request);
        } catch (Exception $exception) {
            Log::channel('fatal')->error(
                'Message: '.$exception->getMessage()
                .' File: '.$exception->getFile()
                .' Line: '.$exception->getLine()
            );

            return false;
        }
    }
}
