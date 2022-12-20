<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Post\PostRepositoryInterface;

class PostController extends Controller
{
    protected  $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index(Request $request)
    {
        $params =$request->all();
        $data = $this->postRepository->getList($params);

        return response()->json([
            'message' => 'get data success',
            'code' => '200',
            'data' => $data
           ]);
    }
}
