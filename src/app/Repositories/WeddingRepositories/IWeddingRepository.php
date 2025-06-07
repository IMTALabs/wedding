<?php

namespace App\Repositories\WeddingRepositories;

use App\Repositories\IBaseRepository;

interface IWeddingRepository extends IBaseRepository
{
    public function getByUserId(int $userId);
}
