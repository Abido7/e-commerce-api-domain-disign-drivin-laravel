<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use function Pest\Laravel\options;

class OrderDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // dd($this->options);
        return [
            'product' => new ProductResource($this->product),
            'options' => OptionResource::collection($this->options),
            'quantity' => $this->quantity,
        ];
    }
}