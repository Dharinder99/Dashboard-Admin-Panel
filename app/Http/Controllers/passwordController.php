<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\AdminUsers;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailToUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;




class passwordController extends Controller
{
    public function otp()
    {
       return view('otp');
    }

    public function forgetpassword2()
    {
       return view('forget_password_otp_page');
    }



    public function emailverification()
    {
       return view('emailverification');
    }



public function otps()
{
    return view("otps");
}

public function showSendEmailOtp(Request $request){
    return view('admin.forget_password.send-otp');
}

public function showEmailValidateOtp(Request $request, $emailId){
    return view('admin.forget_password.validate-otp')
           ->with('emailId', $emailId);
}

public function showResetPassword(Request $request, $emailId){
    return view('admin.forget_password.reset-password')
           ->with('emailId', $emailId);
}

// ---------------send-otp-on--gmail--page--------
public function doSendEmailOtp(Request $request){
dd($request->all());
    $input = $request->all();
    $validator = Validator::make($input, [
        'email_id' => 'required|email'
    ]);


    if ($validator->fails())
    {
        $errorArray = json_decode($validator->errors(), true);
        $error = current($errorArray);
        $message['message'] = $error[0];
        return redirect()->back();
    }


    $adminEmail = $request->email_id;

    $countAdminEmail = SubAdmin::checkAdminEmailExist($adminEmail);

    if($countAdminEmail > 0)
    {

        $otp = self::randomNumber();

        $insertotp = SubAdmin::updateOtp($otp, $adminEmail);

        $emailToName = 'Admin';

        self::sendEmailSendMailToUserForForgotPasswordOtp($adminEmail, $emailToName, $otp);

        Session::flash('message', 'OTP has sent successfully');
        Session::put('alert_class', 'success');
        return redirect()->action([passwordController::class, 'showEmailValidateOtp'], [$adminEmail]);
    }

    else
    {
       Session::flash('message', 'Please enter correct email address');
       Session::put('alert_class', 'error');
       return redirect()->back();
    }

}

// ------for random number--------
public static function randomNumber2(){
    return mt_rand(100001, 999999);

}

// ----for-mail body function-----

public static function sendEmailSendMailToUserForForgotPasswordOtp2($toEmailId, $emailToName, $forgotPasswordOtp) {

    $bodyText = 'You have requested to reset your password. Please use the below code to verify your request and reset the password.<br>'
            . '<p>Your verification code is:</p><p style="font-size: 24px;margin-top:5px;"><b> ' .$forgotPasswordOtp . '</b></p>';

    $subject = 'Reset Your Password';

    $send = \Mail::to($toEmailId)->send(new SendMailToUser($emailToName, $subject, $bodyText));

    return true;
}




// ============validate--email--otp--page================

public function doEmailValidateOtp(Request $request){

    $input = $request->all();
    $validator = Validator::make($input, [
        'email_id' => 'required|email',
        'otp'=>'required'
       ]);


    if ($validator->fails())
    {
        $errorArray = json_decode($validator->errors(), true);
        $error = current($errorArray);
        $message['message'] = $error[0];
        return redirect()->back();
    }

    $adminEmail= $request->email_id;
    $forgototp = $request->otp;

    $validateotp = SubAdmin::validateEmailOtp($adminEmail,$forgototp);

    if($validateotp)
    {
        Session::flash('message', 'Email-otp verfied successfully.');
        Session::put('alert_class', 'success');
        return redirect()->action([ForgetPasswordController::class, 'showResetPassword'], [$adminEmail]);
    }
    else
    {
       Session::flash('message', 'Please enter correct Email-OTP');
       Session::put('alert_class', 'error');
       return redirect()->back();
    }
}

// reset Password page==================

public function doResetPassword(Request $request){

    $input = $request->all();

    $validator = Validator::make($input, [
        'email_id' => 'required|email',
        'password'=>'required|min:6|max:12',
        'password_confirmation' => 'required|same:password'


       ]);

    if ($validator->fails())
    {
        $errorArray = json_decode($validator->errors(), true);
        $error = current($errorArray);
        $message['message'] = $error[0];
        Session::flash('message', 'Password not matched.');
        Session::put('alert_class', 'error');
        return redirect()->back();
    }


    $adminEmail= $request->email_id;
    $passwordHash = password_hash($request->password, PASSWORD_DEFAULT);


    $save = SubAdmin::updateAdminPasswordByEmail($passwordHash,$adminEmail );

    if($save)
    {
        Session::flash('message', 'Password has been updated successfully.');
        Session::put('alert_class', 'success');
        return redirect()->action([ AdmLoginController::class, 'showAdmLogin']);
    }
    else
    {
        Session::flash('message', 'Please enter correct email.');
        Session::put('alert_class', 'error');
        return redirect()->back();

    }
}



public function forgetpassword()
{
    return view('auth-recoverpw');
}



public function forgetpasswordemail(Request $request)
{

    // dd($request->all());
    try{
        $user = AdminUsers::where('email_address',$request->email_address)->get();
        // dd($user);
        if(count($user)>0)
        {
           $email_address = trim($request->email_address);

            $otp = self::randomNumber();

            $save = self::saveEmailOtp($email_address, $otp);

            if($save){
                $toUserName = 'Admin';
                $mailSend =  self::sendEmailSendMailToUserForForgotPasswordOtp($email_address, $toUserName, $otp);
                // dd($mailSend);

                    if($mailSend){
                        // return redirect('/OTPpage')->with('email',$email);
                        return view('forget_password_otp_page')->with('message','OTP sent to your Email')->with('email_address',$email_address);
                    }else{
                        return back()->with('message',"Some Error to send OTP ??");
                    }
            }

        }
        else
        {
          return back()->with('message',"Error Your Email wouldn't Exists??");
        }

      }
      catch(\Exception $e){

        return back()->with('error',$e->getMessage());

      }
}

// ------for Saving email and otp--------
public static function saveEmailOtp($email, $otp) {
    $dateTime = gmdate('Y-m-d H:i:s');

    $sql = "REPLACE INTO verify_email(email_id, otp, created_datetime) VALUES ('$email', $otp, '$dateTime' )";
    $save = DB::statement($sql);
    return true;
}

// ------for random number--------
public static function randomNumber(){
    return mt_rand(1000, 9999);

}

// ----for-mail body function-----
public static function sendEmailSendMailToUserForForgotPasswordOtp($toEmailId, $toUserName, $otp) {

    $bodyText = 'You have requested to reset your password. Please use the below code to verify your request and reset the password.<br>'
            . '<p>Your verification code is:</p><p style="font-size: 24px;margin-top:5px;"><b> ' . $otp . '</b></p>';

    $subject = 'OTP send sucessfully';

    $send = Mail::to($toEmailId)->send(new SendMailToUser($toUserName, $subject, $bodyText));

    return true;
}

public function verifyotp(Request $request){
    $email_address = $request->email_address;
    $verifyotp = $request->otp;

    // dd($request->all());

    $validateotp = self::validatePhoneOtp($email_address, $verifyotp);

    if($validateotp <1){
        return response()->json(['success' => false,'msg'=> 'You entered wrong OTP']);
    }
    else{

        $currentTime = time();
        $time = strtotime(DB::table('verify_email')
        ->where('email_id', $email_address)
        ->where('otp', $verifyotp)
        ->value('created_datetime'));
        //  dd($time);
        if($currentTime >= $time && $time >= $currentTime - (60+5)){//60 seconds
            return response()->json(['success' => true,'msg'=> 'OTP has been verified','email_address'=>$email_address]);
        }
        else{
            return response()->json(['success' => false,'msg'=> 'Your OTP has been Expired']);
        }

    }
}

public static function validatePhoneOtp($email, $otp)
{
    $count = DB::table('verify_email')
                ->where('email_id', $email)
                ->where('otp', $otp)
                ->count();
    return $count;
}

public function resetpasswordsave(Request $request)
{
    // dd($request->all());
    $request->validate([
        'password' => 'required',
      ]);
    //   $user = Admin_User::find($request->id);
      $user = AdminUsers::where('email_address','=',$request->email_address)->first();
    //   dd($user);
      if($user)
      {
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('/')->with('success','Your Password Reset Successfully You can Login Now !!');
      }

    //   dd($user);
      //delete token for better thinking
    //   Admin_Passwordreset::where('email',$user->email_address)->delete();
      else{
        // dd('ok');
        return redirect('/')->with('message','Your Password Not Reset due to some error !!');
      }
}

}
