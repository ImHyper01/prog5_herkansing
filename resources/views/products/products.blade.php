@extends('layouts.app')

@section('content')
<h2>Producten</h2>

@foreach ($products as $product)
    <li>naam: {{$product['name']}}</li>
    <li>prijs: €{{$product['price']}}</li>
@endforeach








@endsection
