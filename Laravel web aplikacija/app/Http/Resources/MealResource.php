<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MealResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if ($this->updated_at == $this->created_at) {
            $status = 'created';
        } else {
            $status = 'modified';
        }
        
        if ($this->trashed()) {
            $status = 'deleted';
        }

        return [
            'id' => $this->id,
            'title' => $this->translate($request->input('lang'))->title,
            'description' => $this->translate($request->input('lang'))->description,
            'status' => $status,
            'category' => new CategoryResource($this->whenLoaded('category')),
            'tags' => TagsResource::collection($this->whenLoaded('tags')),
            'ingredients' => IngredientsResource::collection($this->whenLoaded('ingredients')),
        ];
    }
}
