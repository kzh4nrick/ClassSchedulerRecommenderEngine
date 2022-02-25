<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubjectResource extends JsonResource
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
            'Subject_Code' => $this->Subject_Code,
            'Subject_Name'=> $this->Subject_Name,
            'slug' => $this->slug,
            'Subject_Type'=> $this->Subject_Type,
            'Units' => $this->Units
        ];
    }
}
