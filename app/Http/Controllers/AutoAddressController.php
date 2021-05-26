<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use PDF;

class AutoAddressController extends Controller
{
    public function index(Request $request)
    {
        return view('auto-complete-city');
    }
    public function __invoke()
    {
        //
    }
}
