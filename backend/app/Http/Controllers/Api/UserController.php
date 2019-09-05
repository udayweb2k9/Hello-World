<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\User;
use Hash;
use Response;
use DB;

class UserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | User Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles User section from API
    |
    */ 

    public function list() 
    {   

        DB::beginTransaction();
        try {   
            $user = User::where('status',1)->where('deleted',0)->where('account_type',2)->get();            

            $success_array = ['success' => 'true','error_code' => 200, 'msg' => 'Data listed successfully.'];
            $user_arr=[];
            foreach($user as $details)
            {
                $user_arr[]=[
                    'id' =>$details->id,
                    'name' =>$details->name,
                    'username' =>$details->username,
                    'email' =>$details->email
                ];
            }
            $success_array['data']=$user_arr;

            return Response::json($success_array);

        } catch (\Illuminate\Database\QueryException $e) {              
            DB::rollback(); 
            $success_array = ['success' => 'false', 'message' =>$e->getMessage(), 'error_code' => 500];
            
          return Response::json($success_array);
        }

    }

    public function show($id) 
    {   

        DB::beginTransaction();
        try {   
            $user = User::where('status',1)->where('deleted',0)->where('id',$id)->get();            

            $success_array = ['success' => 'true','error_code' => 200, 'msg' => 'Data listed successfully.'];
            $user_arr=[];
            foreach($user as $details)
            {
                $user_arr[]=[
                    'id' =>$details->id,
                    'name' =>$details->name,
                    'username' =>$details->username,
                    'email' =>$details->email
                ];
            }
            $success_array['data']=$user_arr;

            return Response::json($success_array);

        } catch (\Illuminate\Database\QueryException $e) {              
            DB::rollback(); 
            $success_array = ['success' => 'false', 'message' =>$e->getMessage(), 'error_code' => 500];
            
          return Response::json($success_array);
        }

    }

    public function store(Request $request) 
    {
        $name=$request->get('name');
        $email=$request->get('email');
        $username=$request->get('username');
        $account_type=$request->get('account_type');
        $password=Hash::make($request->get('password'));
        $email_verified_at=date("Y-m-d H:i:s");

        DB::beginTransaction();
        try {   
            $user = new User();

            $user->name=$name;
            $user->email=$email;
            $user->username=$username;
            $user->account_type=$account_type;
            $user->password=$password;
            $user->email_verified_at=$email_verified_at;
            $user->save();

            DB::commit();

            $success_array = ['success' => 'true','error_code' => 0, 'msg' => 'Data added successfully.'];
            $success_array['data']=$user;

            return Response::json($success_array);

        } catch (\Illuminate\Database\QueryException $e) {              
            DB::rollback(); 
            $success_array = ['success' => 'false', 'message' =>$e->getMessage(), 'error_code' => 500];
            
          return Response::json($success_array);
        }

    }

    public function update(Request $request,$id) 
    {   
        $name=$request->get('name');
        $email=$request->get('email');
        
        DB::beginTransaction();
        try {   
            $success_array = [
                'success' => 'true',
                'error_code' => 200, 
                'msg' => 'Data updated successfully.'
            ];
          
            User::where('id', $id)->update([
                'name'    => $name,
                'email'        => $email
            ]); 

            DB::commit();
            $success_array['data']=[];

            return Response::json($success_array);

        } catch (\Illuminate\Database\QueryException $e) {              
            DB::rollback(); 
            $success_array = ['success' => 'false', 'message' =>$e->getMessage(), 'error_code' => 500];
            
          return Response::json($success_array);
        }

    }

    public function delete($id) 
    { 
        $check_exists = User::where('id',$id)->count();
        if($check_exists <= 0)
        {
            return response()->json([
                'success' => 'false', 
                'msg' => 'Desire data not exists.', 
                'error_code' => 401]);
        }   

         
        DB::beginTransaction();

        try {   
            $success_array = [
                'success' => 'true',
                'error_code' => 200, 
                'msg' => 'Data deleted successfully.'
            ];

            $user = User::findOrFail($id);
            $user->delete();

            DB::commit();

            return Response::json($success_array);

        } catch (\Illuminate\Database\QueryException $e) {              
            DB::rollback(); 
            $success_array = ['success' => 'false', 'message' =>$e->getMessage(), 'error_code' => 500];
            
          return Response::json($success_array);
        }

    }

    
}
