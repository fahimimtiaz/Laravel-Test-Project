<?php

namespace App\Http\Controllers;

use App\Catagory;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
//use Yajra\DataTables\Facades\DataTables; 


use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // public function index()
    // {
    //     $category = Catagory::all();

    //     return view('Catagory.indexCategory', compact('category'));
    // }
    

    public function indexData(Request $request)
    {
        return view('Catagory.indexCategory');
        //return view('data-table');
    }

    public function indexDataTable(Request $request)
    {
        $data = Catagory::Select('id', 'name')->get();

        //$data = Catagory::Select('id', 'name')->latest()->get();
        //dd($data);
        return ($data);
        return DataTables::of($data)->make(true);
    }


    public function create()
    {
        return view('Catagory.createCategory');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',

        ]);
        Catagory::create($request->all());



        return redirect()->route('indexCategory')
            ->with('success', 'Category Created Successfully');
    }

    public function storeCat(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',

        ]);

        $cat = new Catagory();
        $cat->name = $request->input('name');
        $cat->save();

        return $cat;
    }

    public function show($id)
    {
    }


    public function edit($id)
    {
        $cat = Catagory::find($id);
        return view('indexCategoy', compact('cat'));
    }


    public function update(Request $request, $id)
    {
        $cat = Catagory::find($id);
        $cat->name = $request->input('name');
        $cat->Save();

        return $cat;
    }

    public function delete($id)
    {
        $data = Catagory::find($id);
        $category = Catagory::find($id)->delete();

        return redirect()->route('indexCategory')
            ->with('success', 'Category deleted Successfully');
    }
}
