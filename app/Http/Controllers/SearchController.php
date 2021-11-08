<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SearchController extends Controller
{
  public function search(Request $request){

     $search = $request->input('search');

     $products = Product::query()
     ->where('name', 'LIKE', '%' . $request->search . '%')
     ->orWhere('description', 'LIKE', '%' . $request->search . '%')
     ->orWhere('price', 'LIKE', '%' . $request->search . '%')
     ->get();

     return view('layouts.search', compact('products'));
  }

  public function logout()
  {
    Auth::logout();
    return redirect('/');
 }

}
