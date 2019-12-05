<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\MemberRepository;
use Illuminate\Support\Facades\Session;
use App\Models\Admins;
use Illuminate\Support\Facades\App;

class MemberController extends Controller
{
    //
    protected $_repository;

    public function __construct(MemberRepository $repository)
    {
        $this->_repository = $repository;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $total = Admins::count('id');
            $query = Admins::select('id', 'email', 'name', 'first_name', 'last_name', 'website', 'phone', 'address', 'role', 'image', 'created_at');
            # Category filter
//            if ($request->has('category')) {
//                $query = $query->where('cate_id', (int)$request->category);
//                $filtered = $query->count();
//            }
            # Search title
            if ('' !== $search = $request->search['value']) {
                $query = $query->where('email', 'like', '%' . $search . '%');
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
                    $post->email,
                    $post->role,
                    $post->created_at->format('d/m/Y'),
                    "<a href='" . route('member.show', $post->id) . "' class='btn btn-success btn-xs'><i class='fa fa-fw fa-edit'></i></a>&nbsp;<a onclick='return confirmDelete();return false;' href='" . route('member.destroy', $post->id) . "' class='btn btn-danger btn-xs'><i class='fa fa-fw fa-trash'></i></a>"
                ];
            }

            return response()->json([
                'data' => $rows,
                "recordsTotal" => $total,
                'recordsFiltered' => isset($filtered) ? $filtered : $total,
            ]);
        }
        $_title = trans('admin.title.list') . ' ' . trans('admin.object.member');
        return view('admin.page.member.index', compact('_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $_title = trans('admin.title.add') . ' ' . trans('admin.object.member');
        return view('admin.page.member.add', compact('_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $param = $request->except(['_token', 'password']);
        $name = $request->first_name . ' ' . $request->last_name;
        $password = bcrypt($request->password);
        $param += ['name' => $name];
        $param += ['password' => $password];
        $id = $this->_repository->create($param);
        Session::flash('success', trans('message.admin.create'));
        return redirect()->route('member.show', $id);
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
        $_title = trans('admin.title.edit') . ' ' . trans('admin.object.member');
        $data = $this->_repository->find($id);
        return view('admin.page.member.edit', compact('data', '_title'));
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
        $id = $request->id;
        $param = $request->except(['_token', 'id', 'password']);
        if (!empty($request->password)) {
            $password = bcrypt($request->password);
            $param += ['password' => $password];
        }
        $_post = $this->_repository->update($id, $param);
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
        $flag = $this->_repository->destroy($id);
        if ($flag == true) {
            Session::flash('success', trans('message.admin.delete'));
        } else {
            Session::flash('danger', trans('message.admin.delete'));
        }
        return redirect()->route('member.index');
    }

    public function checkEmail(Request $request)
    {
        $flag = $this->_repository->checkEmail($request->email);
        $msg = trans('message.success.ok');
        if ($flag == false) {
            $msg = trans('message.danger.exist');
        }
        $results = [
            'success' => $flag,
            'msg' => $msg,
        ];
        $response = response()->json($results);
        $response->header('Content-Type', 'application/json');
        $response->header('charset', 'utf-8');
        return $response;
    }
}
