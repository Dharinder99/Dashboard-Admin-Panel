<?php
namespace App\Http\Controllers;
use App\Models\Advertisement;
use App\Models\Users;
use App\Models\User;
use App\Models\Country;
use App\Models\States;
use App\Models\Cities;
use App\Models\Userprofile;
use DB;
use Illuminate\Http\Request;

class AdvertisementController extends Controller

{
    public function advertisement()
    {
        $divToShow = 0;
        $formCount = 0;

    $data = DB::table('advertisement')
    ->select('*')

    ->get();

    $country = Country::all();
    $states = States::all();
    $cities=Cities::all();
    $userprofile=Userprofile::all();
    $advertisements=Advertisement::all();


    //   dd($data);
      return view('advertisement')
      ->with('divToShow', $divToShow)
      ->with('formCount', $formCount)
      ->with('country', $country)
      ->with('states', $states)
      ->with('cities', $cities)
      ->with('userdata', $data)
      ->with('ballid', $userprofile)
      ->with('ads', $advertisements);


    }
    public function store(Request $request)
    {
        $ad = new Ad();
        $ad->country_id = $request->country_id;
        $ad->state_id = $request->state_id;
        $ad->city_id = $request->city_id;
        $ad->pincode = $request->pincode;
        $ad->ad_slot = $request->ad_slot;

        if
        ($request->hasFile('ad_file')) {
            $file = $request->file('ad_file');
            $filename = time() . '.' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $ad->ad_file = $filename;
        }
        $ad->save();

        return response()->json(['success' => 'Ad saved successfully']);
    }



    public function edit($id)
    {
        // dd($id);

    $advertisements = DB::select('SELECT * FROM advertisement WHERE advertisement_id = ?', [$id]);


    // Access the first element of the array to get the advertisement object
    if (count($advertisements) > 0) {
        $advertisement = $advertisements[0];
    } else {
        // Handle the case where no advertisement is found
        abort(404, 'Advertisement not found');
    }
        return response()->json([
            'advertisement_id' => $advertisement->advertisement_id,
            'country_id' => $advertisement->country,
            'state_id' => $advertisement->state_id,
            'city_id' => $advertisement->city_id,
            'pincode' => $advertisement->pincode,
            'ball_id' => $advertisement->ball_id,


        ]);
    }

    // public function update(Request $request)
    // {

    //     $filename = '';
    //     if ($request->hasFile('edit_banner_url')) {
    //         $image = $request->file('edit_banner_url');
    //         $filename = $image->getClientOriginalName();
    //         $image->move(public_path('images'), $filename);
    //     } else {
    //         // Retrieve the current banner URL from the database if no new image is uploaded
    //         $banner = DB::table('banners')->where('id', $request->edit_banner_id)->first();
    //         $filename = basename($banner->banner_url);
    //     }


    //     $bannerName = $request->edit_banner_name;
    //     $bannerTagline = $request->edit_banner_tagline;

    //    $updateData = DB::table('banners')
    //     ->where('id', $request->edit_banner_id)
    //     ->update([
    //         'banner_name'=> $bannerName,
    //         'banner_tagline'=>$bannerTagline,
    //         'banner_url'=>$filename


    //     ]);

    //     return response()->json([
    //         'banner_name' => $bannerName,
    //         'banner_tagline' =>$bannerTagline,
    //         'banner_url' => $filename
    //     ]);
    //    return response()->json(['data'=>$updateData]);
    // }

    public function getStates(Request $request)
    {
        $states = States::where('country_id', $request->country_id)->get();
        return response()->json([
            'statesOptions' => view('partials.states_options', compact('states'))->render()
        ]);
    }

    public function getCities(Request $request)
    {
        $cities = Cities::where('state_id', $request->state_id)->get();
        return response()->json([
            'citiesOptions' => view('partials.cities_options', compact('cities'))->render()
        ]);
    }


    public function fatchState(Request $request)
    {

        $data['states'] = States::where('country_id',$request->country_id)->get(['name','id']);


        return response()->json($data);
    }

    public function editStateByName(Request $request)
    {
        // Find the country by name to get the country ID
        $country = Country::where('name', $request->country_name)->first();

        if ($country) {
            // Fetch states based on the retrieved country ID
            $data['states'] = States::where('country_id', $country->id)->get(['name', 'id']);


        } else {
            $data['states'] = [];
        }

        return response()->json($data);
    }

    public function editCityByName(Request $request)
    {
        // Find the country by name to get the country ID
        $state = States::where('name', $request->state_name)->first();

        if ($state) {
            // Fetch states based on the retrieved country ID
            $data['cities'] = Cities::where('state_id', $state->id)->get(['name', 'id']);


        } else {
            $data['cities'] = [];
        }

        return response()->json($data);
    }

    public function fatchCity(Request $request)
    {
        $data['cities'] = Cities::where('state_id',$request->state_id)->get(['name','id']);

        return response()->json($data);
    }

    public function getAllCountries()
    {
        $countries = Country::all();
        return response()->json($countries);
    }

    public function getAllStates()
    {
        $states = States::all();
        return response()->json($states);
    }

    public function getAllCities()
    {
        $cities = Cities::all();
        return response()->json($cities);
    }

    public function uploadadvertisement(Request $request) {
        $inputArr = $request->all();

        $filename = '';
        if ($request->hasFile('upload_image')) {
            $image = $request->file('upload_image');
            $filename = $image->getClientOriginalName();
            $image->move('advertisement', $filename);
        }

        $country = DB::table('countries')->where('id', $inputArr['country_name'])->value('name');
        $state = DB::table('states')->where('id', $inputArr['state_name'])->value('name');
        $city = DB::table('cities')->where('id', $inputArr['city_name'])->value('name');

        Advertisement::insert([
            'country' => $country,
            'state_id' => $state,
            'city_id' => $city,
            'pincode' => $inputArr['pincode_name'],
            'ball_id' => $inputArr['ball_id'],
            'media_url' => $filename,
        ]);

        // Optionally, you can redirect back with a success message
        return redirect()->back()->with('success', 'Advertisement uploaded successfully!');
    }

    public function deleteadvertisement(Request $request){
        $id = $request->id;
          $data = Advertisement::deleteUserById($id);
        //   dd($data);
          if ($data) {
            return 1;//redirect()->route('dashboard');
        } else {
            return 0;//redirect()->route('dashboard');
        }
    }


    public function editadvertisement(Request $request){
        $id = $request->advertisement_id;

        $items = DB::table('advertisement')
          ->select('*','advertisement_id')
        -> first();

          dd($items);

        return $items
        ->with('id',$id);
    }

    public function updateadvertisement()
    {

        Advertisement::insert([
            'country' => $country,
            'state_id' => $state,
            'city_id' => $city,
            'pincode' => $inputArr['pincode_name'],
            'ball_id' => $inputArr['ball_id'],
            'media_url' => $filename,
        ]);
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




        $data = Advertisement::getUserSearchData($searchIn, $searchType, $suggestionText, $isVerified,  $limitFlag);
        // $countData = AdmUser::countUserData();

                // dd($data);die;


        return view('advertisement')
                ->with('userdata', $data)
                ->with('divToShow' ,$divToShow)
                ->with('formCount' ,$formCount)
                // ->with('count' , $countData)
                ->with('inputValue',$inputValue)
                ->with('searchType',$searchType)
                ->with('searchIn',$searchIn);
    }

}
