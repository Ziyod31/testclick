@extends('layouts.welcome')

@section('content')
<form  method="post" enctype="multipart/form-data"
@isset($product)
action="{{ route('products.update', $product) }}"
@else
action="{{ route('products.store') }}"
@endisset>
@isset($product)
@method('PUT')
@endisset
@csrf	
@isset($product)
<h3>Редактировать продукт {{$product->name}}</h3>
@else
<h3>Создать Продукт</h3>
@endisset
<div class="mb-3">
	<select class="form-control" id="category_id" name="category_id">
		@foreach($categories as $category)
		<option value="{{ $category->id }}"
			@isset($product)
			@if($product->category_id == $category->id)
			selected
			@endif
			@endisset
			>
			{{ $category->name }}
		</option>
		@endforeach
	</select>
</div>
<div class="mb-3">
	<input type="text" class="form-control" name="name" value="{{ old('name', isset($product) ? $product->name : null) }}">
</div>
<div class="mb-3">
	<textarea class="form-control" name="description">@isset($product) {{ $product->description}} @endisset</textarea>
</div>
<div class="mb-3">
	<input type="number" class="form-control" name="price" value="{{ old('price', isset($product) ? $product->price : null) }}">
</div>
<div class="mb-3">
	<input type="file" name="photo" value="@isset($product) {{ $product->photo}} @endisset">
</div>

<input type="submit" value="Сохранить" class="btn btn-outline-success">
</form>
@endsection