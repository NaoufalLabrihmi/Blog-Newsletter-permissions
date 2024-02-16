<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function create(Post $post, Tag $tag)
    {
        $posts = Post::with('tags')->orderBy('created_at', 'desc')->paginate(9);
        $tags = Tag::get();
        return view('posts.create_posts', [
            'posts' => $posts,
            'post' => $post,
            'tags' => $tags,
            'tag' => $tag,
        ]);
    }
    public function show(Post $post)
    {
        $next = Post::where('id', '>', $post->id)->orderBy('id')->first();
        $previous = Post::where('id', '<', $post->id)->orderBy('id', 'desc')->first();
        return view('posts.show', [
            'post' => $post,
            'next' => $next,
            'previous' => $previous
        ]);
    }
    public function store(PostRequest $request)
    {
        $attr = $request->all();
        $slug = $this->createSlug($request->title);
        $attr['slug'] = $slug;

        if ($request->hasfile('thumbnail')) {
            $thumbnail = request()->file('thumbnail');
            $thumbnailName =  uniqid() . '.' . $thumbnail->getClientOriginalExtension();
            $destinationPath = '/storage/images/posts/thumbnail/';
            $thumbnail->move(public_path() . $destinationPath, $thumbnailName);
            $thumbnail = $destinationPath . $thumbnailName;
        }

        if ($request->hasfile('images')) {
            $images = $request->file('images');
            foreach ($images as $image) {
                $imageName =  uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path() . '/storage/images/posts/galeri', $imageName);
                $fileNames[] = $imageName;
            }
            $images = json_encode($fileNames);
        } else {
            $images = null;
        }


        $attr['thumbnail'] = $thumbnail;
        $attr['images'] = $images;
        $post = auth()->user()->posts()->create($attr);
        $post->tags()->attach(request('tags'));
        session()->flash('status', 'The post was created');
        return redirect()->to(route('post.create'));
    }
    public function createSlug($title, $id = 0)
    {
        $slug = str()->slug($title);
        $allSlugs = $this->getRelatedSlugs($slug, $id);
        if (!$allSlugs->contains('slug', $slug)) {
            return $slug;
        }

        $i = 1;
        $is_contain = true;
        do {
            $newSlug = $slug . '-' . $i;
            if (!$allSlugs->contains('slug', $newSlug)) {
                $is_contain = false;
                return $newSlug;
            }
            $i++;
        } while ($is_contain);
    }
    protected function getRelatedSlugs($slug, $id = 0)
    {
        return Post::select('slug')->where('slug', 'like', $slug . '%')
            ->where('id', '<>', $id)
            ->get();
    }

    public function edit(Post $post, Tag $tag)
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(9);
        $tags = Tag::get();
        return view('posts.edit_posts', [
            'posts' => $posts,
            'post' => $post,
            'tags' => $tags,
            'tag' => $tag,
        ]);
    }

    public function Update(PostRequest $request, Post $post)
    {
        $attr = $request->all();

        if ($request->hasfile('thumbnail')) {
            Storage::delete($post->thumbnail);
            $thumbnail = request()->file('thumbnail');
            $thumbnailName =  uniqid() . '.' . $thumbnail->getClientOriginalExtension();
            $destinationPath = '/storage/images/posts/thumbnail/';
            $thumbnail->move(public_path() . $destinationPath, $thumbnailName);
            $thumbnail = $destinationPath . $thumbnailName;
        } else {
            $thumbnail = $post->thumbnail ?? null;
        }

        if (request()->file('images')) {
            foreach (json_decode($post->images, true) as $value) {
                Storage::delete('/images/posts/galeri/' . $value);
            }
            $images = $request->file('images');
            foreach ($images as $image) {
                $imageName =  uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path() . '/storage/images/posts/galeri', $imageName);
                $fileNames[] = $imageName;
            }
            $images = json_encode($fileNames);
        } else {
            $images = $post->images ?? null;
        }


        $attr['thumbnail'] = $thumbnail;
        $attr['images'] = $images;
        $post->update($attr);
        $post->tags()->sync(request('tags'));
        session()->flash('status', 'The post was updated');
        return redirect()->to(route('post.create'));
    }
    public function destroy(Post $post)
    {
        // Detach all tags associated with the post
        $post->tags()->detach();

        // Delete the post's thumbnail
        Storage::delete($post->thumbnail);

        // Delete the post's gallery images
        if (!is_null($post->images)) {
            foreach (json_decode($post->images, true) as $value) {
                Storage::delete('/images/posts/galeri/' . $value);
            }
        }

        // Delete the post itself
        $post->delete();

        session()->flash('status', 'The post was deleted');
        return back();
    }
}
