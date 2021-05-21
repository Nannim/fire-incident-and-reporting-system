<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $users = User::withCount('reports')->where('id', '!=', auth()->id())->paginate(20);
        return view('livewire.crud', compact('users'))->with('success', 'Success');
     }
    public function __invoke(Request $request)
    {
        //
    }
}
