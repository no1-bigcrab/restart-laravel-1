<?php
    namespace App\Repositories\Post;

    use App\Repositories\BaseRepository;
    use App\Repositories\Post\PostRepositoryInterface;
    use App\Models\Post;

    class PostRepository extends BaseRepository implements PostRepositoryInterface
    {
        public function __construct(Post $post)
        {
            parent::__construct($post);
        }

        public function getList($params)
        {
            return $this->model->all()->toArray();
        }
    }
?>