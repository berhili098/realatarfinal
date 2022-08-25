<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $fields = $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);
            $user = Client::Where('email', 'like', $fields['email'])->first();
            if (!$user) {
                return response([
                    'response' => 'usernotfound'
                ], 404);
            }
            if (!Hash::check($fields['password'], $user->password)) {
                return response([
                    'response' => 'wrongpassword'
                ], 401);
            }
            $token = $user->createToken('abdessamad')->plainTextToken;
            $user->password = '';
            return response(["token" => $token, "client" => $user], 200);
        } catch (\Exception $ex) {
            return response(["response" => $ex->getMessage()], 400);
        }
    }

    public function register(Request $request)
    {
        try {
            $fields = $request->validate([
                'uid' => 'required|string',
                'fullname' => 'required|string',
                'email' => 'required|email|unique:clients',
                'password' => 'required|string',
            ]);
            $user = Client::create([
                'uid' => $fields['uid'],
                'fullname' => $fields['fullname'],
                'email' => $fields['email'],
                'password' => bcrypt($fields['password'])
            ]);
            $token = $user->createToken('abdessamad')->plainTextToken;
            return response(["response" => "createdsuccessfullay", "token"=>$token], 201);
        } catch (\Exception $ex) {
            return response(["response" => $ex->getMessage()], 400);
        }
    }

    public function CompleteProfile(Request $request)
    {
        try {
            $fields = $request->validate([
                'uid' => 'required|string',
                'phone' => 'required',
                'birthday' => 'required|string',
                'gender' => 'required|string',
                'city' => 'required|string',
            ]);
            if ($fields['gender'] == 'Male' || $fields['gender'] == 'Female') {
                $client = Client::find($fields['uid']);
                if($client != null){
                    $client->update([
                        'birthday' => $fields['birthday'],
                        'city' => $fields['city'],
                        'phone' => $fields['phone'],
                        'gender' => $fields['gender'],
                        'status'=> 1
                    ]);
                    return response(["response" => "updateprofile1succefually"], 200);
                }
                else{
                    return response(['response' => 'usernotfound'], 404);
                }
            }
            else{
                return response(['response' => 'selectvalidgender'], 400);
            }
        } catch (\Exception $ex) {
            return response(['response' => $ex->getMessage()], 400);
        }
    }
    public function UploadProfilePicture(Request $request){
        if($request->hasFile('image')){
            $destination_path = 'primary/assets/images/clients';
            $image = $request->file('image');
            $image_name = time().'_profile_picture_'.$request->uid.$image->getClientOriginalName();
            $path = $request->file('image')->move($destination_path, $image_name);
            $client = Client::find($request->uid);
            $client->update([
                "avatar"=>"$destination_path/$image_name"
            ]);
            return response(['message'=>'success', 'path' => 'clients/'.$image_name], 200);
        }
        else{
            return response('error', 400);
        }
    }
    public function logout(Request $request){
        $request->validate([
            "uid" => "required"
        ]);
        $userId = $request->uid;
        $tokens = Token::where('tokenable_id', $userId);
        if($tokens != null){
            $tokens->delete();
            return response(["message" => "logedout!!"], 200);
        }
        else{
            return response(["message" => "error"], 400);
        }
    }
}
