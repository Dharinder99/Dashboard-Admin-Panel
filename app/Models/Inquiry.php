<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Users;
use DB;

class Inquiry extends Model
{
    protected $table="inquiry";
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['id','inquiry_date','inquiry_message'];


    public static function userinquires(){

        $data = DB::table('users')
        ->leftJoin('inquires', 'inquires.user_id', '=', 'users.user_id')
        ->select('users.user_id', 'full_name', 'country_code', 'phone_number', 'profile_image_full_url','id','inquires.inquiry_date','inquires.inquiry_message','is_active')
        ->get();

        return $data;


    }

 public static function deleteUserById($id){

        $result = DB::table ('inquires')
                ->where('id', $id)
                ->delete();

       if($result){
           return true;
       }else{
           return false;
       }
      }


 public static function getUserSearchData($searchIn, $searchType, $suggestionText,$isVerified , $limitFlag)
    {
        // $response = DB::table('users')
        // ->leftJoin('users_profile', 'users_profile.user_id', '=', 'users.user_id')
        // ->select('users.user_id', 'full_name', 'country_code', 'phone_number', 'profile_image_full_url', 'zodiac_sign_id', 'personal_pronounce', 'created_datetime');
        for ($i = 0; $i < count($searchIn); $i++) {
          if($searchIn[$i] == 'full_name') {
                if ($searchType[$i] == 'contains' && $suggestionText[$i] != '') {
                    $response = $response->where('full_name', 'LIKE', '%' . $suggestionText[$i] . '%');
                }
                if ($searchType[$i] == 'begins_with' && $suggestionText[$i] != '') {
                    $response = $response->where('full_name', 'LIKE', $suggestionText[$i] . '%');
                }
                if ($searchType[$i] == 'exact_match' && $suggestionText[$i] != '') {
                    $response = $response->where('full_name', '=', $suggestionText[$i]);
                }
                if ($searchType[$i] == 'ends_with' && $suggestionText[$i] != '') {
                    $response = $response->where('full_name', 'LIKE', '%' . $suggestionText[$i]);
                }
            } else {
                if ($searchType[$i] == 'contains' && $suggestionText[$i] != '') {
                    $response = $response->where($searchIn[$i], 'LIKE', '%' . $suggestionText[$i] . '%');
                }
                if ($searchType[$i] == 'begins_with' && $suggestionText[$i] != '') {
                    $response = $response->where($searchIn[$i], 'LIKE', $suggestionText[$i] . '%');
                }
                if ($searchType[$i] == 'exact_match' && $suggestionText[$i] != '') {
                    $response = $response->where($searchIn[$i], '=', $suggestionText[$i]);
                }
                if ($searchType[$i] == 'ends_with' && $suggestionText[$i] != '') {
                    $response = $response->where($searchIn[$i], 'LIKE', '%' . $suggestionText[$i]);
                }
            }

        }

        $response = $response
        // ->limit($limitFlag)
        // ->orderBy('created_datetime', 'DESC')
        ->get();

        return $response;
    }

}
