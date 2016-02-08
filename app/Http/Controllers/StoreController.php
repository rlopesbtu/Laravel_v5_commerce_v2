<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Category;

use Illuminate\Http\Request;

class StoreController extends Controller
{

	public function index()
    {
        $categories = Category::all();
        return view('store.index',compact('categories'));
    }

}
