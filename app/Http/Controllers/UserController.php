<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse; 
use App\Traits\Common;
use App\Models\Car ;
use App\Models\User ;
use App\Models\Contact ;

use App\Models\Category ;
use App\Mail\ContactMail;
use Mail;
class UserController extends Controller
{
    use Common; 

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User:: get(); 
        $unreadMessageCount = Contact::where ('read_status','0')->count();

        return view('admin.users', compact ('users','unreadMessageCount'));
    }
    public function register()
    {
        return view('auth.register');
    }

    public function logout()
    {
        return view('auth.login');
    }

    public function username()
    {
        $fullName = Auth::user()->first_name . ' ' . Auth::user()->last_name;
        return view('admin.includes.header', ['fullName' => $fullName]);

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unreadMessageCount = Contact::where ('read_status','0')->count();

        return view('admin.addUser', compact ('unreadMessageCount'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $messages=$this->messages();
        $data = $request->validate ([
            'name'=>'required|string',
            'username'=>'required|string',
            'email'=>'required|string',
            'password'=>'required|string',
            
        ], $messages);
       
           
            $data['active'] = isset($request['active']); 
            User::create($data);
            return redirect()->route('users');
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
        $users = User::findOrFail($id);
        $unreadMessageCount = Contact::where ('read_status','0')->count();

        return view('admin.edituser', compact ('users','unreadMessageCount'));      }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $messages=$this->messages();

        $data =$request->validate ([
            'name'=>'required|string',
            'username'=>'required|string',
            'email'=>'required|string',
            'password'=>'required|string',

        ], $messages);
        
        $data['active'] = isset($request['active']); 
    
        User::where('id', $id)->update($data);
            return redirect()->route('users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User :: where('id', $id)->forceDelete();

        return redirect()->route('users');   
     }
     public function messages(){
        return [ 'name.required' => 'Name is required',
        'username.required' => 'User Name is required',
         'email.required' => 'Email is required',
        'passwoed.required' => 'Password is required',
    ];
}

}
