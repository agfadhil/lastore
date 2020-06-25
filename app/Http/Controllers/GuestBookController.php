<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestBookController extends Controller
{
    public function index()
    {
    	return view('guestBook');
    }

    public function save_feedback(Request $request)
    {
    	# code...
    }

    public function download_feedback(Request $request)
    {
    	# code...
    }
}
