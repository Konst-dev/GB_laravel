<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\CreateOrderRequest;
use App\Http\Requests\Orders\EditOrderRequest;
use App\Models\Category;
use App\Models\News;
use App\Models\Order;
use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\OrdersQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
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
        return \view('news/editorder', ['order' => $order[0], 'categories' => $categorylist]);
    }

    public function updateOrder(EditOrderRequest $request, Order $order): RedirectResponse
    {
        $order = $order->fill($request->validated());
        if ($order) {
            return redirect()->route('categories.show')->with('success', __('messages.order.edit.success'));
            \back()->with('errror', __('messages.order.edit.fail'));
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

    public function saveOrder(CreateOrderRequest $request)
    {
        $order = Order::create($request->validated());
        if ($order) {
            return redirect()->route('categories.show')->with('success', __('messages.order.create.success'));
        } else \back()->with('error', __('messages.order.create.fail'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
