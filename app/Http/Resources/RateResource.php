<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Book;

class RateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $book=Book::find($this->books_id);

        return   [
            'No.'=>$this->id,
             'title'=>$book->title,
             'rate'=>$this->rate,
     
             ];
    }
}
