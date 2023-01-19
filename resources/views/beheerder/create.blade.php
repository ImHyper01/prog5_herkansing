@extends('layouts.app')

@section('content')
<form action="{{route('create.post')}}" method="post">
    @csrf {{ csrf_field() }}
    <label for="title">name</label>
    <input type="text" name="name">
    <label for="body">price</label>
    <input type="number" name="price">
    <button>Create</button>
</form>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@endsection
