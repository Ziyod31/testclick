@extends('layouts.welcome')
@section('content')

<div class="row">
  <div class="col-2">
    <a href="{{ route('categories.create') }}" class="btn btn-outline-success">Создать Категорию</a>
  </div>
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Название</th>
      <th scope="col">Действие</th>
    </tr>
  </thead>
  <tbody>
   @foreach($categories as $category)
   <tr>
    <th scope="row">{{$category->id}}</th>
    <td>{{$category->name}}</td>
    <td class="flex">
      <a href="{{ route('categories.show', $category) }}" class="btn btn-outline-primary">Показать</a>
      @if(Auth::user()->id == $category->user_id)
      <a href="{{ route('categories.edit', $category) }}" class="btn btn-outline-warning">Редактировать</a>
      <form action="{{ route('categories.destroy', $category) }}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" class="btn btn-danger" value="Удалить">
      </form>
      @endif
    </td>
  </tr>
  @endforeach
</tbody>
</table>
@endsection