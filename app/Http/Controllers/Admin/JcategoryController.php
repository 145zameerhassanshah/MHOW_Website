<?php

namespace App\Http\Controllers\Admin;

use App\Models\Jcategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JcategoryController extends Controller
{

    public function jcategory (Request $request){

        $jcategories  = Jcategory::orderBy('serial_number', 'asc')->get();
        return view('admin.job.job-category.index', compact('jcategories'));
    }


    public function add(){

        return view('admin.job.job-category.add');
    }


    public function store(Request $request){

        $request->validate([
            'name' => 'required|unique:jcategories|max:150',
            'status' => 'required',
        ]);

        $jcategory = new Jcategory();

        $jcategory->name = $request->name;
        $jcategory->slug = Str::slug($request->name, "-");
        $jcategory->status = $request->status;

        $jcategory->save();

        
        $notification = array(
            'message' => 'Job Category Added successfully!',
            'alert' => 'success'
        );
        return redirect()->route('admin.jcategory.index')->with('notification', $notification);

    }


    public function delete($id){

        $jcategory = Jcategory::findOrFail($id);

        if($jcategory->jobs->count() > 0){
            $notification = array(
                'message' => 'First Delete Jobs Under This Category !',
                'alert' => 'warning'
            );
            return redirect()->back()->with('notification', $notification);
        }

        $jcategory->delete();

        $notification = array(
            'message' => 'Job Category Deleted successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }


    public function edit($id){

        $jcategory = jcategory::find($id);
        return view('admin.job.job-category.edit', compact('jcategory'));

    }

    public function update(Request $request, $id){

        $id = $request->id;
        $request->validate([
            'name' => 'required|unique:jcategories,name,'.$id,
            'status' => 'required',
        ]);

        $jcategory = Jcategory::find($id);
        $jcategory->name = $request->name;
        $jcategory->slug = Str::slug($request->name, "-");
        $jcategory->status = $request->status;

        $jcategory->save();

        $notification = array(
            'message' => 'Job Category Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.jcategory.index'))->with('notification', $notification);
    }
}
