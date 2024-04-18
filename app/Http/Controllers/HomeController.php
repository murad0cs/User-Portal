<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome(){
        //return view('admin-home');
        $user=user::paginate(4);
        return view('admin-home',compact('user'));
    }

    // public function search_data(Request $request){
    //     $data = $request->input('search');
    //     $user = DB::table('users')->where('name', 'like', '%' . $data .'%')->get();
    //     $user->dob = Carbon::parse($user->dob);
    //     return view('admin-home',compact('user'));
    //     //return $data;
    // }
    public function search_data(Request $request)
    {
        $data = $request->input('search');

        // Retrieve users whose name matches the search input
        $user = DB::table('users')->where('name', 'like', '%' . $data . '%')->paginate(10);;

        // Convert date of birth (dob) to Carbon date objects for each user
        $user->transform(function ($user) {
            $user->dob = Carbon::parse($user->dob);
            return $user;
        });

        return view('admin-home', compact('user'));
    }

    // public function home(){
    //     $user=user::paginate(10);
    //     return view('admin-home',compact('user'));
    // }
}
