<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class MainController extends Controller
{
    //

    public function index(){

        return view('swiftsms.home');
    }

    public function home(Request $request){

        $user = $request->user(); 

        //    dd($select);
        
        return view('dashboard.home', compact("user"));
    }

    public function login(){

        return view('dashboard.login');
    }
     public function Compose(Request $request){
        $user = $request->user();

        return view('dashboard.compose', compact('user'));
     }

     public function uploadContact(Request $request){

        $user = $request->user(); 

        return view('dashboard.uploadcontact', compact("user"));
     }

     public function register(Request $request){

        $data = $request->all();

        $query = DB::table('users')->Insert([
            'first_name'    => $data['firstname'],
            'last_name'    => $data['lastname'],
            'email'    => $data['email'],
            'password'    => $data['password'],
            'phone_number'    => $data['phone']
        ]);

        return response()->json(['success'=>$query]);
     }

     public function loginuser(Request $request){

        $data = $request->all(); 

        // dd(Hash::make($data['password']));

        $isAuthorized = Auth::attempt(['email' => $data['email'], 'password' => $data['password']]);

        if($isAuthorized){
           return response()->json(['success' => true]); 
        }
        else{
           return response()->json(['success' => false]); 
        }
        // $select = DB::table('users')->select('users.*')->where([
        //     'email' => $data['email'],
        //     'password' => $data['password']
        //    ])->get();


     }

     public function excelview(){
        return view('swiftsms.uploadcontact');
     }
}
