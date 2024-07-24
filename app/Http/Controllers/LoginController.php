<?php
namespace App\Http\Controllers;
use App\Models\AdminUsers;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
// use App\Http\Controllers\UserController;


class LoginController extends Controller
{
    public function login()
    {
       return view('auth-login');
    }

    public function logout()

    {
           Session::flush();
           // return redirect('/')->with('status','admin logout successfully!!');
           return redirect('/');

    }


    public function authenticateadminlogin(Request $request)

    {
        // dd($request->all());

    $validator = Validator::make($request->all(),[
        'email_address'=>'required|email',
        'password'=>'required'
     ]);

    //    $emailid=$request->email_id;
    //    $password=$request->password;
    // $data = AdminUsers::where('email_address',$emailid)->first();


    $adminusers=DB::table('admin_users')
    ->select('*')
    ->where('email_address', $request->email_address)
    ->first();

    //  dd($user->password);
    //  dd($request->password);

    // if ($users->password === $request->password) {


    //     return redirect(route('dashboard'));
    //     }
    //     else {

    //     return redirect()->action([LoginController::class,'login']);
    //         // return redirect()->route('login');

    //         // return view('auth-login');

    //         // echo ('your email/password is wrong');

    //    }

    if($adminusers){

        $timezone = $request->timezone;

          if ($adminusers->password === $request->password){
    //    if(password_verify($request->password, $users->password)){

       // if($request->password == $users->password){

        //  Session::put('admin_id', $users->admin_id);
        //  Session::put('admin_email', $users->email_address);
        //  Session::put('admin_name', $users->admin_name);
         Session::put('timezone',$timezone);
      $data= Session::put('admin', $adminusers);
// dd($data);
        //  dd(session()->all());

         return redirect()->action([UserController::class,'fetchusers']);}
    //     return redirect()->route('dashboard');
    //    }

       else {
            return redirect()->back()
            ->with('message','Please enter correct password.');
       }
 }    else{

        return redirect()->back()->with('message', 'Please enter correct email.');
 }

    }

        public function forgotpw()
        {
           return view('auth-recoverpw');
        }

}
