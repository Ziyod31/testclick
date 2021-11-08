@extends('layouts.welcome')
@section('content')

<table class="table">
	<thead>
		<tr>
			<th scope="col">ID</th>
			<th scope="col">Название</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<th scope="row">{{$category->id}}</th>
			<td>{{$category->name}}</td>
		</tr>
	</tbody>
</table>
@endsection