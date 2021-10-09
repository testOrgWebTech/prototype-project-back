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
            "sender" => [
                "id" => $this->sender->id,
                "name" => $this->sender->name,
            ],
            "receiver" => [
                "id" => $this->receiver->id,
                "name" => $this->receiver->name,
            ],
            "message" => $this->message,
            "created_at" => $this->created_at->setTimezone('Asia/Phnom_Penh')->format('Y-m-d H:i:s')
        ];
    }
}
