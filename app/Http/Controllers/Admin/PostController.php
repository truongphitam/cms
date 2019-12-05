<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\PostRepository;
use Illuminate\Support\Facades\Session;
use App\Models\Post;
use App\Models\Categories;
use Illuminate\Support\Facades\App;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $_repository;

    public function __construct(PostRepository $repository)
    {
        $this->_repository = $repository;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $total = Post::count('id');

            $query = Post::select('id', 'image', 'title', 'slug', 'user_id', 'created_at', 'is_published');
            if (Auth::guard('admins')->user()->role == 'author' && Auth::guard('admins')->user()->role == 'contributor') {
                $query = $query->where('user_id', '=', Auth::guard('admins')->user()->id);
            }
            # Category filter
//            if ($request->has('category')) {
//                $query = $query->where('cate_id', (int)$request->category);
//                $filtered = $query->count();
//            }
            # Search title
            if ('' !== $search = $request->search['value']) {
                $query = $query->where('title', 'like', '%' . $search . '%');
                $filtered = $query->count();
            }
            # Pagination
            $posts = $query->orderBy('id', 'desc');
            $posts = $query->skip($request->start)->take($request->length);
            $posts = $query->get();
            # Output
            $rows = [];
            foreach ($posts as $post) {
                $rows[] = [
                    "<img src='$post->image' class='img-responsive'/>",
                    $post->title,
                    $post->author->name,
                    Categories::getNameMultiCate($post->id),
                    $post->is_published == 'on' ? "<a role='button' class='btn btn-success btn-xs'><i class='fa fa-check-square-o'></i></a>" : "<a role='button' class='btn btn-danger btn-xs'><i class='fa fa-fw fa-close'></i></a>",
                    $post->created_at,
                    "<a target='_blank' href='/" . trans('web.url.news') . "/" . $post->slug . "' class='btn btn-warning btn-xs hidden'><i class='fa fa-fw fa-eye'></i></a>&nbsp;<a href='" . route('post.show', $post->id) . "' class='btn btn-success btn-xs'><i class='fa fa-fw fa-edit'></i></a>&nbsp;<a onclick='return confirmDelete();return false;' href='" . route('post.destroy', $post->id) . "' class='btn btn-danger btn-xs'><i class='fa fa-fw fa-trash'></i></a>"
                ];
            }

            return response()->json([
                'data' => $rows,
                "recordsTotal" => $total,
                'recordsFiltered' => isset($filtered) ? $filtered : $total,
            ]);
        }
        $_title = trans('admin.title.list') . ' ' . trans('admin.object.post');
        return view('admin.page.post.index', compact('_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.page.post.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slug = isset($request->slug) && !empty($request->slug) ? $request->slug : $request->title[App::getLocale()];
        $slug = $this->_repository->generateSlug($slug, 0);
        $param = $request->except(['_token', 'slug']);
        $param += ['slug' => $slug];
        if (Auth::guard('admins')->user()->role == 'contributor') {
            $param = $request->except(['is_published']);
        }
        $id = $this->_repository->create($param);
        if (isset($request->products_to_cate) && !empty($request->products_to_cate)) {
            $post = $this->_repository->find($id);
            $post->categories()->attach($request->products_to_cate);
        }
        Session::flash('success', trans('message.admin.create'));
        return redirect()->route('post.show', $id);
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
        $param = [];
        if ($data->categories) {
            foreach ($data->categories as $item) {
                array_push($param, $item->pivot->categories_id);
            }
        }
        $_title = trans('admin.title.edit') . ' ' . trans('admin.object.post');
        return view('admin.page.post.edit', compact('data', 'param', '_title'));
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
        $_post = $this->_repository->update($id, $param);
        $post = $this->_repository->find($id);
        $post->categories()->detach();
        if (isset($request->products_to_cate) && !empty($request->products_to_cate)) {
            $post->categories()->attach($request->products_to_cate);
        }
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
            Session::flash('success', trans('message.admin.delete'));
        } else {
            Session::flash('danger', trans('message.admin.delete'));
        }
        return redirect()->route('post.index');
    }
}
