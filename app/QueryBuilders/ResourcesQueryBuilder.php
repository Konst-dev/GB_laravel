<?php

namespace App\QueryBuilders;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Category;
use App\Models\Resource;
use Illuminate\Database\Eloquent\Builder;

final class ResourcesQueryBuilder extends QueryBuilder
{
    public Builder $model;
    public function __construct()
    {
        $this->model = Resource::query();
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }
}
