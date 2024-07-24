<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Transactions extends Model
{
    protected $table="user_subscription_info";

    use HasFactory;

   Public static function usersubscriptionmodel()
{
   $data = DB::table('users')
   ->leftJoin('user_subscription_info', 'user_subscription_info.user_id', '=', 'users.user_id')
   ->select('users.user_id', 'full_name', 'country_code', 'phone_number', 'profile_image_full_url', 'subscription_type', 'user_subscription_info.created_datetime')
   ->get();

   return $data;


}

    public static function getUserSearchData($searchIn, $searchType, $suggestionText,$isVerified , $limitFlag) {
        $response = DB::table('users')
        ->leftJoin('user_subscription_info', 'user_subscription_info.user_id', '=', 'users.user_id')
        ->select('users.user_id', 'full_name', 'country_code', 'phone_number', 'profile_image_full_url', 'subscription_type', 'user_subscription_info.created_datetime');

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



