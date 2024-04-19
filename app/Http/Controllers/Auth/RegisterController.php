<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'dob' => ['required', 'date'],
            //'file_up' => ['required','file','max:2048'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        
    }
    
    

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'dob' => $data['dob'],
            'file_up' => $data['file_up'],
            'password' => Hash::make($data['password']),
        ]);

        if (request()->hasFile('file_up')){
            $file_up = request()->file('file_up')->getClientOriginalName();
            request()->file('file_up')->storeAs('file_up',$user->id . '/' . $file_up,'');
            $user->update(['file_up' => $file_up]);
        }

        return $user;
    }

    public function checkEmail(Request $request)
    {
        Log::info('Reached checkEmail method');
        try {
            $request->validate([
                'email' => 'required|email',
            ]);
            $email = $request->input('email');

            $user = User::where('email', $email)->first();

            if ($user) {
                // Email already exists
                return response()->json(['exists' => true]);
            }

            // Email does not exist
            return response()->json(['exists' => false]);
        } catch (\Exception $e) {
            // Log the exception for further investigation
            \Log::error($e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }

    }
}
