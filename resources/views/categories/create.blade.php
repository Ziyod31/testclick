@extends('layouts.welcome')

@section('content')
<form  method="post"
@isset($category)
action="{{ route('categories.update', $category) }}"
@else
action="{{ route('categories.store') }}"
@endisset>
@isset($category)
@method('PUT')
@endisset
@csrf	
@isset($category)
<h3>Редактировать продукт {{$category->name}}</h3>
@else
<h3>Создать Категорию</h3>
@endisset

<div class="mb-3">
	<input type="text" class="form-control" name="name" value="{{ old('name', isset($category) ? $category->name : null) }}">
</div>

<input type="submit" value="Сохранить" class="btn btn-outline-success">
</form>
@endsection