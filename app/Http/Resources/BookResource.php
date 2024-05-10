<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Book;
use App\Models\Secondcategory;
class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

    $category=Secondcategory::find($this->sub_category_id);
        return [
       'No.'=>$this->id,
        'title'=>$this->title,
        'category'=>$category->name,

        ];
    }
}
