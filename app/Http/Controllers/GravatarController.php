<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Creativeorange\Gravatar\Facades\Gravatar;
use Illuminate\Support\Facades\Auth;


class GravatarController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gravatar()
    { 
    	$gravatarArray = array();
    	$gravatarMail;
        // get image
        if(Auth::check()){
            $gravatarMail = Auth::user()->email;
        }
        
        Gravatar::get($gravatarMail);
        // set fallback image
        Gravatar::fallback('https://www.nicesnippets.com/.....image_url')->get('test@example.com');
        $gravatarArray = Gravatar::get(Auth::user()->email, ['size' => 150]);

        return view('gravatar',compact('gravatarArray'));
    }
}
