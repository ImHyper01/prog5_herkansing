@extends('layouts.app')

@section('content')
<h2>Producten</h2>
<a href="{{route('create')}}">Create</a>

@foreach ($products as $product)

    <li>naam: {{$product['name']}}</li>
    <li>prijs: €{{$product['price']}}</li>

    <a href="{{route('deleteProduct', ['id' => $product['id']])}}">delete</a>
    <a href="{{route('editProduct', ['id' => $product['id']])}}" >edit</a>

@endforeach



@endsection
