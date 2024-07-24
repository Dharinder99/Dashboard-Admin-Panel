<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Advertisement extends Model
{

    protected $table= "advertisement";
    public $timestamps = false;
    use HasFactory;


    protected $fillable = ['advertisement_id','media_url','country','state','pincode','ball_id','','type','is_active','created_datetime'];
    use HasFactory;


    public static function deleteUserById($id){

        $result = DB::table('advertisement')
                ->where('advertisement_id', $id)
                ->delete();

       if($result){
           return true;
       }else{
           return false;
       }
      }

// public static function ads()
// {
//      $data=DB::table('advertisement')
//      ->leftJoin('users_profile', 'users_profile.user_id', '=', 'users.user_id')
//      ->select('users.user_id', 'full_name', 'country_code', 'phone_number', 'profile_image_full_url', 'zodiac_sign_id', 'personal_pronounce', 'created_datetime');




// }

    public static function getUserSearchData($searchIn, $searchType, $suggestionText,$isVerified , $limitFlag)

    {
    $response = DB::table('advertisement')
        ->leftJoin('users_profile', 'users_profile.user_id', '=', 'users.user_id')
        ->select('users.user_id', 'full_name', 'country_code', 'phone_number', 'profile_image_full_url', 'zodiac_sign_id', 'personal_pronounce', 'created_datetime');
        for ($i = 0; $i < count($searchIn); $i++) {
          if($searchIn[$i] == 'full_name') {
                if ($searchType[$i] == 'contains' && $suggestionText[$i] != '')
                {
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
