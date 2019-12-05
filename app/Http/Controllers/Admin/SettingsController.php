<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Settings;
use App\Models\CustomCode;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

class SettingsController extends Controller
{
    //
    public function index()
    {
        $data = Settings::find(1);
        if (empty($data)) {
            $data = new Settings();
            $data->image = 'http://placehold.it/1200x630';
            $data->logo = 'http://placehold.it/500x500';
            $data->save();
        }
        $_title = trans('admin.title.list') . ' ' . trans('admin.object.settings');
        return view('admin.page.settings.index', compact('data', '_title'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $param = $request->except(['_token', 'id']);
        $update = Settings::find($id)->update($param);
        Session::flash('success', trans('message.success.update'));
        return back();
    }

    public function translation()
    {
        $_title = trans('admin.title.list') . ' ' . trans('admin.object.translation');
        return view('admin.page.settings.translation', compact('_title'));
    }

    public function custom()
    {
        $data = CustomCode::find(1);
        if (empty($data)) {
            $data = new CustomCode();
            $data->save();
        }
        $_title = trans('admin.title.list') . ' ' . trans('admin.object.custom');
        return view('admin.page.settings.custom', compact('data', '_title'));
    }

    public function updateCustom(Request $request)
    {
        $id = $request->id;
        $param = $request->except(['_token', 'id']);
        $update = CustomCode::find($id)->update($param);
        Session::flash('success', trans('message.success.update'));
        return back();
    }
}
