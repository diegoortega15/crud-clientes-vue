<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable  = ['name', 'email', 'birthday', 'address', 'zip_code', 'city', 'state'];


    public function getResults($data, $total)
    {
        if (!isset($data['filter']) && !isset($data['name']) && !isset($data['email']) && !isset($data['birthday']) && !isset($data['address']) && !isset($data['zip_code']) && !isset($data['city']) && !isset($data['state'])) {
            return $this->paginate($total);
        }

        return $this->where(function ($query) use ($data) {

                if(isset($data['filter'])){
                    $filter = $data['filter'];
                    $query->where('name','LIKE', "%{$filter}%");
                    $query->orWhere('email','LIKE', "%{$filter}%");
                    $query->orWhere('birthday',$filter);
                    $query->orWhere('address','LIKE', "%{$filter}%");
                    $query->orWhere('zip_code','LIKE', "%{$filter}%");
                    $query->orWhere('city','LIKE', "%{$filter}%");
                    $query->orWhere('state','LIKE', "%{$filter}%");
                }

                if(isset($data['name'])){
                    $name = $data['name'];
                    $query->where('name',$name);
                    $query->orWhere('name','LIKE', "%{$name}%");
                }

                if(isset($data['email'])){
                    $email = $data['email'];
                    $query->where('email',$email);
                    $query->orWhere('email','LIKE', "%{$email}%");
                }

                if(isset($data['birthday'])){
                    $birthday = $data['birthday'];
                    $query->where('birthday',$birthday);
                }
                
                if(isset($data['address'])){
                    $address = $data['address'];
                    $query->where('address',$address);
                    $query->orWhere('address','LIKE', "%{$address}%");
                }

                if(isset($data['zip_code'])){
                    $zip_code = $data['zip_code'];
                    $query->where('zip_code',$zip_code);
                    $query->orWhere('zip_code','LIKE', "%{$zip_code}%");
                }

                if(isset($data['city'])){
                    $city = $data['city'];
                    $query->where('city',$city);
                    $query->orWhere('city','LIKE', "%{$city}%");
                }

                if(isset($data['state'])){
                    $state = $data['state'];
                    $query->where('state',$state);
                    $query->orWhere('state','LIKE', "%{$state}%");
                }
        })->paginate($total);
    }
}
