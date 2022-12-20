<?php
    namespace App\Repositories;

    use Illuminate\Database\Eloquent\Model;

    class BaseRepository implements BaseRepositoryInterface
    {
        protected $model;
        protected $originalModel;

        public function __construct(Model $model)
        {
            $this->originalModel= $model;
            $this->makeModel();
        }

        public function makeModel()
        {
            return $this->model = $this->originalModel;
        }
    }
?>