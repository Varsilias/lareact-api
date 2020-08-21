<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name'  => $this->name,
            'price'  => $this->price,
            'stock'  => $this->stock == 0 ? 'Out of Stock' : $this->stock,
            'discount'  => $this->discount,
            'totalPrice'  => round($this->price - ($this->discount / 100 * $this->price), ),
            'description'  => $this->description,
            'rating' => $this->reviews->count() > 0 ? round($this->reviews->sum('rating')/$this->reviews->count(),2) : 'No rating yet',
            'href' => [
                'reviews' => route('reviews.index', $this->id)
            ],
        ];
    }
}
