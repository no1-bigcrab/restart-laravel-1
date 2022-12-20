<?php
    namespace App\Repositories\Post;

    use App\Repositories\BaseRepositoryInterface;
    
    interface PostRepositoryInterface extends BaseRepositoryInterface
    {
        public function getList($params);
    }
?>