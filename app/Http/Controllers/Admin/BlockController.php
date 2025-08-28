<?php

namespace App\Http\Controllers\admin;

use App\Models\Page;
use App\Models\Block;
use App\Models\BlockFeature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlockController extends Controller
{
    public function index($slug)
    {
        $page = Page::where('slug', $slug)->first();
        $blocks = Block::where('page_id', $page->id)->get();
        return view('admin.page.partials.block_list', compact('blocks', 'slug'));
    }

    public function add($slug)
    {
        return view('admin.page.partials.block_add', compact('slug'));
    }

    public function store(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
            'features.*.title' => 'nullable|string|max:255',
            'features.*.order_no' => 'nullable|integer',
            'type' => "required|in:image,gallery"
        ]);

        $page = Page::where('slug', $slug)->first();
        $block = new Block();
        $block->block_name = "test";
        $block->title = $request->input('title');
        $block->subtitle = $request->input('subtitle');
        $block->description = $request->input('description');
        $block->page_id = $page->id;
        $block->type = $request->input('type', 'image');


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/admin/uploads/block/thumb/'), $imageName);
            $block->image = 'assets/admin/uploads/block/thumb/' . $imageName;
        }

        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $iconName = time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/admin/uploads/block/icons/'), $iconName);
            $block->icon = 'assets/admin/uploads/block/icons/' . $iconName;
        }

        $block->save();

        if ($request->has('features')) {
            foreach ($request->input('features') as $feature) {
                $blockFeature = new BlockFeature();
                $blockFeature->block_id = $block->id;
                $blockFeature->title = $feature['title'] ?? '';
                $blockFeature->order_no = $feature['order_no'] ?? 0;
                $blockFeature->save();
            }
        }

        return redirect()->route('admin.block.index', $page->slug)->with('notification', [
            'message' => 'Page Block Added Successfully!',
            'alert' => 'success',
        ]);
    }

    public function edit($id)
    {
        $block = Block::with('features')->findOrFail($id);
        $slug = $block->page->slug;
        return view('admin.page.partials.block_edit', compact('block', 'slug'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
            'features.*.id' => 'nullable|integer|exists:block_features,id',
            'features.*.title' => 'nullable|string|max:255',
            'features.*.order_no' => 'nullable|integer',
            'type' => "required|in:image,gallery"
        ]);

        $block = Block::findOrFail($id);
        $block->title = $request->input('title');
        $block->subtitle = $request->input('subtitle');
        $block->description = $request->input('description');
        $block->type = $request->input('type', 'image');

        if ($request->hasFile('image')) {
            if ($block->image && file_exists(public_path($block->image))) {
                unlink(public_path($block->image));
            }

            $file = $request->file('image');
            $imageName = time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/admin/uploads/block/thumb/'), $imageName);
            $block->image = 'assets/admin/uploads/block/thumb/' . $imageName;
        }

        if ($request->hasFile('icon')) {
            if ($block->icon && file_exists(public_path($block->icon))) {
                unlink(public_path($block->icon));
            }

            $file = $request->file('icon');
            $iconName = time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/admin/uploads/block/icons/'), $iconName);
            $block->icon = 'assets/admin/uploads/block/icons/' . $iconName;
        }

        $block->save();

        $block->features()->delete();
        if ($request->has('features')) {
            foreach ($request->input('features') as $featureData) {
                $feature = new BlockFeature();
                $feature->block_id = $block->id;
                $feature->title = $featureData['title'] ?? '';
                $feature->order_no = $featureData['order_no'] ?? 0;
                $feature->save();
            }
        }

        return redirect()->route('admin.block.index', $block->page->slug)->with('notification', [
            'message' => 'Page Block Updated Successfully!',
            'alert' => 'success',
        ]);
    }

    public function delete($id)
    {
        $block = Block::findOrFail($id);
        $block->features()->delete();

        if ($block->image && file_exists(public_path($block->image))) {
            unlink(public_path($block->image));
        }

        if ($block->icon && file_exists(public_path($block->icon))) {
            unlink(public_path($block->icon));
        }

        $block->delete();

        return redirect()->back()->with('notification', [
            'message' => 'Page Block Deleted Successfully!',
            'alert' => 'success',
        ]);
    }
}
