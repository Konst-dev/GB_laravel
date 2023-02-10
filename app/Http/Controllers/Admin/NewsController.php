<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $model = new News();
        $newslist = $model->getNews();
        // $join = DB::table('news')
        //     ->join('category_has_news as chn', 'news.id', '=', 'chn.news_id')
        //     ->join('categories', 'chn.category_id', '=', 'categories.id')
        //     ->select('news.*', 'chn.category_id', 'categories.title as ctitle')
        //     //->toSql(); sql-запросы
        //     ->get();

        // //$where = DB::table('news')->where('title', 'like', '%ti%')->get();
        // $where = DB::table('news')->where([
        //     ['title', 'like', '%ti%'],
        //     ['id', '>', '3']
        // ])->get();

        // $where_new = DB::table('news')->whereBetween('id', [3, 6])->get();

        // dd($join, $where, $where_new);
        // die;
        return \view('admin.news.news', ['newslist' => $newslist]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \View
     */
    public function create(): View
    {
        return \view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);
        //dd($request->all());
        //dd($request->input('title','default'));
        //dd($request->only(['title', 'description']));
        //dd($request->except(['title', 'description']));
        //dd(response()->json($request()->only(['title', 'author', 'description'])));
        return response()->json($request->only(['title', 'author', 'description']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
