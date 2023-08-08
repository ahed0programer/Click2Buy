<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class showproductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'title' => $this->titel,
            'descraption' => $this->descraption,
            'brand' => $this->getBrand($this->brand_id),
            'offer' => $this->getOffer($this->offer_id),
            'category' => $this->getCategory($this->category_id),
            'details' => $this->getattribut($this->id),
            'ratings_and_comments' => $this->getComment($this->id),
            'evaluation' => $this->getEvaluation($this->id),
            'photos' => $this->getPhoto($this->id),
            'created_at' => $this->created_at,
        
        ];
    }
}
