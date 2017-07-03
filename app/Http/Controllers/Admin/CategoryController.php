<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Entity\Category;

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


}