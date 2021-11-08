@extends('layouts.welcome')
@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header"><h2>{{ $product->name }}</h2></div>
			<div class="card-body">
				<div class="card-img img-max" style="background-image: url({{$product->photo ?? asset('storage/default.jpg')}} )"></div>
				<div class="card-price"><h3>Категория: {{$product->category->name}}</h3></div>
				<div class="card-price"><b>Описание: </b>{{$product->description}}</div>
				<div class="card-price"><b>Цена: </b>{{$product->price}}</div>
				<div class="card-price"><b>Продавец: </b>{{$product->user->name}}</div>
				<div class="card-price"><b>Дата создание: </b>{{$product->created_at->diffForHumans()}}</div><br>
				<div class="card-btn">
					<a href="{{ route('products.index') }}" class="btn btn-outline-primary">Назад</a>
					@auth
					@if(Auth::user()->id == $product->user_id)
					<a href="{{ route('products.edit', $product) }}" class="btn btn-outline-warning">Редактировать</a>
					<form action="{{ route('products.destroy', $product) }}" method="post" onsubmit="return confirm('Вы уверены?')">
						@csrf
						@method('DELETE')
						<input type="submit" class="btn btn-danger" value="Удалить">
					</form>
					@endif
					@endauth
				</div>
			</div>
		</div>
	</div>
</div>
@endsection