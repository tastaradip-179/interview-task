<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserListController extends Controller
{


	public function index(){
		$users = User::all();
		return response()->json([
                                        'success' => true,
                                        'data'    => $users
                                        
        ]);
	}
    
}
