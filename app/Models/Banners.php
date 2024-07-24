<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;


class Banners extends Model
{
    protected $table="banners";
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['banner_name', 'banner_tagline', 'banner_url'];



public static function deleteUserById($id){

    $result = DB::table('banners')
            ->where('id', $id)
            ->delete();

   if($result){
       return true;
   }else{
       return false;
   }
  }

  public static function publishbanner($id){

    $result = DB::table('banners')
            ->where('id', $id)
            -> update();

   if($result){
       return true;
   }else{
       return false;
   }
  }

    public static function getbannerData($searchIn, $searchType, $suggestionText,$isVerified , $limitFlag) {
        $response = DB::table('banners')
        // ->leftJoin('users_profile', 'users_profile.user_id', '=', 'users.user_id')
        ->select('*');



        for ($i = 0; $i < count($searchIn); $i++) {
          if($searchIn[$i] == 'banner_name') {
                if ($searchType[$i] == 'contains' && $suggestionText[$i] != '') {
                    $response = $response->where('banner_name', 'LIKE', '%' . $suggestionText[$i] . '%');
                }
                if ($searchType[$i] == 'begins_with' && $suggestionText[$i] != '') {
                    $response = $response->where('banner_name', 'LIKE', $suggestionText[$i] . '%');
                }
                if ($searchType[$i] == 'exact_match' && $suggestionText[$i] != '') {
                    $response = $response->where('banner_name', '=', $suggestionText[$i]);
                }
                if ($searchType[$i] == 'ends_with' && $suggestionText[$i] != '') {
                    $response = $response->where('banner_name', 'LIKE', '%' . $suggestionText[$i]);
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
