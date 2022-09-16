<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PurposeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $purpose = parent::toArray($request);

        $purpose['directives'] = $this->directives->map(function ($directive) {
            return [
                'id' => $directive->id,
                'name' => $directive->name,
                'objectives' => $directive->objectives->map(function ($objective) {
                    return [
                        'id' => $objective->id,
                        'name' => $objective->name,
                        'metrics' => $objective->metrics->load('synonymin')
                    ];
                })
            ];
        });

        return $purpose;
    }
}
