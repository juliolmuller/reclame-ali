<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\Ticket
 */
class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'          => $this->id,
            'product'     => UserResource::make($this->whenLoaded('product')),
            'status'      => UserResource::make($this->whenLoaded('status')),
            'type'        => UserResource::make($this->whenLoaded('type')),
            'messages'    => TicketMessageResource::collection($this->whenLoaded('messages')),
            'created_at'  => $this->created_at,
            'created_by'  => UserResource::make($this->whenLoaded('creator')),
            'closed_at'   => $this->closed_at,
            'closed_by'   => $this->when(!!$this->closed_at, UserResource::make($this->whenLoaded('editor'))),
            'updated_at'  => $this->updated_at,
            'updated_by'  => UserResource::make($this->whenLoaded('editor')),
            'links'       => [
                'show' => [
                    'method' => 'GET',
                    'url'    => route('api.tickets.show', $this),
                ],
                'update' => [
                    'method' => 'PUT',
                    'url'    => route('api.tickets.update', $this),
                ],
                'delete' => [
                    'method' => 'PATCH',
                    'url'    => route('api.tickets.close', $this),
                ],
            ],
        ];
    }
}
