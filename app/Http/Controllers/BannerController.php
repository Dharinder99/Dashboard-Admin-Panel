<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Banners;
use DB;

class BannerController extends Controller
{
    public function banners()
    {
        $divToShow = 0;
        $formCount = 0;
      
        // $data=DB::select($query);

        $data = DB::table('banners')
        // ->leftJoin('users_profile', 'users_profile.user_id', '=', 'users.user_id')
        ->select('*')
        // ->select('users.user_id', 'full_name', 'country_code', 'phone_number', 'profile_image_full_url', 'zodiac_sign_id', 'personal_pronounce', 'created_datetime')
        ->get();



        //   dd($data);
          return view('banners')
          ->with('divToShow', $divToShow)
          ->with('formCount', $formCount)
          ->with('userdata', $data);


    }

    public function publisbunpublish(Request $request)
    {
             $id = $request->id;

        $data = Banners::publishbanner($id);
             //   dd($data);
               if ($data) {
                 return 1;//redirect()->route('dashboard');
             } else {
                 return 0;//redirect()->route('dashboard');
             }

    }


    public function edit($id)
    {
    $banners = DB::select('SELECT * FROM banners WHERE id = ?', [$id]);


    // Access the first element of the array to get the advertisement object
    if (count($banners) > 0) {
        $banner = $banners[0];
    } else {
        // Handle the case where no advertisement is found
        abort(404, 'Banner not found');
    }

    return response()->json([
            'banner_id' => $banner->id,
            'banner_name' => $banner->banner_name,
            'banner_tagline' => $banner->banner_tagline,
            'banner_image' => $banner->banner_url,


        ]);
    }




    public function deleteBannerUser(Request $request){
        $id = $request->id;

          $data = Banners::deleteUserById($id);
        //   dd($data);
          if ($data) {
            return 1;//redirect()->route('dashboard');
        } else {
            return 0;//redirect()->route('dashboard');
        }
    }


    public function uploadbanner(Request $request)
    {


    // Validate the incoming request data
         $validated = $request->validate([
            'banner_name' => 'required|string|max:255',
            'banner_tagline' => 'nullable|string|max:255',
            // 'banner_url' => 'required', // Example validation for image upload
        ]);
        $inputArr = $request->all();

        $filename ='';
        if($request->hasFile('banner_url')){
            $image = $request->file('banner_url');
            $filename = $image->getClientOriginalName();
            $image->move('uploads',$filename);
        }

        Banners::insert([
            'banner_name' => $inputArr['banner_name'],
            'banner_tagline' => $inputArr['banner_tagline'],
            'banner_url' => $filename,
        ]);


        return redirect()->back()->with('success', 'Banner uploaded successfully!');
    }

    public function show($id)
    {
        $banner = Banners::find($id);
        return response()->json($banner);
    }



    // Update banner details
    public function bannerupdating(Request $request ) {

            $request->validate([
                'edit_banner_id' => 'required|integer',
                'edit_banner_name' => 'required|string|max:255',
                'edit_banner_tagline' => 'required|string|max:255',
                'edit_banner_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);


            $filename = '';
            if ($request->hasFile('edit_banner_url')) {
                $image = $request->file('edit_banner_url');
                $filename = $image->getClientOriginalName();
                $image->move(public_path('images'), $filename);
            } else {
                // Retrieve the current banner URL from the database if no new image is uploaded
                $banner = DB::table('banners')->where('id', $request->edit_banner_id)->first();
                $filename = basename($banner->banner_url);
            }


            $bannerName = $request->edit_banner_name;
            $bannerTagline = $request->edit_banner_tagline;

           $updateData = DB::table('banners')
            ->where('id', $request->edit_banner_id)
            ->update([
                'banner_name'=> $bannerName,
                'banner_tagline'=>$bannerTagline,
                'banner_url'=>$filename


            ]);

            return response()->json([
                'banner_name' => $bannerName,
                'banner_tagline' =>$bannerTagline,
                'banner_url' => $filename
            ]);
           return response()->json(['data'=>$updateData]);
    }

    public function bannerSearch(Request $request){
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




        $data = Banners::getbannerData($searchIn, $searchType, $suggestionText, $isVerified,  $limitFlag);
        // $countData = AdmUser::countUserData();

                // dd($data);die;


        return view('banners')
                ->with('userdata', $data)
                ->with('divToShow' ,$divToShow)
                ->with('formCount' ,$formCount)
                // ->with('count' , $countData)
                ->with('inputValue',$inputValue)
                ->with('searchType',$searchType)
                ->with('searchIn',$searchIn);
    }

}

