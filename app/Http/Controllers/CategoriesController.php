<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Category $category)
    {
        $this->model = $category;
    }
    public function index()
    {
        
        $categories = $this->model->all();
        //dd($category);
        return view('backend.category-table', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:255|min:4|unique:posts,title,',
            'description'=>'required|max:255|min:4',
            'status'=>'required|boolean'
        ]);
        $data = $request->all();
        //dd($data);
        $this->model->create($data);
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->model->find($id);
        return view('backend.category-form', compact('data'));
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
        $request->validate([
            'name'=>'required|max:255|min:4|unique:posts,title,'.$id,
            'description'=>'required|max:255|min:4',
            'status'=>'required|boolean'
        ]);
        $data = $this->model->find($id);
        //$data->category_id = 1;
        $data->name=$request->name;
        $data->description=$request->description;
        $data->status=$request->status;
        //dd($data);
        $data->update();
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->model->find($id);
        if ($data) {
            $data->delete();
            return redirect()->route('category.index');
        }
    }
}
