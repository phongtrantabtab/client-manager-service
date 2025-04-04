<?php

namespace App\Http\Resources;

use App\Helpers\ResponseHelper;
use Illuminate\Http\Resources\Json\JsonResource;

class HouseResource extends JsonResource
{
    /**
     * Response
     */
    public function toResponse($request): array
    {
        $hasPermission = auth()->user() && auth()->user()->role <= 1;

        $response = [
            'id' => $this->id ?? null,
            'name' => $this->name ?? null,
            'lessor' => $this->lessor ?? null,
            'description' => $this->description ?? null,
            'address' => $this->address ?? null,
            'thumbnail' => $this->thumbnail ?? null,
            'category' => $this->category ?? null,
            'verified_at' => $this->verified_at ?? null,
            'status' => $this->status ?? null,
            'status_label' => $this->status_label ?? null,
            'created_at' => $this->created_at ?? null,
            'updated_at' => $this->updated_at ?? null,
        ];

        return ResponseHelper::fullResponse($response, $this, $hasPermission);
    }
}
