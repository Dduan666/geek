<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Entity\Category;
use Illuminate\Http\Request;
use App\Models\M3Result;

use Log;

class CategoryController extends Controller
{
    public function toCategory()
    {
        $categories = Category::all();
        foreach ($categories as $category) {
            if ($category -> parent_id != null && $category -> parent_id != '') {
                $category -> parent = Category::find($category->parent_id);
            }
        }
        return view('admin.category') -> with('categories', $categories);
    }

    public function toCategoryAdd()
    {
        $categories = Category::wherenull('parent_id') -> get();
        return view('admin.category_add') -> with('categories', $categories);
    }
                    /************************service***************************/
    public function CategoryAdd(Request $request)
    {
        Log::info('添加类别');
        $name = $request -> input('name', '');
        $numer = $request -> input('number', '');
        $parent_id = $request -> input('parent_id', '');
        $preview = $request -> input('preview', '');

        $category = new Category;
        $category -> name = $name;
        $category -> number = $numer;
        if ($parent_id == '') {
            $category -> parent_id = $parent_id;
        }
        $category -> save();

        $m3_result = new M3Result;
        $m3_result -> status = 0;
        $m3_result -> message = '添加成功';

        return $m3_result -> toJson();


    }


}