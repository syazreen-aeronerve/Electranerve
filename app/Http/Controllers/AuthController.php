<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Auth.login');
    }

    public function register()
    {
        return view('Auth.register');
    }

    public function index_admin()
    {
        return view('Auth.login-admin');
    }

    public function register_admin()
    {
        return view('Auth.register-admin');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function login(Request $request)
    {
        $user = User::where('email',$request->input('email'))->first();

        if($user != ''){

            if(Hash::check($request->input('password'), $user->password)){
                auth()->login($user);

                if(auth()->user()->role == 'Customer'){

                return redirect()->to('/customer-home');
                }
                else{
                    return redirect()->to('/home-organiser');    
                }
            }
            else{
                return redirect()->back()->with('error', 'The Email or Password is incorrect, Please try again');
            }
        }
        else{
            return redirect()->back()->with('error', 'The Email or Password is incorrect, Please try again');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function registerpost(Request $request)
    {
       
        $rules = [
            'name' => [
                'required',
                'string',
                'min:0',
                'max:100',            
            ],
            'email' =>  [
                'required',
                'string',
                'email',
                'min:0',
                'max:255',
                'unique:users,email', 
            ],
            'phone' =>  [
                'required',
                'string',
                'min:9',
                'max:20'           
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'max:32',            
                'regex:/[a-z]/',     
                'regex:/[A-Z]/',     
                'regex:/[0-9]/',     
                'regex:/[@$!%*#?&]/', 
            ],
           

          
        ];

        $messages = array(
           
        );
        
        $this->validate($request, $rules,$messages);

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $phone = $request->input('phone');
        $role = $request->input('role');
        

        $user = User::create(request(['name', 'email', 'phone', 'role', 'status', 'email_verified_at', 'password']));
		$user->password = Hash::make($password);
		$user->email = $email;
        $user->phone = $phone;
        $user->name = $name;
        $user->role = $role;
        $user->save();
        auth()->login($user);

        if($role == 'Customer'){
        return redirect()->to('/customer-home');
        }
        else{
        return redirect()->to('/home-organiser');
        }
    }


    public function loginadmin(Request $request)
    {
        $user = User::where('email',$request->input('email'))->first();

        if($user != ''){

            if(Hash::check($request->input('password'), $user->password)){
                auth()->login($user);

                return redirect()->to('/home-organiser');
            }
            else{
                return redirect()->back()->with('error', 'The Email or Password is incorrect, Please try again');
            }
        }
        else{
            return redirect()->back()->with('error', 'The Email or Password is incorrect, Please try again');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function registerpostadmin(Request $request)
    {
       
        $rules = [
            'name' => [
                'required',
                'string',
                'min:0',
                'max:100',            
            ],
            'email' =>  [
                'required',
                'string',
                'email',
                'min:0',
                'max:25',
                'unique:users,email', // Ensure the email is unique in the 'users' table
            ],
            'phone' =>  [
                'required',
                'string',
                'min:9',
                'max:20'           
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'max:32',             // must be at least 10 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
            ],
           

          
        ];

        $messages = array(
           
        );
        
        $this->validate($request, $rules,$messages);

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $phone = $request->input('phone');

        $user = User::create(request(['name', 'email', 'phone', 'role', 'status', 'email_verified_at', 'password']));
		$user->password = Hash::make($password);
		$user->email = $email;
        $user->phone = $phone;
        $user->name = $name;
        $user->role = 'Event Organiser';
        $user->save();
        auth()->login($user);
        return redirect()->to('/home-organiser');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function signout(Request $request)
    {
        auth()->logout();
        return redirect('/');
    }

    public function signoutadmin(Request $request)
    {
        auth()->logout();
        return redirect('/login-admin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
