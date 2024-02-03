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
class ContactController extends Controller
{
    use Common; 

    /**
     * Display a listing of the resource.
     */
    public function index()
    
       
        {
            $contacts = Contact:: get(); 
            $unreadMessageCount = Contact::where ('read_status','0')->count();

            return view('admin.ContactMessages', compact ('contacts','unreadMessageCount')); 
        } 
       
   
    

    public function contact_mail(Request $request) //send
    {
        // dd($request->all());
        $messages=$this->messages();
        $data = $request->validate ([
            'name'=>'required|string',
            'lastname' => 'required|string',
            'email'=>'required|string',
            'message'=>'required|string',
            
        ], $messages);
       Contact::create($data);
       Mail::to('rofidaali44@gmail.com')->send(new ContactMail($request));
       return "Your message is sent Successfully";
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('web.contact');
    }

    /**
   


    

    
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contacts = Contact::findOrFail($id);
        $unreadMessageCount = Contact::where ('read_status','0')->count();

        return view('admin.showMessage', compact ('contacts','unreadMessageCount')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id): RedirectResponse
    {
        
        Contact :: where('id', $id)->forceDelete();

        return redirect()->route('ContactMessages');
    }

    public function messages(){
        return [ 'name.required' => 'Name is required',
         'lastname.required' => 'should be text',
         'email.required' => 'Email is required',
        'message.required' => 'message is required',
    ];
}
}
