<?php

namespace App\Http\Resources;

use Attribute;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'product_id' => $this->id,
            'name_en' => $this->getTranslation('name', 'en'),
            'name_ar' => $this->getTranslation('name', 'ar'),
            'description_en' => $this->getTranslation('description', 'en'),
            'description_ar' => $this->getTranslation('description', 'ar'),
            'image' => asset("uploads/$this->img"),
            'price' => $this->price,
            'pices_no' => $this->pices_no,
            'attributes' => AttributeResource::collection($this->whenLoaded('attributes')),
            'category_en' => $this->category->getTranslation('name', 'en'),
            'category_ar' => $this->category->getTranslation('name', 'ar'),
        ];
    }
}