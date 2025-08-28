<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use App\Models\Gcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GcategoryController extends Controller
{
    public function gcategory()
    {

        $gcategories = Gcategory::orderBy('serial_number', 'asc')->get();

        return view('admin.gallery.gallery-category.index', compact('gcategories'));
    }

    // Add Blog Category
    public function add()
    {
        return view('admin.gallery.gallery-category.add');
    }

    // Store Blog Category
    public function store(Request $request)
    {
       
        $request->validate([
            'name' => [
                'required',
                'unique:gcategories,name',
                'max:150',
            ],
            'status' => 'required',
            'serial_number' => 'required|numeric',
        ]);

        $bcategory = new Gcategory();

        $bcategory->name = $request->name;
        $bcategory->status = $request->status;
        $bcategory->serial_number = $request->serial_number;
        $bcategory->save();


        $notification = array(
            'message' => 'Gallery Category Added successfully!',
            'alert' => 'success'
        );
        return redirect()->route('admin.gcategory.index')->with('notification', $notification);
    }

    // Blog Category Delete
    public function delete($id)
    {

        $bcategory = Gcategory::find($id);
        $blogs = Gallery::where('category_id', $id)->get();
     
        if($blogs->count() >= 1){
            $notification = array(
                'message' => 'First Delete Galleries Under This Category !',
                'alert' => 'warning'
            );
            return redirect()->back()->with('notification', $notification);
        }
        
        $bcategory->delete();


        $notification = array(
            'message' => 'Gallery Category Deleted successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);

    }

    // Blog Category Edit
    public function edit($id)
    {

        $gcategory = Gcategory::find($id);
        return view('admin.gallery.gallery-category.edit', compact('gcategory'));
    }

    // Blog Skill Category
    public function update(Request $request, $id)
    {
     
   
        $bcategory = Gcategory::findOrFail($id);

        $request->validate([
            'name' => [
                'required',
                'max:150',
                'unique:gcategories,name,'.$id
            ],
            'status' => 'required',
            'serial_number' => 'required|numeric',
        ]);

    
        $bcategory->name = $request->name;
        $bcategory->status = $request->status;
        $bcategory->serial_number = $request->serial_number;
        $bcategory->save();

        $notification = array(
            'message' => 'Gallery Category Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.gcategory.index'))->with('notification', $notification);
    }
}
