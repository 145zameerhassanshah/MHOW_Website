<?php

namespace App\Http\Controllers\Admin;

use App\Models\Job;
use App\Models\Language;
use App\Models\Jcategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class JobController extends Controller
{


    public function jobs(Request $request){
        $data['jobs'] = Job::orderBy('serial_number', 'asc')->get();
        return view('admin.job.index',$data);
    }

    public function add(){
        $jcategories = Jcategory::where('status', 1)->get();
        return view('admin.job.add', compact('jcategories'));
    }

    public function store(Request $request){

        $request->validate([
            'title' => 'required|string|unique:job_applications',
            'position' => 'required|string|max:191',
            'company_name' => 'required|string|max:191',
            'jcategory_id' => 'required',
            'vacancy' => 'required|string|max:191',
            'job_responsibility' => 'required|string',
            'employment_status' => 'required|string',
            'education_requirement' => 'nullable|string',
            'job_context' => 'nullable|string',
            'experience_requirement' => 'nullable|string',
            'additional_requirement' => 'nullable|string',
            'job_location' => 'required|string',
            'salary' => 'required|string',
            'other_benefits' => 'nullable|string',
            'email' => 'nullable|string|max:191',
            'deadline' => 'required|max:191',
            'serial_number' => 'nullable|max:191',
            'meta_tags' => 'nullable|string|max:191',
            'meta_description' => 'nullable|string|max:191',
        ]);


        $job = new job();

        $job->title = $request->title;
        $job->status = $request->status;
        $job->position = $request->position;
        $job->company_name = $request->company_name;
        $job->vacancy = $request->vacancy;
        
        $job->job_responsibility = $request->job_responsibility;
        $job->employment_status = $request->employment_status;
        $job->education_requirement = $request->education_requirement;
        $job->job_context = $request->job_context;
        $job->experience_requirement = $request->experience_requirement;
        $job->additional_requirement = $request->additional_requirement;
        $job->job_location = $request->job_location;
        $job->salary = $request->salary;
        $job->other_benefits = $request->other_benefits;
        $job->slug = Str::slug($request->title, "-");
       
        $job->jcategory_id = $request->jcategory_id;
        $job->email = $request->email;
       
        $job->deadline = $request->deadline;
        $job->serial_number = $request->serial_number;
      
        $job->meta_tags = $request->meta_tags;
        $job->meta_description = $request->meta_description;
       
        $job->save();

        $notification = array(
            'message' => 'Job Added successfully!',
            'alert' => 'success'
        );
        return redirect()->route('admin.job.index')->with('notification', $notification);
    }

    public function delete($id){

        $job = Job::findOrFail($id);
        $job->delete();

        $notification = array(
            'message' => 'Job Deleted successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }

    public function edit($id){
        $job = Job::findOrFail($id);
        $jcategories = Jcategory::where('status', 1)->get();

        return view('admin.job.edit', compact('jcategories', 'job'));
    }

    public function update(Request $request, $id){

        $job = Job::findOrFail($request->id);

        $request->validate([
            'title' => 'required|string|unique:job_applications,id,'.$id,
            'position' => 'required|string|max:191',
            'company_name' => 'required|string|max:191',
            'jcategory_id' => 'required',
            'vacancy' => 'required|string|max:191',
            'job_responsibility' => 'required|string',
            'employment_status' => 'required|string',
            'education_requirement' => 'nullable|string',
            'job_context' => 'nullable|string',
            'experience_requirement' => 'nullable|string',
            'additional_requirement' => 'nullable|string',
            'job_location' => 'required|string',
            'salary' => 'required|string',
            'other_benefits' => 'nullable|string',
            'email' => 'nullable|string|max:191',
            'deadline' => 'required|string|max:191',
            'serial_number' => 'nullable',
            'meta_tags' => 'nullable|string|max:191',
            'meta_description' => 'nullable|string|max:191',
        ]);

        $job->title = $request->title;
        $job->status = $request->status;
        $job->position = $request->position;
        $job->company_name = $request->company_name;
        $job->vacancy = $request->vacancy;
        $job->job_responsibility = $request->job_responsibility;
        $job->employment_status = $request->employment_status;
        $job->education_requirement = $request->education_requirement;
        $job->job_context = $request->job_context;
        $job->experience_requirement = $request->experience_requirement;
        $job->additional_requirement = $request->additional_requirement;
        $job->job_location = $request->job_location;
        $job->salary = $request->salary;
        $job->other_benefits = $request->other_benefits;
        $job->slug = Str::slug($request->title, "-");
        $job->jcategory_id = $request->jcategory_id;
        $job->email = $request->email;
        $job->deadline = $request->deadline;
        $job->serial_number = $request->serial_number;
        $job->meta_tags = $request->meta_tags;
        $job->meta_description = $request->meta_description;

        $job->update();


        $notification = array(
            'message' => 'Job Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.job.index'))->with('notification', $notification);
    }
}
