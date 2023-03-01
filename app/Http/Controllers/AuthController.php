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
}
