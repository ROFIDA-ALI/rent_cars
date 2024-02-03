<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse; 
use App\Traits\Common;
use App\Models\Category ;
use App\Models\Car ;
use App\Models\Contact ;
use App\Models\User ;


class CarController extends Controller
{
    use Common; 
    private $columns = [
        'carTitle' ,'price','shortdescription', 'description','active','luggage','doors','passenger', 'image','category_id'];
    /**
     * Display a listing of the resource.
     */
    public function index()   //admin table cars
    {
        $cars = Car :: get(); 
        $unreadMessageCount = Contact::where ('read_status','0')->count();

        return view('admin.cars', compact ('cars','unreadMessageCount'));
    }
    public function create()
    {
        $categories = Category ::select('id','categoryName')->get();
        $unreadMessageCount = Contact::where ('read_status','0')->count();

        return view('admin.addCar', compact('categories','unreadMessageCount'));  //blade name

    }
    /**
     * Show the form for creating a new resource.
     */
    public function listings()       
    {
        $cars = Car::paginate(6); // Show 10 cars per page

        // $cars = Car :: get(); 
        return view('web.listings', compact ('cars'));
    }
   
    public function single(string $id)
    {
        $cars = Car::findOrFail($id);
        $categories = Category::withCount('cars')->get();
        return view('web.single', compact ('cars','categories' ));

       }
    /**
     * Store a newly created resource in storage.
     * 
     */
    public function store(Request $request)
    {

        $messages=$this->messages();
        $data = $request->validate ([
            'carTitle'=>'required |string',
             'description' => 'required |string',
             'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
             'price'=>'required |string',
             'shortdescription'=>'required |string',
             'luggage'=>'required |string',
             'doors'=>'required |string',
             'passenger'=>'required |string',
         ], $messages);
         $fileName = $this->uploadFile( $request->image, 'assets/images');
        $data['image']=$fileName;
        $data['category_id']=$request->category_id;
        $data['active'] = isset($request['active']); 
        Car::create($data);
        // return 'done';
        return redirect()->route('cars');


    
//      
    }
    public function messages(){
        return [ 'carTitle.required' => 'Title is required', 
        'description.required' => 'should be text',
        'image.required' => 'should be png,jpg,jpeg|max:2048',
        'price.required' => 'should be number',
        'luggage.required' => 'should be number',
        'doors.required' => 'should be number',
        'passenger.required' => 'should be number',
        'shortdescription.required' => 'should be text,max 100 char.',
    ];
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
        $categories = Category ::select('id','categoryName')->get();
        $car = Car::findOrFail($id);
        $unreadMessageCount = Contact::where ('read_status','0')->count();

        return view('admin.editcar', compact ('car', 'categories','unreadMessageCount'));    
     }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

   
    $messages=$this ->messages();

$data =$request->validate ([
    'carTitle'=>'required |string',
    'description' => 'required |string',
    'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
    'price'=>'required |string',
    'shortdescription'=>'required |string',
    'luggage'=>'required |string',
    'doors'=>'required |string',
    'passenger'=>'required |string',
], $messages);
if ($request ->hasFile('image')){
$fileName = $this->uploadFile( $request->image, 'assets/images');
$data['image']=$fileName;}
$data['category_id']=$request->category_id;
$data['active'] = isset($request['active']); 

            Car::where('id', $id)->update($data);

            return redirect()->route('cars');
    }
    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     Car :: where('id', $id)->delete();

    //     return redirect()->route('cars');
    //     }
        public function delete(string $id): RedirectResponse
        {
            
         Car :: where('id', $id)->forceDelete();
    
         return redirect()->route('cars');   
         }


}
