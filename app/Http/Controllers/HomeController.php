<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse; 
use App\Traits\Common;
use App\Models\Car ;
use App\Models\Testimonial;
use App\Models\Contact;
use App\Models\User ;
use App\Models\Category ;
use App\Mail\ContactMail;
use Mail;
class HomeController extends Controller
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
    
    public function weblistings()    // home web
    { 
        $cars = Car::latest()
        ->orderBY('created_at','desc')
        ->take(6)
        ->get();
        $testimonials = Testimonial::latest()
        ->orderBY('created_at','desc')
        ->take(3)
        ->get();
        return view('web.index', compact ('cars','testimonials'));     
    
    }
    /**
     * Show the form for creating a new resource.
     */


    //  public function webtestimonials()    // home web
    // { 
    //     $testimonials = Testimonial::latest()
    //     ->orderBY('created_at','desc')
    //     ->take(3)
    //     ->get();
    //     return view('web.index', compact ('testimonials'));     
    
    // } 
   
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
