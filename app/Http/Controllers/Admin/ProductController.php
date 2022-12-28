<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Product\ProductRepositoryInterface;

class ProductController extends Controller
{
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $data = $this->productRepository->getListProduct();
        
        return response()->json(
            [
                'message' => 'get data success',
                'code' => '200',
                'data' => $data
            ]
        );
    }

    public function show($id)
    {
        $data = $this->productRepository->getProductById($id);
        dd($data->categories->title);
        return response()->json(
            [
                'message' => 'get data success',
                'code' => '200',
                'data' => $data
            ]
        );
    }

    public function store(Request $request)
    {
        $params = $request->all();
        $data = $this->productRepository->createProduct($params);

        return response()->json(
            [
                'message' => 'get data success',
                'code' => '200',
                'data' => $data
            ]
        );    
    }

    public function update(Request $request, $id)
    {
        $data = $this->productRepository->updateProduct($request, $id);
        return response()->json(
            [
                'message' => 'update data!',
                'code' => '200',
                'data' => $data
            ]
        );       
    }

    public function delete($id)
    {
        $params = $this->productRepository->deleteProduct($id);
        if ($params == 0) {
            $data = "Not found the id!";
        } else {
            $data = "Delete the product success!";
        }
        
        return response()->json(
            [
                'message' => $data,
                'code' => '200',
            ]
        );    
    }
}
