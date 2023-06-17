<?php

namespace App\Http\Controllers;

use App\Models\MasterData;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Validator;

class UserDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function __construct()
    {
        // $this->middleware('guest');
    }



    public function index()
    {
        $user_data = User::with('role')->where('role_id','1')->get();
        return view('admin.user-data.user', compact('user_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.user-data.view',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|numeric|min:10|unique:users',
            'password' => 'required|string|min:8',
            'status' =>'required',
        ]);

        $data = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'status' => ($request['status'] == 'on') ? '1':'0',
            'role_id' => '2',
            'password' => Hash::make($request['password']),
        ]);
        // $masterData = MasterData::create([
        //     'user_id' => $data->id,
        //     'name' => $request['name'],
        // ]);
        return redirect('admin/user-data')->with('success', 'Registration completed successfully');
        // return redirect('/user-data')->withErrors(['msg' => 'The Message']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            // 'slug' => 'required|string|unique:users',
            'email' => 'required|string|email|max:255',
            'phone' => 'required',
        ]);
        
        $find = User::find($id);
        $find->slug = $request['slug'];
        $find->email = $request['email'];
        $find->phone = $request['phone'];
        $find->status = ($request['status'] == 'on') ? '1':'0';
        if (!empty($request['password'])) {
            $find->password = Hash::make($request['password']);
        }
        if ($find->save()) {
            return redirect('admin/user-data')->with('success', 'Record Update');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $get_data = User::find($id);
        $roles = Role::all();
        return view('admin.user-data.view', compact('get_data','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        echo "update".$id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return redirect('admin/user-data')->with('destroy', 'Record deleted!');
        $post = User::find($id);
        if($post->delete())
        {
            return redirect('admin/user-data')->with('destroy', 'Record deleted!');
        }
    }

    public function AddDetails($id)
    {
        return view('admin.user-data.add_new');
    }

    public function changeStatusFun(Request $request)
    {
        echo "Hello";
        die;
    }
}
