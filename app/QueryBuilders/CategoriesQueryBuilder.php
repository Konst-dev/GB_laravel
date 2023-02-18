<?php

namespace App\QueryBuilders;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;

final class CategoriesQueryBuilder extends QueryBuilder
{
    public Builder $model;
    public function __construct()
    {
        $this->model = Category::query();
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }
}
