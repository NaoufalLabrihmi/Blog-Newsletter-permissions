<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::with('posts')->get();
        return view('tags', [
            'tags' => $tags,
        ]);
    }
    public function show(Tag $tag)
    {
        $posts = $tag->posts()->with('tags')->paginate(9);
        $tags = Tag::get();
        $title = $tag->name;
        return view('blog', compact('posts', 'tag', 'title', 'tags'));
    }
    public function create(Tag $tag)
    {
        $tags = Tag::orderBy('name', 'asc')->get();
        return view('tags.create_tags', compact('tags', 'tag'));
    }
    public function store(Request $request)
    {
        $attr = $request->validate([
            'name' => 'required|min:3|max:25|unique:tags,name'
        ]);
        $tag = new Tag;
        $tag->name = $request->name;
        $tag->slug = str()->slug($request->name);
        $tag->save($attr);
        session()->flash('status', 'The new tag was created');
        return back();
    }
    public function edit(Tag $tag)
    {
        $tags = Tag::get();
        return view('tags.edit_tags', compact('tags', 'tag'));
    }
    public function update(Tag $tag)
    {
        $attr = request()->validate([
            'name' => 'required|min:3|max:25|unique:tags,name,' . $tag->id,
            'slug' => 'required|min:3|max:25|unique:tags,slug,' . $tag->id
        ]);
        $tag->update($attr);
        session()->flash('status', 'The tag was updated');
        return redirect()->to(route('tag.create'));
    }
    public function destroy(Tag $tag)
    {
        $tag->delete();
        session()->flash('status', 'The tag was deleted');
        return redirect()->to(route('tag.create'));
    }
}
