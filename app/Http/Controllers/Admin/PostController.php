<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Post\PostRepositoryInterface;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

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

    public function show(Request $request)
    {
        $id = $request->route('id');
        $data = $this->postRepository->getListPostById($id);

        return response()->json([
            'message' => 'get data success',
            'code' => '200',
            'data' => $data
           ]);
    }

    public function create(StorePostRequest $request)
    {
        $data = $this->postRepository->createPost($request->all());

        return response()->json([
            'message' => 'Create data success',
            'code' => '200',
            'data' => $data
           ]);
    }

    public function update(UpdatePostRequest $request)
    {
        $id = $request->route('id');        
        $data = $this->postRepository->updatePost($request, $id);

        return response()->json([
            'message' => 'Update data success',
            'code' => '200',
            'data' => $data
           ]);
    }

    public function destroy(Request $request)
    {
        $data = $this->postRepository->deletePost($request->route('id'));
        return response()->json([
            'message' => 'Delete data success',
            'code' => '200',
            'data' => $data
           ]);
    }
}
