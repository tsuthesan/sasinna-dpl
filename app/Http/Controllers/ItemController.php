<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Item;
use App\Models\Log;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:item-list|item-create|item-edit|item-delete', ['only' => ['index','show']]);
         $this->middleware('permission:item-create', ['only' => ['create','store']]);
         $this->middleware('permission:item-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:item-delete', ['only' => ['destroy']]);
    }

     /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::latest()->where('status', 0)->paginate(5);
    
        return view('items.index',compact('items'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

     /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_groups = DB::table('attribute_values')
                        ->where('atb_id', 1)
                        ->get();
        return view('items.create',compact('product_groups'));
    }

     /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'code'          => ['required', 'string', 'max:30', 'unique:'.Item::class],
            'name'          => ['required', 'string', 'max:255'],
            'description'   => ['required', 'string', 'max:255'],
        ]);
  
        $input = $request->all();

        $item = Item::create($input);

        Log::create(['name' => 'Created the item '.$request->code, 'user' => Auth::id()]);
     
        return redirect()->route('items.show',$item->id)
                        ->with('success','item created successfully!');
    }

     /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(item $item)
    {
        if($item->status == 1){
            return redirect()->route('items.index')->with('warning','item has been deleted!');
        }
        return view('items.show',compact('item'));
    }

     /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(item $item)
    {
        if($item->status == 1){
            return redirect()->route('items.index')->with('warning','item has been deleted!');
        }
        return view('items.edit',compact('item'));
    }

     /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, item $item)
    {
        $request->validate([
            'name'          => ['required', 'string', 'max:255'],
            'description'   => ['required', 'string', 'max:255']
        ]);

        if($request->code != $item->code){ 
            $request->validate([
                'code'          => ['required', 'string', 'max:30', 'unique:'.Item::class]
            ]);
        }
  
        $input = $request->all();
          
        $item->update($input);

        Log::create(['name' => 'Updated the item '.$request->code, 'user' => Auth::id()]);
    
        return redirect()->route('items.show',$item->id)
                        ->with('info','item      updated successfully!');
    }

     /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(item $item)
    {
        $input['status'] = 1;
        $item->update($input);
        Log::create(['name' => 'Deleted the item '.$item->code, 'user' => Auth::id()]);
     
        return redirect()->route('items.index')
                        ->with('danger','item deleted successfully!');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $users = User::query()
                     ->where('status', 0)
                     ->where('name', 'LIKE', "%{$search}%")
                     ->orWhere('email', 'LIKE', "%{$search}%")
                     ->paginate(5);
    
        return view('users.index',compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
