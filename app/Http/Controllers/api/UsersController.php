<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsersRequest;
use Illuminate\Http\Request;
use app\User;
use Exception;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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

       try{
        $user=User::create($usersData);

        $token=$user->createToken('fundilink')->accessToken;

        return response([
            'message'=>'Account created successfully, Welcome',
            'token'=>$token,
            'user'=>$user
        ], 400);
       } catch(Exception $exc){
           return response([
               'message'=>$exc->getMessage()
           ], 401);
       }
    }

    public function login(Request $req)
    {

    }

    public function index()
    {
        //
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
