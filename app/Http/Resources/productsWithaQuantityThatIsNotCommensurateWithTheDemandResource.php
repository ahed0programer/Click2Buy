<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class productsWithaQuantityThatIsNotCommensurateWithTheDemandResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'inventory_id' => $this->id,
            'products' => $this->get_obtaining_product_details_with_disproportionate_quantity($this->id)
        ];
    }
}
