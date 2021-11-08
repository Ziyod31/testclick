<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('products.created_at','desc')
        ->paginate(4);
        return view('index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = new Product();
        $product->user_id = \Auth::user()->id;
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;

        if($request->file('photo')){
            $path = Storage::putFile('public', $request->file('photo'));
            $url = Storage::url($path);
            $product->photo = $url;
        }

        $product->save();

        return redirect('/')->with('success', 'Продукт успешно создан!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::get();
        if($products->user_id != \Auth::user()->id) {
            return redirect('/')->withErrors('Вы не можете редактировать данный пост !');
        }
        return view('products.create', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
       $params = $request->all();

       if($products->user_id != \Auth::user()->id) {
        return redirect('/')->withErrors('Вы не можете редактировать данный пост !');
    }

    unset($params['photo']);
    if($request->file('photo')){
        $path = Storage::putFile('public', $request->file('photo'));
        $url = Storage::url($path);
        $product->photo = $url;
    }

    $product->update($params);

    return redirect()->route('products.show', $product)->with('success', 'Продукт успешно отредактирован!');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete($product);

        if($products->user_id != \Auth::user()->id) {
            return redirect('/')->withErrors('Вы не можете удалить данный пост !');
        }

        return redirect('/')->with('success', 'Продукт был удален !');
    }
}
