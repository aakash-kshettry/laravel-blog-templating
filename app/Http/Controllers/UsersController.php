<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $users = $this->model->all();
        return view('backend.user-table', compact('users'));
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function create()
    {
        return view('backend.user-form');
    }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:255|min:4',
            'email'=>'required|email|max:255|unique:users,email',
            'password'=>'required|min:4|max:255'
        ]);
        $data = $request->all();
        //dd($data);
        $this->model->create($data);
        return redirect()->route('user.index');
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function show($id)
    {
        //
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function edit($id)
    {
        $data = $this->model->find($id);
        return view('backend.user-form', compact('data'));
    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|max:255|min:4',
            'password'=>'required|min:4|max:255',
            'email'=>'required|max:255|min:4|unique:users,email,'.$id
        ]);
        $data = $this->model->find($id);
        //$data->category_id = 1;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->password=$request->password;
        $data->role=$request->role;
        //dd($data);
        $data->update();
        return redirect()->route('user.index');
    }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function destroy($id)
    {
        $data = $this->model->find($id);
        if ($data) {
            $data->delete();
            return redirect()->route('user.index');
        }
    }
}
