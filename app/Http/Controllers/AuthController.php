<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Traits\HttpResponses;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendForgotPassword;
use App\Mail\EventNotification;
use Carbon\Carbon; 
use Hash;
// use Illuminate\Support\Str;
/**
 * Class AuthController
 *
 * @package App\Http\Controllers
 */
class AuthController extends Controller
{
    use HttpResponses;

         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUsersByType($role)
    {
        /**Check if event exist */
        $users = DB::table('users')
            ->where('role',$role)
            ->orderBy('created_at', 'desc')
            ->get();
    
        return $this->success(["users" =>  $users], "", 200);

    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'fullname' => 'required|string',
            'cellphone_number' => 'required|string',
            'gender' => 'required|string',
            'role' => 'required|string',
            'email' => 'required|email|string|unique:users,email',
            'password' => [
                'required',
                'confirmed',
                Password::min(8)->mixedCase()->numbers()->symbols()
            ]
        ]);

        if (!$request->hasFile('profile_picture')) {
            return $this->error('', 'Please upload file', 404);
        } 

         
        $file = $request->file('profile_picture')->store('profiles', 'public_uploads');
       
        $data['profile_picture'] = asset('uploads/'.$file);

        /** @var \App\Models\User $user */
        $user = User::create([
            'fullname' => $data['fullname'],
            'cellphone_number' => $data['cellphone_number'],
            'section' => $request->section,
            'id_number' => $request->id_number,
            'profile_picture' => $data['profile_picture'],
            'gender' => $data['gender'],
            'role' => $data['role'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);
        
        $token = $user->createToken('main')->plainTextToken;

      
        return response([
            'user' => $user,
            'token' => $token,
        ]);
    }

   /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Request $request, $id)
    {
        $idHolder=$id;
        // return $this->success(["user" =>  $request->fullname], "", 200);
        $data = $request->validate([
            'fullname' => 'required|string',
            'cellphone_number' => 'required|string',
            'gender' => 'required|string',
        ]);

        // return $this->success(["user" =>  $data], "", 200);

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture')->store('profiles', 'public_uploads');
            $data['profile_picture'] = asset('uploads/'.$file);

            if($id!=0){
                $id =  DB::table('users')
                ->where('id', $id)
                ->update([
                    'fullname' => $data['fullname'],
                    'cellphone_number' => $data['cellphone_number'],
                    'section' => $request->section,
                    'id_number' => $request->id_number,
                    'profile_picture' => $data['profile_picture'],
                    'gender' => $data['gender'],
                ]);
    
                $user = DB::table('users')->where('id', '=',$idHolder)->get();
                
                return $this->success(["user" =>  $user[0]], "", 200);
            }
    
        } else{
            if($id!=0){
                $id =  DB::table('users')
                ->where('id', $id)
                ->update([
                    'fullname' => $data['fullname'],
                    'cellphone_number' => $data['cellphone_number'],
                    'section' => $request->section,
                    'id_number' => $request->id_number,
                    'gender' => $data['gender'],
                ]);
    
                $user = DB::table('users')->where('id', '=',$idHolder)->get();
                
                return $this->success(["user" =>  $user[0]], "", 200);
            }
        }

    return $this->error('', 'Please upload file', 404);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|string|exists:users,email',
            'password' => [
                'required',
            ],
            'remember' => 'boolean'
        ]);
        $remember = $credentials['remember'] ?? false;
        unset($credentials['remember']);

        if (!Auth::attempt($credentials, $remember)) {
            return response([
                'error' => 'The Provided credentials are not correct'
            ], 422);
        }

        /** @var \App\Models\User $user */
        $user = Auth::user();
        $token = $user->createToken('main')->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token
        ]);
    }
    public function logout()
    {
        /** @var User $user */
        $user = Auth::user();
        // Revoke the token that was used to authenticate the current request...
        $user->currentAccessToken()->delete();

        return response([
            'success' => true
        ]);
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   $idHolder=$id;
        
        if($id!=0){
            
            /**Delete data */
            DB::table('users')
            ->where('id', $id)
            ->delete();

             /**Delete data */
            DB::table('event_registrations')
             ->where('user_id', $id)
             ->delete();
            
            DB::table('events')
             ->where('posted_by', $id)
             ->delete();
                   
            return $this->success([], "Deleted successfully", 200);
        }

        return $this->error('', 'Record not found', 404);
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $user = DB::table('users')
        ->where('email',$request->email)
        ->get();

       
        if(empty($user)){
            return $this->error('', 'Record not found', 404);
        }
        
        $token = Str::random(64);
        
        DB::table('password_resets')->insert([
            'email' => $request->email, 
            'token' => $token, 
            'created_at' => Carbon::now()
          ]);
         

          Mail::to($request->email)
          ->send(new SendForgotPassword($user[0]->fullname,$user[0]->email, $token));

        //   Mail::to("duatin08@gmail.com")
        //   ->bcc(["mercado.jerrymih@clsu2.edu.ph","mercado.jerrymih1414@gmail.com","yamaguchixia1406@gmail.com","fjlopez259@gmail.com","lopez.fernando@clsu2.edu.ph"])
        //   ->send(new EventNotification("jocel"));
        return $this->success( [], "We have e-mailed your password reset link!", 200);

       
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $auth_user = auth()->user();
        
        $user = User::where('id',  $auth_user->id)
                    ->update(['password' =>  bcrypt($request->password)]);

        return $this->success( [], "Your password has been changed!", 200);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')
                            ->where([
                              'email' => $request->email, 
                              'token' => $request->token,
                              
                            ])
                            ->where('created_at', '>=', Carbon::now()->subHours(1)->toDateTimeString())
                            ->orderBy('id', 'desc')
                            ->first();

        if(!$updatePassword){
            return $this->error('', 'Invalid token', 404);

        }

        $user = User::where('email', $request->email)
                    ->update(['password' =>  bcrypt($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        return $this->success( [], "Your password has been changed!", 200);
    }



}
