<?php

namespace App\Repositories\UserRepositories;

use App\Models\User;
use App\Repositories\BaseRepository;
use App\Repositories\UserRepositories\IUserRepository;
use Illuminate\Database\Eloquent\Model;

class UserRepository extends BaseRepository implements IUserRepository
{

    /**
     * UserRepository constructor.
     *
     * @param \App\Models\User $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
}
