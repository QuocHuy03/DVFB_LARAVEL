<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\client_orders;

class UserResource extends JsonResource
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
            'status' => 'success',
            'error' => false,
            'message' => 'Lấy thông tin thành công!',
            'data' => [
                'id' => $this->id,
                'name' => $this->name,
                'username' => $this->username,
                'email' => $this->email,
                'level' => $this->level,
                'money' => $this->money,
                'api_token' => $this->api_token,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
                'order' => [
                    'total' => client_orders::where('username', $this->username)->count(),
                    'success' => client_orders::where('username', $this->username)->where('status', 'success')->count(),
                ]
            ],
        ];
    }
}
