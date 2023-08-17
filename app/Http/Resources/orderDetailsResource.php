<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class orderDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'order_id' => $this->id,
            'total_price' => $this->total_price,
            'status' => $this->status,
            'user_name' => $this->get_user_name($this->user_id),
            'delivary_company' => $this->get_delivary_company($this->delivery_company_address_id),
            'products' => $this->get_details_product($this->id),
            'date' => $this->created_at
        ];
    }
}
