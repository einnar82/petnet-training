<?php

namespace App\Http\Controllers\API;

use App\Cache\CachableResponses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // \DB::connection()->enableQueryLog();

        // $queries = \DB::getQueryLog();
        // \Log::debug($queries);
        // return (new CachableResponses(User::all(), 'users', 10))->cache();
        // return \Cache::get('users');
        // return \Cache::remember('users', 60, function () {
        //     return \DB::table('users')->get();
        // });
        // \Cache::put('users', User::all(), 60);
        // return \Cache::get('users');
        return \Cache::remember('users', 60, function () {
            return User::all();
        });

        // return User::all();
        // \Cache::flush();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return User::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($user  = User::find($id)) {
            return $user;
        }
        // return User::findOrFail($id);
        // return User::find($id);
        return response()->json(['message' => 'No user found!'], 404);
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
        return tap(User::find($id))->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (User::findOrFail($id)->delete()) {
            return response()->json(['message' => 'User deleted!'], 200);
        }
    }
}
