<?php

namespace App\Modules\Students\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Modules\Schools\Resources\SchoolsResource;
class StudentsResource extends JsonResource
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
            'id'         => $this->id,
            'name'       => $this->name,
            // 'school_id'  => SchoolsResource::collection($this->school_id),
            'school_id'  => $this->school_id,
            'order'    => $this->order,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
