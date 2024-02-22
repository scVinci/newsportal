<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PosteStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Services\PostService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{

    private $service;

    public function __construct()
    {
        $this->service = new PostService();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return  view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PosteStoreRequest $request
     * @return RedirectResponse
     */
    public function store(PosteStoreRequest $request): RedirectResponse
    {
        //Save validated request's data
        $data = $request->validated();

        // Upload main image
        $data['image'] = $this->service->saveImage($data['image']);

        // Tags
        $tags = $data['tags'];
        unset($data['tags']);

        // Create and save post in database
        $newPost = new Post($data);
        $newPost->save();

        // Attach the tags
        $newPost->tags()->attach($tags);

        return redirect()->route('admin.posts.index')->with('message', 'Статтю додано успішно');
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return Application|Factory|View
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post  $post
     * @return Application|Factory|View
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();
        $categories = Category::all();

        return view('admin.posts.edit', compact('tags', 'categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostUpdateRequest $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function update(PostUpdateRequest $request, Post $post): RedirectResponse
    {
        //Save validated request's data
        $data = $request->validated();


        // Upload main image
        if(isset($data['image'])) {
            $this->service->deleteImage($post->image);
            $data['image'] = $this->service->saveImage($data['image']);
        }

        // Tags
        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);

        return redirect()->route('admin.posts.index')->with('message', 'Статтю оновлено успішно');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return RedirectResponse
     */
    public function destroy(Post $post): RedirectResponse
    {
        try {
            $post->tags()->detach();
            $this->service->deleteImage($post->image.'');
            $post->delete();
        } catch (\Exception $err){
            return redirect()->route('admin.posts.index')->with('message',  'Статтю видалити не вдалося.' . $err->getMessage());
        }
        return redirect()->route('admin.posts.index')->with('message', 'Статтю видалено успішно');
    }
}
