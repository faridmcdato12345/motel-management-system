<?php

namespace App\Http\Resources;

use App\Models\GuestType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GuestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user' => User::select('name','id')->where('id',$this->user_id)->first(),
            'type' => GuestType::select('name','id')->where('id',$this->type_id)->where('user_id',$this->user_id)->first(),
            'full_name' => $this->first_name . ' ' . $this->last_name,
            'phone_number' => $this->phone_number,
        ];
    }
}
