<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class PostsController extends Controller
{
    
    public function __construct(Post $post)
    {
        $this->model = $post;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->model->all();
        return view('backend.post-table', compact('posts'));
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function create()
    {
        $categories=Category::all();
        $users = User::all();
        return view('backend.post-form', compact('categories', 'users'));
    }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    public function store(Request $request)
    {
        $data = $request->all();
        //dd($data);
        $this->model->create($data);
        return redirect()->route('post.index');
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
        $categories = Category::all();
        $users=User::all();
        $data = $this->model->find($id);
        return view('backend.post-form', compact('data', 'categories', 'users'));
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
        // $category = Category::where('id', $id)->first();
        // $category->name = $request ->name;
        // $category->description = $request->description ;
        // $category->status = $request->status;
        // $category->save();
        // return redirect('/admin/categories');
        $data = $this->model->find($id);
        //$data->category_id = 1;
        $data->title=$request->title;
        $data->slug=$request->slug;
        $data->summary=$request->summary;
        $data->description=$request->description;
        $data->status=$request->status;
        $data->category_id=$request->category_id;
        $data->author_id=$request->author_id;
        //dd($data);
        $data->update();
        return redirect()->route('post.index');

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
            return redirect()->route('post.index');
        }
    }
}
