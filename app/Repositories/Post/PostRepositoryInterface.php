<?php
    namespace App\Repositories\Post;

    use App\Repositories\BaseRepositoryInterface;
    
    interface PostRepositoryInterface extends BaseRepositoryInterface
    {
        public function getList($params);
        public function getListPostById($id);
        public function createPost($params);
        public function updatePost($params, $id);
        public function deletePost($id);
    }
?>