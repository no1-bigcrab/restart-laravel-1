<?php
    namespace App\Repositories\Product;

    use App\Repositories\BaseRepository;
    use App\Models\Product;
    use Illuminate\Http\Request;
    use App\Repositories\Product\ProductRepositoryInterface;

    class ProductRepository extends BaseRepository implements ProductRepositoryInterface
    {
        public function __construct(Product $product)
        {
            parent::__construct($product);
        }

        public function getListProduct()
        {
            return $this->model->all()->toArray();
        }

        public function getProductById($id)
        {
            return $this->model->findOrFail($id);
        }

        public function createProduct($request)
        {
            return $this->model->create($request);
        }

        public function updateProduct(Request $request, $id)
        {
            $product = $this->model->findOrFail($id);
            if ($product) {
                return $product->update($request->all());
            }
        }

        public function deleteProduct($id)
        {
            return $this->model->destroy($id);
        }
    }

?>