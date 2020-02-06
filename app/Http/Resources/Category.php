<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Category extends JsonResource
{
    /**
     * Transform the resource into an array
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'         => $this->id,
            'name'       => $this->name,
            'products'   => Product::collection($this->whenLoaded('products')),
            'created_at' => $this->created_at,
            'created_by' => User::make($this->whenLoaded('creator')),
            'updated_at' => $this->updated_at,
            'updated_by' => User::make($this->whenLoaded('editor')),
            'deleted_at' => $this->deleted_at,
            'deleted_by' => User::make($this->whenLoaded('destroyer')),
        ];
    }
}
