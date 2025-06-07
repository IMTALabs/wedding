<?php

namespace App\Repositories\WeddingRepositories;

use App\Models\Wedding;
use App\Repositories\BaseRepository;
use App\Repositories\WeddingRepositories\IWeddingRepository;
use Illuminate\Database\Eloquent\Model;

class WeddingRepository extends BaseRepository implements IWeddingRepository
{
    public function __construct(Wedding $model)
    {
        parent::__construct($model);
    }

    public function getByUserId(int $userId) {
        $entry = $this->model->query()->where("user_id", $userId)->first();
        if (!$entry) {
            return abort(404, "Wedding not found");
        }

        return $entry;
    }
}
