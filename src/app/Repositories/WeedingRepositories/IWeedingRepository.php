<?php

namespace App\Repositories\WeedingRepositories;

use App\Repositories\IBaseRepository;

interface IWeedingRepository extends IBaseRepository
{
    public function getByUserId(int $userId);
}
