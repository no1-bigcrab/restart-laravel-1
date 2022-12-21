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

        public function getListPostById($id)
        {
            return $this->model->findOrFail($id);
        }

        public function createPost($request)
        {
            return $this->model->create($request);
        }

        public function updatePost($request, $id)
        {
            $post = $this->model->findOrFail($id);
            if ($post) {
                return $post->update($request->all());
            }
            else {
                return "error!";
            }
        }

        public function deletePost($id)
        {
            return $this->model->destroy($id);
        }
    }
?>