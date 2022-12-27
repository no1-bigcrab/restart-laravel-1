<?php
    namespace App\Repositories\Product;

    use App\Repositories\BaseRepositoryInterface;
    use Illuminate\Http\Request;

    interface ProductRepositoryInterface extends BaseRepositoryInterface
    {
        public function getListProduct();
        public function getProductById($id);
        public function createProduct(Request $request);
        public function updateProduct(Request $request, $id);
        public function deleteProduct($id);
    }
?>