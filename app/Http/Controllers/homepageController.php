<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homepageController extends Controller
{
    //

    function mining()
    {


        return view('mining');
    }
    function invest()
    {


        return view('invest');
    }
   

}
