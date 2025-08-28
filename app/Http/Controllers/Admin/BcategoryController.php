<?php

namespace App\Http\Controllers\Admin;


use App\Models\Blog;
use App\Models\Bcategory;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BcategoryController extends Controller
{
    public function bcategory(Request $request)
    {
        $bcategories = Bcategory::orderBy('id', 'desc')->get();
        return view('admin.blog.blog-category.index', compact('bcategories'));
    }

    // Add Blog Category
    public function add()
    {
        return view('admin.blog.blog-category.add');
    }

    // Store Blog Category
    public function store(Request $request)
    {
        $slug = Helper::make_slug ($request->name);
        $blogs = Bcategory::select('slug')->get();
        $request->validate([
            'name' => [
                'required',
                
                'max:150',
                function ($attribute, $value, $fail) use ($slug, $blogs) {
                    foreach ($blogs as $blog) {
                        if ($blog->slug == $slug) {
                            return $fail('Title already taken!');
                        }
                    }
                }
            ],
            'name' => 'required|max:255',
            
            'status' => 'required',
            'serial_number' => 'required|numeric',
        ]);
        $bcategory = new Bcategory();
        $bcategory->name = $request->name;
        $bcategory->slug = $slug;
        $bcategory->status = $request->status;
        $bcategory->serial_number = $request->serial_number;
        $bcategory->save();
        $notification = array(
            'message' => 'Blog Category Added successfully!',
            'alert' => 'success'
        );
        return redirect()->route('admin.bcategory.index')->with('notification', $notification);
    }


    // Blog Category Delete
    public function delete($id)
    {

        $bcategory = Bcategory::find($id);
        $blogs = Blog::where('bcategory_id', $id)->get();

        if ($blogs->count() >= 1) {
            $notification = array(
                'message' => 'First Delete Blogs Under This Category !',
                'alert' => 'warning'
            );
            return redirect()->back()->with('notification', $notification);
        }

        $bcategory->delete();


        $notification = array(
            'message' => 'Blog Category Deleted successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }

    // Blog Category Edit
    public function edit($id)
    {
        $bcategory = Bcategory::find($id);
        return view('admin.blog.blog-category.edit', compact('bcategory'));
    }

    // Blog Skill Category
    public function update(Request $request, $id)
    {
        $slug = Helper::make_slug($request->name);
        $bcategories = Bcategory::select('slug')->get();
        $bcategory = Bcategory::findOrFail($id);
        $request->validate([
            'name' => [
                'required',
               
                'max:150',
                function ($attribute, $value, $fail) use ($slug, $bcategories, $bcategory) {
                    foreach ($bcategories as $serv) {
                        if ($bcategory->slug != $slug) {
                            if ($serv->slug == $slug) {
                                return $fail('Title already taken!');
                            }
                        }
                    }
                },
                'unique:bcategories,name,' . $id
            ],
            'status' => 'required',
            'serial_number' => 'required|numeric',
        ]);
        $bcategory = Bcategory::find($id);
        $bcategory->name = $request->name;
        $bcategory->status = $request->status;
        $bcategory->slug = $slug;
        $bcategory->serial_number = $request->serial_number;
        $bcategory->save();

        $notification = array(
            'message' => 'Blog Category Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.bcategory.index'))->with('notification', $notification);
    }
}
