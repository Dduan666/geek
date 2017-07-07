<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Entity\Category;


class ProductController extends Controller
{
    public function toProduct()
    {
        $products = Category::all();

        return view('admin.product') -> with('products', $products);

    }

    public function toProductAdd()
    {
        return view('admin.product_add');
    }

}