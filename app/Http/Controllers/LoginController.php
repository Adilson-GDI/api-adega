<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator as ValidatorFacade;
use App\Http\Controllers\Controller;


class LoginController extends Controller
{
    
    public function login(Request $request)
    {
//dd($request);
  
      $validator = $this->validation($request);

        if ($validator->fails()) {
            return $this->response('Os dados informados não são válidos', 406, [], $validator->errors()->toArray());
        } 

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return $this->response('Credenciais inválidas', 406);
        }

        $token = $user->createToken('authToken')->accessToken;

        return response()->json(compact('token'));
     
    }


    public function logout(Request $request){

    }


    public function validation(Request $request): Validator
    {
        return ValidatorFacade::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
    }

    
    public function unauthorized()
    {
        return response()->json(['message' => 'Unauthorized'], 401);
    }


}
