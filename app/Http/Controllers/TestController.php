<?php
  
namespace App\Http\Controllers;
  
use App\Test;
use Illuminate\Http\Request;
  
class TestController extends Controller
{
   
    public function index()
    {
        $Tests = Test::get();
  
        return view('index',compact('Tests'));
    }

    public function index2()
    {
        $Tests = Test::latest()->paginate(5);
  
        return view('index',compact('Tests'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
   
    public function create()
    {
        return view('create');
    }
  
   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'number' => 'required|max:20',
            'email' => 'email',
        ]);
  
        Test::create($request->all());
   
        return redirect()->route('test.index')
                        ->with('success','Test created successfully.');
    }
   
   
    public function show(Test $Test)
    {
        dd($test);
        // return view('show',compact('Test'));
    }
  
    public function edit(Test $Test)
    {
        return view('edit',compact('Test'));
    }
  
   
    public function update(Request $request, Test $Test)
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
        
  
        $Test->update($request->all());
  
        return redirect()->route('test.index')
                        ->with('success','Test updated successfully');
    }
  
    
    public function destroy(Test $Test)
    {
        $Test->delete();
  
        return redirect()->route('test.index')
                        ->with('success','Test deleted successfully');
    }
}