<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\Role
 */
class RoleResource extends JsonResource
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
            'name'        => $this->name,
            'description' => $this->description ?? null,
            'users'       => UserResource::collection($this->whenLoaded('users')),
            'permissions' => $this->whenLoaded('permissions'),
            'created_at'  => $this->created_at,
            'created_by'  => UserResource::make($this->whenLoaded('creator')),
            'updated_at'  => $this->updated_at,
            'updated_by'  => UserResource::make($this->whenLoaded('editor')),
            'links'       => [
                'show' => [
                    'method' => 'GET',
                    'url'    => route('api.roles.show', $this),
                ],
                'update' => [
                    'method' => 'PUT',
                    'url'    => route('api.roles.update', $this),
                ],
                'delete' => [
                    'method' => 'DELETE',
                    'url'    => route('api.roles.destroy', $this),
                ],
            ],
        ];
    }
}
