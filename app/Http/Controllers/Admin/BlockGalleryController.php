<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlockGallery;
use App\Models\Block;
use Illuminate\Http\Request;

class BlockGalleryController extends Controller
{
    public function add($slug, $id)
    {
        $block = Block::find($id);
        $block_galleries = BlockGallery::where('block_id', $id)->get();
        return view('admin.page.partials.block_galleries_add', compact('block_galleries', 'slug', 'block'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'order_no' => 'required|integer',
            'block_id' => 'required|exists:blocks,id'
        ]);

        $block_galleries = new BlockGallery();
        $block_galleries->order_no = $request->order_no ?? 0;
        $block_galleries->block_id = $request->block_id;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/admin/uploads/block_galleries/thumb/'), $imageName);
            $block_galleries->image = 'assets/admin/uploads/block_galleries/thumb/' . $imageName;
        }

        $block_galleries->save();

        return redirect()->back()->with('notification', [
            'message' => 'Block Gallery Added Successfully!',
            'alert' => 'success',
        ]);
    }

    public function edit($id)
    {
        $block_galleries = BlockGallery::findOrFail($id);
        return view('admin.page.partials.block_galleries_edit', compact('block_galleries'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'order_no' => 'required|integer',

        ]);

        $block_galleries = BlockGallery::findOrFail($id);
        $block_galleries->order_no = $request->order_no ?? 0;

        if ($request->hasFile('image')) {
            if ($block_galleries->image && file_exists(public_path($block_galleries->image))) {
                unlink(public_path($block_galleries->image));
            }

            $file = $request->file('image');
            $imageName = time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/admin/uploads/block_galleries/thumb/'), $imageName);
            $block_galleries->image = 'assets/admin/uploads/block_galleries/thumb/' . $imageName;
        }

        $block_galleries->save();

        return redirect()->route('admin.block_gallery.add', ['slug' => $block_galleries->block->page->slug, 'id' => $block_galleries->block->id])->with('notification', [
            'message' => 'Block Gallery Updated Successfully!',
            'alert' => 'success',
        ]);
    }

    public function delete($id)
    {
        $blockgalleries = BlockGallery::findOrFail($id);

        if ($blockgalleries->image && file_exists(public_path($blockgalleries->image))) {
            unlink(public_path($blockgalleries->image));
        }

        $blockgalleries->delete();

        return redirect()->back()->with('notification', [
            'message' => 'Block Gallery Deleted Successfully!',
            'alert' => 'success',
        ]);
    }

}
