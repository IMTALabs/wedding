<?php

namespace App\Repositories\WeedingRepositories;

use App\Models\Wedding;
use App\Repositories\BaseRepository;
use App\Repositories\WeedingRepositories\IWeedingRepository;
use Illuminate\Database\Eloquent\Model;

class WeedingRepository extends BaseRepository implements IWeedingRepository
{
    public function __construct(Wedding $model)
    {
        parent::__construct($model);
    }

    public function getByUserId(int $userId) {
        $entry = $this->model->query()->where("user_id", $userId)->first();
        if (!$entry) {
            return abort(404, "Weeding not found");
        }

        return $entry;
    }
}
