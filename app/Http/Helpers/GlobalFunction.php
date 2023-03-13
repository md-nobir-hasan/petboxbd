<?php
use App\Models\Permission;
use App\Models\Feature;
use App\Models\Service;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Auth;
// Number converter from bangla to english and en2bn
class Converter2
{
    public static $bn = ["১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০"];
    public static $en = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "0"];

    public static function bn2en($number)
    {
        return str_replace(self::$bn, self::$en, $number);
    }

    public static function en2bn($number)
    {
        return str_replace(self::$en, self::$bn, $number);
    }
}

function en2bn($bn_number){
   return Converter2::en2bn($bn_number);
}
// uses
// $a = '১২'; //(12)
// $b = '৫'; //(5)

// $c = Converter::bn2en($a) + Converter::bn2en($b); // $c = 17
// echo Converter::en2bn($c); // ১৭

 function check($main_feature){
     // dd($permission1);
     $role_id =Auth::user()->role_id;
     $feature_id = Feature::where('name',$main_feature)->where('status',1)->first();
    //  dd($main_feature,$feature_id);

     if($role_id && $feature_id){


        $check = Permission::where('role_id',$role_id)
                            ->where('feature_id', $feature_id->id)->first();
        if($check){
            //  if($permission2){
            //      $check2 = Permission::where('role_id',$role_id)
            //                  ->where('permission',$permission2)->first();

            //      if($check2){
            //          // dd($check);
            //          if($permission3){
            //              $check3 = Permission::where('role_id',$role_id)
            //                      ->where('permission',$permission3)->first();

            //              if($check3){
            //                  if($permission4){
            //                      $check4 = Permission::where('role_id',$role_id)
            //                              ->where('permission',$permission4)->first();
            //                      if($check4){
            //                          return true;
            //                      }else{
            //                          return false;
            //                      }
            //                  }
            //                 else{
            //                  return true;
            //                 }
            //              }else{
            //                  return false;
            //              }
            //          }
            //         else{
            //          return true;
            //         }
            //      }else{
            //          // dd('return false');
            //          return false;
            //      }
            //  }
            // else{
            //  return true;
            // }
            return $check;
        }else{
            return false;
        }
    }else{
        return false;
    }
}

function serviceCheck($service_name){
    $check = Service::where('name',$service_name)->where('status',1)->first();
    if($check){
        $has_service = SiteSetting::with(['service','user'])->where('service_id',$check->id)->first();
        if($has_service){
            return $has_service;
        }else{
            return false;
        }
    }else{
        // dd('Please provide a valid service name instead of '.$service_name);
    }
}

