<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
   
    // Formats API response
    public function toArray($request)
    {
        // return parent::toArray($request);
          return [
            'id' => $this->id,
            'title' => $this->title,
            'author' => $this->author,
            'pub_date' => $this->pub_date,
            'image' => $this->image
        ];
    }
}
