<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserApi;
use SAPNWRFC\Connection as SapConnection;
use SAPNWRFC\Exception as SapException;
use Log;
class UserAPiController extends Controller
{
    //
    // function gettingData(){
    //     return ["name" => "Pravallika", "email" => "pravallika2117@gmail.com", "place" => "kuwait"];
    // }

    public function index(){
        return view('form_data');
    }

    function getData(){
        return UserApi::all();
    }
     function addData(Request $request){

        $user = new UserApi;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->place=$request->place;
        $result=$user->save();
        if($result){
            return ["Result" => "Data Saved Successfully"];
        }else{
            return ["Result" => "Error"];
        }
    }

    public function sapconnect(Request $request) {
        
        // Log::info($request);
        $user = new UserApi;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->place=$request->place;
        // $results=$user->save();
        
        // echo "<pre>";
        // print_r($results);exit;
        // if($results){
        //     return ["Result" => "Data Saved Successfully"];
        // }else{
        //     return ["Result" => "Error"];
        // }
       
        // connect to  sap
        
        $config = [
            'ashost' => env('SAP_HOST'), //address
            'sysnr' =>  env('SAP_SYSNR'), //system number
            'client' => env('SAP_CLIENT'), //client number
            'user' =>   env('SAP_USER'),   //username
            'passwd' => env('SAP_PWD'),  //password
            'trace' => SapConnection::TRACE_LEVEL_OFF,
        ];
        //    echo "<pre>";
        //   print_r($config);exit;
        try {

            $con = new SapConnection($config);

            $file = $con->getFunction('ZPHP_REPT_CUSTOMER_CALL'); //Function name
            $f->setParameterActive('STATUS', true); // activate parameters
            $f->setParameterActive('QMNUM', true); // activate parameters

            $result = $file->invoke([
                'STATUS' => 'P022',
                'QMNUM' => '000001188829'
            ]);
            //    echo "<pre>";
            // print_r($result);exit;
            return view(['form_data', "data" => $result])->with('status','Data Saved Successfully');
        } catch (SapException $ex) {
            return null;
        }
    }
}
