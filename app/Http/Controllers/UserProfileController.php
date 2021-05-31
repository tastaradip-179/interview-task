<?php

namespace App\Http\Controllers;

use App\UserProfile;
use Illuminate\Http\Request;
use Validator;
use App\Http\Resources\UserProfile as UserProfileResource;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $input = $request->all();

        $validator = Validator::make($input, [
            'user_id' => 'required',
            'designation' => 'required',
            'gender' => 'required'
        ]);   

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $user_profile = UserProfile::create($input);

        return response()->json([
                                        'success' => true,
                                        'data'    => new UserProfileResource($user_profile),
                                        'message' => 'UserProfile created successfully.',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $user_profile = UserProfile::find($id);

        if (is_null($user_profile)) {
             return response()->json([
                                        'message' => 'Not Found',
            ]);
        }

        return response()->json([
                                       
                                        'data'    => new UserProfileResource($user_profile),
                                        'message' => 'UserProfile retrieved successfully.',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(UserProfile $userProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserProfile $userProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserProfile $userProfile)
    {
        //
    }
}
