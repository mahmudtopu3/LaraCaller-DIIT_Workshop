<?php
  
namespace App\Http\Controllers;
  

use App\Repositories\TestRepository2;
use App\Repositories\TestRepository1;
use Illuminate\Http\Request;



class TestController extends Controller
{

    protected $test;

    /*
      Here you can switch repository anytime without affecting the functionality of the controller !
      Just chnage the classname of constructor's parameter
    */
    public function __construct(TestRepository2 $test)
    {
        $this->test = $test;
    }
   
    public function index()
    {
        $Tests = $this->test->all();
    
        return view('index',compact('Tests'));
    }


   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'number' => 'required|max:20',
            'email' => 'email',
        ]);
  
        $this->test->store($request->all());

        return redirect()->route('test.index')
                        ->with('success','Test created successfully.');

    }
   
   

  
    public function edit($id)
    {
        $Test = $this->test->get($id);
        return view('edit',compact('Test'));
    }
  
   
    public function update(Request $request, $id)
    {

       
        if($request->email!=""){
            $request->validate([
                'name' => 'required',
                'number' => 'required|max:20',
                'email' => 'email',
            ]);
        }
        else {
            $request->validate([
                'name' => 'required',
                'number' => 'required|max:20',
                
            ]);
        }
  
        $this->test->update($id,$request->all());

        return redirect()->route('test.index')
                        ->with('success','Test updated successfully');
        
    }
  
    
    public function destroy($id)
    {
        $this->test->delete($id);

        return redirect()->route('test.index')
        ->with('success','Test deleted successfully');
   
    }
}