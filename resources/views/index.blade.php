@extends('components.components')
@section('necessairy')
<h1 class="display-1">Hello Mr.{{$User->name}}</h1>
@foreach($Products as $product){
    <div class="card mb-4" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text">Price: <strong>{{$product->prix}}  $</strong></p>
          <a href="{{ route('buy', ['user' => $User->id, 'product' => $product->id]) }}" class="btn btn-success">Buy</a>

            <a href="{{ route('show', $product->id) }}" class="btn btn-primary">Show Details</a>
        </div>
    </div>
     @endforeach
}

@endsection