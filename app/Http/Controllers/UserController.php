<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Log;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','show']]);
         $this->middleware('permission:user-create', ['only' => ['create','store']]);
         $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

     /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->where('status', 0)->paginate(5);
    
        return view('users.index',compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

     /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('users.create',compact('roles'));
    }

     /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:30', 'unique:'.User::class],
            'password'  => ['required', 'string', 'min:8','max:20'],
            'roles'      => ['required'],
        ]);
  
        $input = $request->all();
  
        $input['password'] = Hash::make($request->password);
    
        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        Log::create(['name' => 'Created the user '.$request->email, 'user' => Auth::id()]);
     
        return redirect()->route('users.show',$user->id)
                        ->with('success','user created successfully!');
    }

     /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        if($user->status == 1){
            return redirect()->route('users.index')->with('warning','user has been deleted!');
        }
        return view('users.show',compact('user'));
    }

     /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        if($user->status == 1){
            return redirect()->route('users.index')->with('warning','user has been deleted!');
        }
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('users.edit',compact('user','roles','userRole'));
    }

     /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
        $request->validate([
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:30'],
            'password'  => ['string', 'min:8','max:20'],
            'roles'     => ['required'],
        ]);
  
        $input = $request->all();

        if($request->new_password){ 
            $input['password'] = Hash::make($request->new_password);
        }else{
            $input = Arr::except($input,array('password'));    
        }
          
        $user->update($input);

        DB::table('model_has_roles')->where('model_id',$user->id)->delete();
    
        $user->assignRole($request->input('roles'));

        Log::create(['name' => 'Updated the user '.$request->email, 'user' => Auth::id()]);
    
        return redirect()->route('users.show',$user->id)
                        ->with('info','user updated successfully!');
    }

     /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        $input['status'] = 1;
        $input['password'] = "this user has been deleted";
        $user->update($input);
        Log::create(['name' => 'Deleted the user '.$user->email, 'user' => Auth::id()]);
     
        return redirect()->route('users.index')
                        ->with('danger','user deleted successfully!');
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
