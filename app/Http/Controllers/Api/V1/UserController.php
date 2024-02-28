<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use HttpResponses;
    
    public function register(StoreUserRequest $request)
    {
        $request->Validated();
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        return $this->success([
            'user'=>$user,
            'token'=>$user->createToken('Api of user '.$user->name)->plainTextToken
        ],'this is message content');
        
    }

    public function login(LoginUserRequest $request)
    {   
        $request->validated();
        
        $credentials =['email'=>$request->email,'password'=>$request->password];
        // check if the email and password are exist
        if (!Auth::attempt($credentials))
        {
           return $this->error('','credentials are not match',401);
        }

        $user=User::where('email',$request->email)->first();

        return $this->success([
            'user'=>$user,
            'token'=>$user->createToken('Api Token of '.$user->name)->plainTextToken
        ],'user can login now');
    }

    public function logout()
    {
        
    }

}
