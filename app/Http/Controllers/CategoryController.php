<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse; 
use App\Traits\Common;
use App\Models\Category ;
use App\Models\Car ;
use App\Models\Contact ;
use App\Models\User ;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category :: get(); 
        $unreadMessageCount = Contact::where ('read_status','0')->count();

        return view('admin.categories',  compact ('categories','unreadMessageCount'));  
      }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unreadMessageCount = Contact::where ('read_status','0')->count();

        return view('admin.addCategory',compact ('unreadMessageCount'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages=$this->messages();
        $data = $request->validate ([
            'categoryName'=>'required |string',
        ], $messages);
        Category::create($data);
        return redirect()->route('categories');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categories = Category :: get(); 
        return view('web.single',  compact ('categories'));  
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id); 
        $unreadMessageCount = Contact::where ('read_status','0')->count();

        return view('admin.editcategory', compact ('category','unreadMessageCount'));   
      }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages=$this ->messages();

        $data =$request->validate ([  
            'categoryName'=>'required |string',
        ], $messages);
        Category::where('id', $id)->update($data);

        return redirect()->route('categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function delete(string $id): RedirectResponse
    //     {
            
    //         Category :: where('id', $id)->forceDelete();
    
    //      return redirect()->route('categories');   
    //      }
         public function delete(Category $category ,string $id )
         {
             if ($category->cars()->exists()) {
                return back()->withErrors(['message' => 'Cannot delete category with associated products.'])->withInput();
               

             } else {
                Category :: where('id', $id)->forceDelete();
                return redirect()->route('categories');
             }
         }
         



public function messages(){
    return [ 'categoryName.required' => 'categoryName is required',

];
}






}