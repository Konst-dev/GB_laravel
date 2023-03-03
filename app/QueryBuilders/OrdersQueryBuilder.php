<?php

namespace App\QueryBuilders;

use App\Models\Order;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

final class OrdersQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = Order::query();
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }
    public function getOrderById(int $id): Collection
    {
        return $this->model->where('id', $id)->get();
    }
}
