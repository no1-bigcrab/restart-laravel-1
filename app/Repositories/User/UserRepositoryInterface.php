<?php
    namespace App\Repositories\User;

    use Illuminate\Http\Request;
    use App\Repositories\BaseRepositoryInterface;

    interface UserRepositoryInterface extends BaseRepositoryInterface
    {
        public function getAllUser();
        public function getUserById($id);
        public function updateUser(Request $request, $id);
        public function deleteUser($id);
    }
?>