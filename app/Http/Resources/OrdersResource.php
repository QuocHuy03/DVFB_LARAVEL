<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrdersResource extends JsonResource
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
            'status' => true,
            'message' => "Lấy thông tin đơn hàng thành công",
            'data' => [
                'id' => $this->id,
                'type' => $this->type,
                'code_order' => $this->id_order,
                'link' => $this->link_order,
                'server_order' => $this->server_order,
                'interactive' => $this->interactive,
                'amount' => $this->amount,
                'startWith' => $this->startWith,
                'buff' => $this->buff,
                'note' => $this->ghichu,
                'status' => $this->status,
                'price' => $this->price,
                'total_money' => $this->total_money,
                'username' => $this->username,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ]
        ];
    }
}
