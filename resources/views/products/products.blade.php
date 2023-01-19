@extends('layouts.app')

@section('content')
<h2>Producten</h2>

@if(Auth::user()?->admin == 1)
<a href="{{route('create')}}">Create</a>
@endif

<form method="get" action="{{url('/search')}}">
    <input type="text" name="search" placeholder="Zoek">
</form>

<form method="get" action="{{url('/filter')}}">
    <select name="filter">
        @foreach($products as $product)
            <option value="{{$product->price}}">{{$product->price}}</option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-primary">Zoek</button>
</form>


@foreach ($products as $product)

    <li>naam: {{$product['name']}}</li>
    <li>prijs: €{{$product['price']}}</li>
    <a href="{{route('buy')}}">Kopen!</a>

    @if(Auth::user()?->admin == 1)
    <a href="{{route('deleteProduct', ['id' => $product['id']])}}">delete</a>
    <a href="{{route('editProduct', ['id' => $product['id']])}}" >edit</a>
    @endif

@endforeach



@endsection
