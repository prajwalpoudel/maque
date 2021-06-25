<?php

namespace App\Http\Controllers;

use App\Http\Services\AuthorService;
use App\Http\Services\PostService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * @var PostService
     */
    private $postService;
    /**
     * @var AuthorService
     */
    private $authorService;

    /**
     * HomeController constructor.
     * @param PostService $postService
     * @param AuthorService $authorService
     */
    public function __construct(PostService $postService, AuthorService $authorService)
    {
        $this->postService = $postService;
        $this->authorService = $authorService;
    }

    /**
     * @return Application|Factory|\Illuminate\View\View
     */
    public function index() {
        $posts = $this->postService->query()->with('author')->get();

        return view('home', compact('posts'));
    }

    /**
     *
     */
    public function storeInDatabase() {
        $authorResponse = Http::get('https://maqe.github.io/json/authors.json');
        $authorData = json_decode($authorResponse->body());
        foreach($authorData as $data) {
            $this->authorService->create([
                'id' => $data->id,
                'name' => $data->name,
                'role' => $data->role,
                'place' => $data->place,
                'avatar_url' => $data->avatar_url
            ]);
        }
        $postResponse = Http::get('https://maqe.github.io/json/posts.json');
        $postData = json_decode($postResponse->body());
        foreach($postData as $data) {
            $this->postService->create([
                'id' => $data->id,
                'author_id' => $data->author_id,
                'title' => $data->title,
                'body' => $data->body,
                'image_url' => $data->image_url,
                'created_at' => $data->created_at

            ]);
        }

        return redirect()->route('home');
    }

    /**
     *
     */
    public function removeFromDatabase() {
        $this->postService->truncate();
        $this->authorService->truncate();

        return redirect()->route('home');
    }
}

