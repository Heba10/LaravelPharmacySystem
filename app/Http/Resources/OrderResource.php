<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\User;
use App\Address;
use App\Area;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
         return ['User Name'=>$user->id,'Email'=>$this->user,
        'Gender'=>$this->user,'Address'=>['Area'=>$this->area,
        'Street'=>$this->street_name,'building'=>$this->building_number,'floor'=>$this->floor_number,
        'flat'=>$this->flat_number,'main'=>($this->is_main==0)? False:True]];
    }
}
