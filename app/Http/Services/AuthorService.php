<?php


namespace App\Http\Services;


use App\Entities\Author;

class AuthorService extends BaseService
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
        return Author::class;
    }
}
