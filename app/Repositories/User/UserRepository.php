<?php
    namespace App\Repositories\User;

    use App\Repositories\BaseRepository;
    use Illuminate\Http\Request;
    use App\Models\User;
    use App\Repositories\User\UserRepositoryInterface;

    class UserRepository extends BaseRepository implements UserRepositoryInterface
    {
        public function __construct(User $user)
        {
            parent::__construct($user);
        }
        //get all user
        public function getAllUser()
        {
            return $this->model->all()->toArray();
        }
        //get user by id
        public function getUserById($id)
        {
            return $this->model->findOrFail();
        }
        //update user
        public function updateUser(Request $request, $id)
        {
            $user = $this->model->findOrFail($id);
            if ($user) {
                return $user->update($request->all());
            }
        }
        //delete user
        public function deleteUser($id)
        {
            return $this->model->destroy($id);
        }
    }
?>