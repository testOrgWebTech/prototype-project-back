<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        JsonResource::withoutWrapping();
        return [
            "id" => $this->id,
            "sender" => $this->sender,
            "receiver" => $this->receiver,
            "message" => $this->message,
            "created_at" => $this->created_at->setTimezone('Asia/Phnom_Penh')->format('Y-m-d H:i:s'),
            "ago" => $this->created_at->diffForHumans()
        ];
    }
}
