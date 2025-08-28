<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Element;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Models\ElementFeature;

class ElementController extends Controller
{
    public function index($slug)
    {
        $page = Page::where('slug', $slug)->first();
        $elements = Element::where('page_id', $page->id)->get();

        return view('admin.page.partials.element_list', compact('elements', 'slug'));
    }

    public function add($slug)
    {
        return view('admin.page.partials.element_add', compact('slug'));
    }

    public function store(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
            'features.*.title' => 'nullable|string',
            'features.*.description' => 'nullable|string',
            'features.*.order' => 'nullable|integer',
        ]);

        $page = Page::where('slug', $slug)->first();
        $element = new Element();
        $element->element_name = "test"; // Consider dynamic or removal

        // Direct assignment, no translations
        $element->title = $request->input('title');
        $element->subtitle = $request->input('subtitle');
        $element->description = $request->input('description');
        $element->page_id = $page->id;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/admin/uploads/element/thumb/'), $imageName);
            $element->image = 'assets/admin/uploads/element/thumb/' . $imageName;
        }

        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $iconName = time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/admin/uploads/element/icons/'), $iconName);
            $element->icon = 'assets/admin/uploads/element/icons/' . $iconName;
        }

        $element->save();

        if ($request->has('features')) {
            foreach ($request->input('features') as $feature) {
                $elementFeature = new ElementFeature();
                $elementFeature->element_id = $element->id;
                $elementFeature->title = $feature['title'] ?? '';
                $elementFeature->description = $feature['description'] ?? '';
                $elementFeature->order_no = $feature['order'] ?? 0;
                $elementFeature->save();
            }
        }

        return redirect()->route('admin.element.index', $slug)->with('notification', [
            'message' => 'Page Element Added Successfully!',
            'alert' => 'success',
        ]);
    }

    public function edit($id)
    {
        $element = Element::with('features')->findOrFail($id);
        $slug = $element->page->slug;
        return view('admin.page.partials.element_edit', compact('element', 'slug'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
            'features.*.id' => 'nullable|integer|exists:element_features,id',
            'features.*.title' => 'nullable|string|max:255',
            'features.*.description' => 'nullable|string|max:255',
            'features.*.order' => 'nullable|integer',
        ]);

        $element = Element::findOrFail($id);
        $element->title = $validated['title'];
        $element->subtitle = $validated['subtitle'];
        $element->description = $validated['description'];

        if ($request->hasFile('image')) {
            $this->deleteFileIfExists($element->image);
            $element->image = $this->uploadFile($request->file('image'), 'element/thumb');
        }

        if ($request->hasFile('icon')) {
            $this->deleteFileIfExists($element->icon);
            $element->icon = $this->uploadFile($request->file('icon'), 'element/icons');
        }

        $this->updateFeatures($request->input('features'), $element);
        $element->save();

        return redirect()->route('admin.element.index', $element->page->slug)->with('notification', [
            'message' => 'Page Element Updated Successfully!',
            'alert' => 'success',
        ]);
    }

    private function uploadFile($file, $folder)
    {
        $fileName = time() . rand() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path("assets/admin/uploads/{$folder}/"), $fileName);
        return "assets/admin/uploads/{$folder}/" . $fileName;
    }

    private function deleteFileIfExists($filePath)
    {
        if ($filePath && file_exists(public_path($filePath))) {
            unlink(public_path($filePath));
        }
    }

    private function updateFeatures($features, $element)
    {
        if ($features) {
            $existingFeatureIds = $element->features->pluck('id')->toArray();

            foreach ($features as $featureData) {
                if (isset($featureData['id']) && $featureData['id']) {
                    $feature = ElementFeature::find($featureData['id']);

                    if ($feature) {
                        $feature->title = $featureData['title'] ?? '';
                        $feature->description = $featureData['description'] ?? '';
                        $feature->order_no = $featureData['order'] ?? 0;
                        $feature->save();
                    }

                    $existingFeatureIds = array_diff($existingFeatureIds, [$featureData['id']]);
                } else {
                    $feature = new ElementFeature(['element_id' => $element->id]);
                    $feature->title = $featureData['title'] ?? '';
                    $feature->description = $featureData['description'] ?? '';
                    $feature->order_no = $featureData['order'] ?? 0;
                    $feature->save();
                }
            }

            ElementFeature::whereIn('id', $existingFeatureIds)->delete();
        }
    }

    public function delete($id)
    {
        $element = Element::findOrFail($id);

        $element->features()->delete();

        if ($element->image && file_exists(public_path($element->image))) {
            unlink(public_path($element->image));
        }

        if ($element->icon && file_exists(public_path($element->icon))) {
            unlink(public_path($element->icon));
        }

        $element->delete();

        return redirect()->back()->with('notification', [
            'message' => 'Page Element Deleted Successfully!',
            'alert' => 'success',
        ]);
    }
}
