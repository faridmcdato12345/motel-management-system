<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MotelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->motel_name,
            'address' => $this->motel_address,
            'phone_number' => $this->phone_number ?? $this->phone_number,
            'email_address' => $this->email_address ?? $this->email_address
        ];
    }
}
