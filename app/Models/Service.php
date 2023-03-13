<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['name','main_key_id','checking'];

    public function mainKey(){
        return $this->belongsTo(MainKey::class,'main_key_id');
    }
    public function hasService(){
        $setting_check = SiteSetting::where('service_id',$this->id)->where('user_id',Auth::user()->id)->first();
        if($setting_check){
            return true;
        }else{
            return false;
        }
    }
}
