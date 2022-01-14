<?php

namespace App\Http\Resources;

use App\Qingwuit\Services\ToolService;
use Illuminate\Http\Resources\Json\ResourceCollection;

class DistributionCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $tool = new ToolService();
        return [
            'data'=>$this->collection->map(function($item) use($tool){
                return [
                    'id'                        =>  $item->id,
                    'goods_name'                =>  $item->goods->goods_name,
                    'goods_master_image'        =>  $tool->thumb($item->goods->goods_master_image),
                    'lev_1'                     =>  $item->lev_1,
                    'lev_2'                     =>  $item->lev_2,
                    'lev_3'                     =>  $item->lev_3,
                    'created_at'                =>  $item->created_at->format('Y-m-d H:i:s'),
                ];
            }),
            'total'=>$this->total(), // 数据总数
            'last_page'=>$this->lastPage(), // 最后页面
            'per_page'=>$this->perPage(), // 每页数量
            'current_page'=>$this->currentPage(), // 当前页码
        ];
    }
}
