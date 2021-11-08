@extends('layouts.welcome')
@section('content')
@if($products->isNotEmpty())
<div class="row">

    @foreach($products as $product)
    <div class="col-6">
        <div class="card">
            <div class="card-header"><h2>{{ $product->name }}</h2></div>
            <div class="card-body">
                <div class="card-img" style="background-image: url({{$product->photo}})"></div>
                <div class="card-price"><h3>Категория: {{$product->category->name}}</h3></div>
                <div class="card-price">Цена: {{$product->price}}</div>
                <div class="card-price">Продавец: {{$product->user->name}}</div>
                <a href="" class="btn btn-outline-primary">Посмотреть продукт</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

@else
<div class="row">
    <div class="card-header"><h2>Ничего не найдено</h2></div>
</div>
@endif
@endsection