<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\CategoriesRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class PostCateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $_repository;

    public function __construct(CategoriesRepository $repository)
    {
        $this->_repository = $repository;
    }

    public function index()
    {
        //
        $data = $this->_repository->getAll();
        $_title = trans('admin.title.list') . ' ' . trans('admin.object.categories');
        return view('admin.page.post.cate.index', compact('data', '_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $slug = isset($request->slug) && !empty($request->slug) ? $request->slug : $request->title[App::getLocale()];
        $slug = $this->_repository->generateSlug($slug, 0);
        $param = $request->except(['_token', 'slug']);
        $param += ['slug' => $slug];
        $id = $this->_repository->create($param);
        Session::flash('success', trans('message.admin.create'));
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = $this->_repository->find($id);
        return view('admin.page.post.cate.edit', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $id = $request->id;
        $slug = isset($request->slug) && !empty($request->slug) ? $request->slug : $request->title[App::getLocale()];
        $slug = $this->_repository->generateSlug($slug, $id);
        $param = $request->except(['_token', 'slug']);
        $param += ['slug' => $slug];
        $data = $this->_repository->update($id, $param);
        Session::flash('success', trans('message.admin.edit'));
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $flag = $this->_repository->destroy($id);
        if ($flag == true) {
            Session::flash('success', trans('message.success.delete'));
        } else {
            Session::flash('danger', trans('message.danger.delete'));
        }
        return back();
    }
}
