<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Area;
class AddressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        
        return ['User Name'=>$this->user->name,'Email'=>$this->user->email,
                 'Gender'=>$this->user->gender,'Address'=>['Area'=>$this->area->name,
                 'Street'=>$this->street_name,'building'=>$this->building_number,'floor'=>$this->floor_number,
                 'flat'=>$this->flat_number,'main'=>($this->is_main==0)? False:True]];
    }
}
