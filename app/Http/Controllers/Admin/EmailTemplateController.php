<?php

namespace App\Http\Controllers\Admin;

use App\Models\EmailTemplate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\EmailAttachment;
use App\Http\Helpers\FileHelper;

class EmailTemplateController extends Controller
{
    public function index()
    {
        $templates = EmailTemplate::all();
        return view('admin.email-templates.index', compact('templates'));
    }

    public function add()
    {
        return view('admin.email-templates.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
            'status' => 'required|in:draft,active',
        ]);

        EmailTemplate::create([
            'title' => $request->title,
            'subject' => $request->subject,
            'body' => $request->body,
            'status' => $request->status,
            'created_by' => Auth::id(),
        ]);

        return redirect()->route('admin.email-templates.index')->with('success', 'Template created successfully.');
    }

    public function edit($id)
    {
        $template = EmailTemplate::findOrFail($id);
        return view('admin.email-templates.edit', compact('template'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
            'status' => 'required|in:draft,active',
        ]);

        $template = EmailTemplate::findOrFail($id);
        $template->update([
            'title' => $request->title,
            'subject' => $request->subject,
            'body' => $request->body,
            'status' => $request->status,
            'updated_by' => Auth::id(),
        ]);

        return redirect()->route('admin.email-templates.index')->with('success', 'Template updated successfully.');
    }

    public function destroy($id)
    {
        $template = EmailTemplate::findOrFail($id);
        $template->deleted_by = auth()->id();
        $template->save();

        $template->delete();

        return redirect()->route('admin.email-templates.index')->with('success', 'Email template deleted successfully.');
    }

    public function restorePage()
    {
        $templates = EmailTemplate::onlyTrashed()->get();
        return view('admin.email-templates.restore', compact('templates'));
    }

    public function restore($id)
    {
        $template = EmailTemplate::onlyTrashed()->findOrFail($id);
        $template->restore();

        return redirect()->route('admin.email-templates.restore-page')->with('success', 'Email Template restored successfully.');
    }

    public function show($id)
    {
        $template = EmailTemplate::with('attachments')->findOrFail($id);
        return view('admin.email-templates.show', compact('template'));
    }
    public function uploadAttachment(Request $request)
{
    // Validate inputs
    $request->validate([
        'template_id' => 'required|exists:email_templates,id',
        'file_name'   => 'required|string|max:255',
        'file_path'   => 'required|file|mimes:jpg,jpeg,png,pdf,docx,zip|max:10240',
    ]);

    try {
        $templateId   = $request->input('template_id');
        $uploadedFile = $request->file('file_path');

        $storedPath = FileHelper::upload($uploadedFile, 'assets/uploads/emails/attachments');


        $emailAttachment = new EmailAttachment();
        $emailAttachment->template_id = $templateId;
        $emailAttachment->file_name   = $request->file_name;
        $emailAttachment->file_path   = $storedPath;
        $emailAttachment->file_type   = 'pdf';
        $emailAttachment->save();

        return redirect()->back()->with([
            'notification' => [
                'message' => 'Attachment uploaded successfully!',
                'alert'   => 'success',
            ],
        ]);
    } catch (\Exception $e) {
        \Log::error('Attachment Upload Error', ['error' => $e]);

        return redirect()->back()->with([
            'notification' => [
                'message' => 'Something went wrong while uploading attachment!',
                'alert'   => 'error',
            ],
        ]);
    }
}



}
