<?php
/**
 * Created by PhpStorm.
 * User: PhiTam
 * Date: 11/22/18
 * Time: 10:25 PM
 */
function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function isActiveRoute($route, $output = "active")
{
    if (Route::currentRouteName() == $route) return $output;
}

function areActiveRoutes(Array $routes, $output = "active")
{
    foreach ($routes as $route) {
        if (Route::currentRouteName() == $route) return $output;
    }
}

function ifActiveRoute($route, $output = "active", $else = "unactive")
{
    if (Route::currentRouteName() == $route) return $output;
    else return $else;
}

function format_money($value, $ext = ' VND')
{
    if ($value === null) {
        return '';
    }
    return number_format($value, 0, '', '.') . $ext;
}

function admin_ShowPostCate($parent = 0, $str = "", $type = '')
{
    if ($type != 'post') {
        $data = \App\Models\ProductsCate::where('parent_id', $parent)->orderBy('id', 'desc')->get();
    } else {
        $data = \App\Models\Categories::where('parent_id', $parent)->orderBy('id', 'desc')->get();
    }
    if (isset($data) && !empty($data)) {
        foreach ($data as $item) {
            echo "<tr>";
            echo "<td class='w-100 hidden'>";
            echo "<img src='$item->image' class='img-responsive'/>";
            echo "</td>";
            echo "<td class=''>";
            echo $str . "" . $item->title;
            echo "</td>";
            echo "<td>";
            echo $item->slug;
            echo "</td>";
            echo "<td class='text-center'>";
            echo $item->is_published == 'on' ? "<a role='button' class='btn btn-success btn-xs'><i class='fa fa-check-square-o'></i></a>" : "<a role='button' class='btn btn-danger btn-xs'><i class='fa fa-fw fa-close'></i></a>";
            echo "</td>";
            echo "<td>";
            echo "$item->created_at ";
            echo "</td>";
            echo "<td class='w-100 text-center'>";
            if ($type == 'products') {
                echo "<a href='" . route('products.cate.show', $item->id) . "' class='btn btn-success btn-xs'>";
            } else {
                echo "<a href='" . route('post.cate.show', $item->id) . "' class='btn btn-success btn-xs'>";
            }
            echo "<i class='fa fa-fw fa-edit'></i>";
            echo "</a>&nbsp;";
            if ($type == 'products') {
                echo "<a onclick='return confirmDelete();return false;' href='" . route('products.cate.destroy', $item->id) . "' class='btn btn-danger btn-xs'>";
            } else {
                echo "<a onclick='return confirmDelete();return false;' href='" . route('post.cate.destroy', $item->id) . "' class='btn btn-danger btn-xs'>";
            }
            echo "<i class='fa fa-fw fa-trash'></i>";
            echo "</a>";
            echo "</td>";
            echo "</tr>";
            admin_ShowPostCate($item->id, $str . "-- ", $type);
        }
    }
}

function admin_PostCateSelect($parent = 0, $str = "", $select = 0, $type = '')
{
    if ($type != 'post') {
        $data = \App\Models\ProductsCate::where('parent_id', $parent)->orderBy('id', 'desc')->get();
    } else {
        $data = \App\Models\Categories::where('parent_id', $parent)->orderBy('id', 'desc')->get();
    }
    if (isset($data) && !empty($data)) {
        foreach ($data as $item) {
            if ($select == $item->id) {
                $selected = "selected";
            } else {
                $selected = "";
            }
            echo "<option value='$item->id' " . $selected . ">";
            echo $str . "" . $item->title;
            echo "</option>";
            admin_PostCateSelect($item->id, $str . "-- ", $select, $type);
        }
    }
}

function categories($parent = 0, $str = "", $param = "", $type = '')
{
    if ($type != 'post') {
        $cate = \App\Models\ProductsCate::where('parent_id', $parent)->orderBy('id', 'desc')->get();
    } else {
        $cate = \App\Models\Categories::where('parent_id', $parent)->orderBy('id', 'desc')->get();
    }
    if (isset($cate) && !empty($cate)) {
        foreach ($cate as $id => $item) {
            $check = "";
            if (isset($param) && !empty($param)) {
                if (in_array($item->id, $param, TRUE)) {
                    $check = "checked";
                }
            }
            echo "<div class='checkbox'>";
            echo "<label>";
            echo $str . "<input type='checkbox' name='products_to_cate[]' value='" . $item->id . "' " . $check . ">" . $item->title;
            echo "</label>";
            echo "</div>";
            categories($item->id, $str . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;", $param, $type);
        }
    }
}

function getLocaleValue($value, $localeCode = null)
{
    if ($localeCode == null) {
        $localeCode = LaravelLocalization::getCurrentLocale();
    }

    $pattern = "/\[:{$localeCode}\]([^\[]+)\[:/";
    preg_match($pattern, $value, $matches);

    if (isset($matches[1])) {
        return $matches[1];
    } else {
        return '';
    }
}