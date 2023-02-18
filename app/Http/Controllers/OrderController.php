<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\Order;
use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\OrdersQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{


    public function feedBack()
    {
        $model = new Category();
        $categorylist = $model->getCategories();
        return \view('news.feedback', ['categories' => $categorylist]);
    }

    public function order()
    {
        $model = new Category();
        $categorylist = $model->getCategories();
        return \view('news.order', ['categories' => $categorylist]);
    }

    public function editOrder(int $id, OrdersQueryBuilder $orderQueryBuilder, CategoriesQueryBuilder $categoriesQueryBuilder)
    {
        $order = $orderQueryBuilder->getOrderById($id);
        $categorylist = $categoriesQueryBuilder->getAll();
        // dd($order);
        // die();
        return \view('news/editorder', ['order' => $order, 'categories' => $categorylist]);
    }

    public function updateOrder(Request $request, Order $order): RedirectResponse
    {
        $order = $order->fill($request->except('_token'));
        if ($order->save()) {
            return redirect()->route('categories.show')->with('success', 'Заказ обновлен');
            \back()->with('errror', 'Не удалось обновить заказ');
        }
    }

    public function saveFeedBack(Request $request)
    {
        //dd($request->all());
        $fn = 'feedback.txt';
        $s = $request->input('name') . ": " . $request->input('comment') . "\n";
        if (file_exists($fn))
            file_put_contents($fn, $s, FILE_APPEND | LOCK_EX);
        else file_put_contents($fn, $s, LOCK_EX);
        return redirect()->route('categories.show');
    }

    public function saveOrder(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $order = new Order($request->except('_token'));
        if ($order->save()) {
            return redirect()->route('categories.show')->with('success', 'Заказ добавлен');
        } else \back()->with('error', 'Не удалось добавить заказ');
    }
}
