<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Inquiry;
use App\Models\Users;
use DB;


class InquiryController extends Controller
{

    public function inquirytable()
    {
        $divToShow = 0;
        $formCount = 0;

        // DB::table('Inquiries');
        $data=  Inquiry::userinquires();
        // dd($data);

       return view('Inquiry')


       ->with('divToShow', $divToShow)
       ->with('formCount', $formCount)
       ->with('userdata', $data)
       ;

    }
    public function deleteinquiries(Request $request){
        $id = $request->id;

          $data = Inquiry::deleteUserById($id);
        //   dd($data);
          if ($data) {
            return 1;//redirect()->route('dashboard');
        } else {
            return 0;//redirect()->route('dashboard');
        }
    }

}
