<?php


namespace App\Http\Services;


use App\Entities\Post;

class PostService extends BaseService
{
    /**
     * AuthorService constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return string
     */
    public function model()
    {
        return Post::class;
    }

}
