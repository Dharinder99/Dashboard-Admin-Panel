<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transactions;
use App\Models\Users;



class TransactionsController extends Controller
{

    public function usersubscriptions()
    {
        $divToShow = 0;
        $formCount = 0;

        $data= Transactions::usersubscriptionmodel();
        // dd($data);
        //  $userdata = Users::all();
       return view('transactions')


       ->with('divToShow', $divToShow)
       ->with('formCount', $formCount)
       ->with('data', $data);
    //    ->with('userdata', $userdata);

    }

}
