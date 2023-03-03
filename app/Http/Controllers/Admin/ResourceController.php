<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Resources\CreateResourceRequest;
use App\Http\Requests\Resources\EditResourceRequest;
use App\Models\Resource;
use App\QueryBuilders\ResourcesQueryBuilder;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ResourcesQueryBuilder $resourcesQueryBuilder)
    {
        return \view('admin.resources.index', [
            'resList' => $resourcesQueryBuilder->getAll(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('admin.resources.create', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateResourceRequest $request)
    {
        $res = Resource::create($request->validated());
        if ($res) {
            return redirect()->route('admin.resources.index')->with('success', __('messages.admin.resource.create.success'));
        } else \back()->with('errror', __('messages.admin.resource.create.fail'));
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
    public function edit(Resource $resource)
    {
        return \view('admin.resources.edit', [
            'resource' => $resource,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditResourceRequest $request, Resource $resource)
    {
        $resource = $resource->fill($request->validated());
        if ($resource->save()) {
            return redirect()->route('admin.resources.index')->with('success', __('messages.admin.resource.edit.success'));
            \back()->with('errror', __('messages.admin.resource.edit.fail'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resource $resource)
    {
        try {
            $resource->delete();
            return \response()->json('ok');
        } catch (\Exception $exception) {
            return \response()->json('error', 400);
        }
    }
}
