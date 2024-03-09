<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\forgotPasswordMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Firebase\JWT\JWT;
use Firebase\JWT\key;
use App\Models\User;
use App\Models\Role;
use App\Models\crR;

class AuthController extends Controller
{


///////////////////////////////////////////// Sign Up /////////////////////////////////////////////
    public function create(Request $request)
    {
        
        $user = User::where('email', $request->email)->first();
        // dd($request);
        if($user){
            return redirect()->back()->with('Error','The Account Already Exist');
        }else{
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->role_id = $request->role_id;
            
            $user->save();

            return view('/login')->with('success', 'Registration Successful');
        }
    }

///////////////////////////////////////////// Sign In && Logout /////////////////////////////////////////////

    public function login(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        // dd($user);
        if($user && password_verify($request->password,$user->password)){
            $_SESSION['email'] = $user->email;

            $payload =[
                'sub' => $user->id
            ];

            $jwt = JWT::encode($payload, $_ENV['JWT_SECRET'], $_ENV['JWT_ALGO']);

            $cookie = cookie('token', $jwt, 60);
            if($user->role_id == 2 ){
                return redirect('/orDashboard')->withCookie($cookie);
            }
            elseif($user->role_id == 1 ){
                return redirect('/dashboard')->withCookie($cookie);
            }
            elseif($user->role_id ==  3){
                return redirect('/')->withCookie($cookie);
            }
 
        }else{
            return redirect()->back()->with('Eror','invalid Information');
        }
    }




    public function logout()
    {
        Session::flush();
        return view('login');
    }


///////////////////////////////////////////// Forgot && Reset Password /////////////////////////////////////////////
    
    public function forgot_Password(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if(!empty($user)){
            $user->remember_token = str::random(49); 
            $user->save();

            // dd($user);

            Mail::to($user->email)->send(new forgotPasswordMail($user));
            // dd($user);

            return redirect()->back()->with('success', 'Check Your Email');
        }
        else{
            return redirect()->back()->with('Error','Email Not found');
        }
    }




    public function resetPassword($token, Request $request)
    {
        // dd($request);
        $user = User::where('remember_token', '=', $token)->first();

        if(!empty($user)){
            
            if($request->password == $request->cpassword){
                $user->password = Hash::make($request->cpassword);
                $user->remember_token = str::random(49);
                $user->save();

                return redirect('/login')->with('success','Password Successfully Reset');
            }
            else{
                return redirect()->back()->with('Error','Pssword and Confirm Password Incorrect');
            }
        }
        else{
            abort(404);
        }
    }


///////////////////////////////////////////// partie admin CRUD user /////////////////////////////////////////////

    public function afficheUsers(Request $request)
    {
        // $token = $request->cookie('token');
        // $data = JWT::decode($token, new key($_ENV['JWT_SECRET'],'HS256'));
        // DB::enableQueryLog();
        // $queryLog = DB::getQueryLog();
        // dd($queryLog);
            $users = DB::table('roles')->join('users','roles.id','=','users.role_id')
                                        ->select('users.*','roles.role')
                                        ->where('role_id','!=', 1)
                                        ->paginate(5);
            $roles = Role::orderByDesc('id')->limit(2)->get();
            
            return view('admin.users', compact('users','roles'));

    }



    public function ajouterUser(Request $request)
    {
        // dd($request);
        $user = User::where('email',$request->email)->first();
        if(!$user){

            $user = new User();
            
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->role_id = $request->role_id;
            
            $user->save();
            
            return redirect()->back()->with('success','Ajouter avec success');
        }
    }



    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->back();
    }



    public function getUser($id)
    { 
        $user = User::find($id);
        $role = Role::orderByDesc('id')->limit(2)->get();
         return view('admin.update_user', compact('user','role'));
    }



    public function updateUser(Request $request)
    {
        $user = User::findOrFail($request->id);

        $user->name = $request->name ;
        $user->email = $request->email ;
        $user->password = $request->password ;
        $user->role_id = $request->role_id ;
        // dd($user);
        $user->update();

        return redirect('/users');
    }
}
