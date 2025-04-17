<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BrandResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'brand_id' => $this->resource->brand_id,
            'brand_name' => $this->resource->brand_name,
            'brand_image' => $this->resource->brand_image,
            'rating' => $this->resource->rating,
            'iso_3166_2' => $this->resource->iso_3166_2,
            'created_at' => $this->resource->created_at,
            'updated_at' => $this->resource->updated_at,
        ];
    }
}
