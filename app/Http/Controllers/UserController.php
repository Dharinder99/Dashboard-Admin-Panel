<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\User;
use DB;


class UserController extends Controller

{
    public function viewData()
    {
        return view('adminlogin');
    }

     public function postData(Request $req )
     {

       $user =new User();

       $firstname=$req->first_name;

       $emailid=$req->email_id;

       $password=$req->$password;

       $user=User::create(['first_name'=>$firstname,'last_name'=>$lastname,'email_id'=>$emailid]);

   }
   public function index()
   {
    $divToShow = 0;
    $formCount = 0;
    // $query="select users.user_id, full_name,country_code,phone_number, profile_image_full_url, zodiac_sign_id, personal_pronounce, created_datetime
    // from users left join users_profile on users_profile.user_id=users.user_id";

    // $data=DB::select($query);

    $data = DB::table('users')
    ->leftJoin('users_profile', 'users_profile.user_id', '=', 'users.user_id')
    ->select('users.user_id', 'full_name', 'country_code', 'phone_number', 'profile_image_full_url', 'zodiac_sign_id', 'personal_pronounce', 'created_datetime')
    ->get();

    //   dd($data);
      return view('index')
      ->with('divToShow', $divToShow)
      ->with('formCount', $formCount)
      ->with('userdata', $data);

   }



    public function userspecific($id){

        return view("dashboard");
    }
//    public function dashboard()
//    {
//        return view('dashboard');
//    }

   public function fetchusers(){
        $divToShow = 0;
        $formCount = 0;
        $query="select users.user_id, full_name,country_code,phone_number, profile_image_full_url, zodiac_sign_id, personal_pronounce, created_datetime
        from users left join users_profile on users_profile.user_id=users.user_id";
        // $data=DB::table('users')
        //           ->select(
        //             'user_id',
        //             'full_name',
        //             'phone_number',
        //             // 'passcode',
        //             // 'auth_key',
        //             'is_verified',
        //             'is_blocked',
        //              'created_datetime',
        //             )

        $data=DB::select($query);
    // dd($data);
       return view('dashboard')
       ->with('divToShow', $divToShow)
       ->with('formCount', $formCount)
       ->with('userdata', $data);
   }

   public function viewprofiles()
    {
        return view('profiles');
    }

    public function viewuser(Request $req)
    {
        $data=Users::findOrFail($id);
    //    dd($data);

        $data->get();
        if ($data) {
            return 1;
        } else {
            return 0;
        }
    }

    public function getUserDataById(Request $request){

        $id = $request->id;
// dd($request->all());

       $data = DB::table('users')
            //    ->where('user_id',$id)
               ->select('*')
               ->first();

            //    dd($data);
    //        $data= DB::table('users')
    // ->where('user_id',$id)
    // ->leftJoin('users_profile', 'users_profile.user_id', '=', 'users.user_id')
    // ->select('users.user_id', 'full_name', 'country_code', 'phone_number', 'profile_image_full_url', 'zodiac_sign_id', 'personal_pronounce', 'created_datetime','user_id')
    // ->first();

        return view('ajax_view_user_data')->with('data',$data);
    }

    public function ProfileView(Request $request){
        $id = $request->id;
 // dd($request->all());
        $data = DB::table('users')
        ->leftJoin('users_profile', 'users_profile.user_id', '=', 'users.user_id')
        ->select('users.user_id', 'full_name', 'country_code', 'phone_number', 'profile_image_full_url', 'zodiac_sign_id', 'personal_pronounce', 'created_datetime')
        ->first();
             //    dd($data);
         return view('profile_view')->with('data',$data);
     }

    public function deleteUser(Request $request){
        $id = $request->id;

          $data = Users::deleteUserById($id);
        //   dd($data);
          if ($data) {
            return 1;//redirect()->route('dashboard');
        } else {
            return 0;//redirect()->route('dashboard');
        }
    }

    public function userSearch(Request $request){
        $inputValue = $request->all();
        // dd($inputValue);die;
        $searchIn = $request->search_in;


        for ($i = 0; $i < count($searchIn); $i++) {
          if ($searchIn[$i] == 'block_flag' || $searchIn[$i] == 'create_datetime') {
            $searchType[$i] = 'exact_match';
          } else {
            $searchType[$i] = $request->search_type[$i];
          }
        }

        $suggestionText = $request->suggestion_text;

        $isVerified = $request->block_flag;
        // $genderFlag = $request->gender_flag;

        $formCount = $request->formCount;
        $divToShow = $request->divToShow;
        $limitFlag = $request->limit_flag;
        $dateFilters = $request->datefilter;
        $startDate = array();
        $endDate = array();




        $data = Users::getUserSearchData($searchIn, $searchType, $suggestionText, $isVerified,  $limitFlag);
        // $countData = AdmUser::countUserData();

                // dd($data);die;


        return view('dashboard')
                ->with('userdata', $data)
                ->with('divToShow' ,$divToShow)
                ->with('formCount' ,$formCount)
                // ->with('count' , $countData)
                ->with('inputValue',$inputValue)
                ->with('searchType',$searchType)
                ->with('searchIn',$searchIn);
    }

}
