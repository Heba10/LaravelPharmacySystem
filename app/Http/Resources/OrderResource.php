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
        $per=Prescription::all()->where('order_id',$this->id);
        $user=User::find($this->order_user_id);
        $address=Address::find($this->delivering_address_id);
        return ['Order_Address'=>['street_name'=>$address->street_name,'building number'=>$address->building_number,
                'flat number'=>$address->flat_number,'floor number'=>$address->floor_number],
               'Pharmacy'=>$this->pharmacy->name,'owner'=>$user->name,'Prescriptions'=>$per];
    }
}
