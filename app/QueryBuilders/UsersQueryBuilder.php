<?php

namespace App\QueryBuilders;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

final class UsersQueryBuilder extends QueryBuilder
{
    public Builder $model;
    public function __construct()
    {
        $this->model = User::query();
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }
}
