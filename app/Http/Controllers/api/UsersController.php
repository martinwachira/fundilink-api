<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsersRequest;
use Illuminate\Http\Request;
use App\User;
use Exception;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //users register method
    public function register(UsersRequest $req)
    {
        $usersData = array(
            'name'=>$req->name,
            'email'=>$req->email,
            'password'=>bcrypt($req->password),
            'role'=>$req->role,
            'desc'=>$req->desc,
            'designation'=>$req->designation,
        );    

       try {
        
        $user=User::create($usersData);

        $token=$user->createToken('fundilink')->accessToken;       

        return response([
            'message'=>'Account created successfully, Welcome',
            'user'=>$user,
            'token'=>$token
        ], 200);
       } catch(Exception $exception){
           return response([
               'message'=>$exception->getMessage()
           ], 401);
       }
    }

    //users login method
    public function login(Request $req)
    {  
        $credentials = [
            'email' => $req->email,
            'password' => $req->password
        ]; 

        try {
            if (Auth::attempt($credentials)){
                $user=Auth::user();
                $token=$user->createToken('fundilink')->accessToken;
                return response([
                    'message'=>'Logged in successfully',
                    'user'=>$user,
                    'token'=>$token
                ], 200);
            }
        }catch(Exception $exception){
            return response([
                'message'=>$exception->getMessage()
            ],400);
        }
        return response([
            'message'=>'Invalid login credentials'
        ], 401);
        // $login = $req->validate([
        //     'email'=>'required|string',
        //     'password'=>'required|string'
        // ]);
        // if(!Auth::attempt($login)){
        //     return response (['message'=>'invalid']);
        // }
        // $accessToken = Auth::user()->createToken('auth')->accessToken;

        // return response(['user' => Auth::user(), 'access-token' => $accessToken]);
    }   

    public function getUsers()
    {
        $users = User::all();
        return response()->json($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
