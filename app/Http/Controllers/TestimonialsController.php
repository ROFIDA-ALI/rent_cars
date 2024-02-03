<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Traits\Common;
use Illuminate\Http\RedirectResponse;
use App\Models\Category ;
use App\Models\Contact;
use App\Models\Car ;
use App\Models\User ;
class TestimonialsController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial:: get(); 
        $unreadMessageCount = Contact::where ('read_status','0')->count();

        return view('admin.testimonialtable', compact ('testimonials','unreadMessageCount')); 
    }

    public function testimonials()       
    {
        $testimonials = Testimonial:: get();
        return view('web.testimonials', compact ('testimonials'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unreadMessageCount = Contact::where ('read_status','0')->count();

        return view('admin.addTestimonials', compact ('unreadMessageCount'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $messages=$this->messages();
        $data = $request->validate ([
            'testimonialName'=>'required|string',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
            'review'=>'required|string',
            'position'=>'required|string',
            
        ], $messages);
       
            $fileName = $this->uploadFile( $request->image, 'assets/images');
            $data['image']=$fileName;
            $data['published'] = isset($request['published']); 
            Testimonial::create($data);
            return redirect()->route('testimonialtable');

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
        $testimonial = Testimonial::findOrFail($id);
        $unreadMessageCount = Contact::where ('read_status','0')->count();

        return view('admin.editTestimonial', compact ('testimonial','unreadMessageCount'));  
       }
    

    /**
     * Update the specified resource in storage.
*/
    public function update(Request $request, string $id)
    {
        $messages=$this->messages();

        $data =$request->validate ([
            'testimonialName'=>'required|string',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
            'review'=>'required|string',
            'position'=>'required|string',
            
        ], $messages);
        if ($request ->hasFile('image')){
            $fileName = $this->uploadFile( $request->image, 'assets/images');
            $data['image']=$fileName;}
            $data['published'] = isset($request['published']); 
            Testimonial::where('id', $id)->update($data);
            return redirect()->route('testimonialtable');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id): RedirectResponse
    {
        
        Testimonial :: where('id', $id)->forceDelete();

        return redirect()->route('testimonialtable');
    }

    public function messages(){
        return [ 'testimonialName.required' => 'Title is required',
         'image.required' => 'should be png,jpg,jpeg|max:2048',
         'review.required' => 'should be text',
        'position.required' => 'position is required',
    ];
}
}
