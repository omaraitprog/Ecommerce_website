@extends('components.components')
@section('necessairy')
<style>
    body {
        background: linear-gradient(135deg, #f8fafc 0%, #e0e7ff 100%);
        min-height: 100vh;
    }
    .greeting {
        background: linear-gradient(90deg, #6366f1 0%, #06b6d4 100%);
        color: #fff;
        border-radius: 1rem;
        padding: 2rem 3rem;
        box-shadow: 0 4px 24px rgba(99,102,241,0.15);
        margin-bottom: 2rem;
        text-shadow: 1px 1px 8px #0002;
    }
    .product-card {
        background: #fff;
        border: none;
        border-radius: 1.5rem;
        box-shadow: 0 2px 16px rgba(0,0,0,0.07);
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .product-card:hover {
        transform: translateY(-8px) scale(1.03);
        box-shadow: 0 8px 32px rgba(99,102,241,0.15);
    }
    .btn-success {
        background: linear-gradient(90deg, #22d3ee 0%, #22c55e 100%);
        border: none;
    }
    .btn-primary {
        background: linear-gradient(90deg, #6366f1 0%, #818cf8 100%);
        border: none;
    }
</style>

<div class="container py-5">
    <div class="greeting text-center mb-5">
        <h1 class="display-3 fw-bold mb-0">Hello Mr. {{ $User->name }}</h1>
        <p class="lead mt-2">Welcome back! Check out our latest products below.</p>
    </div>
 <a href="{{ route('create_produit', ['user' => $User->id]) }}" class="btn btn-primary flex-fill">Create new Product</a>

    <div class="row g-4 justify-content-center">
        @foreach($Products as $product)
            <div class="col-md-4 col-lg-3">
                <div class="card product-card h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold text-primary">{{ $product->name }}</h5>
                        <p class="card-text mb-4">Price: <strong class="text-success">${{ $product->prix }}</strong></p>
                        <div class="mt-auto d-flex gap-2">
                            <a href="{{ route('buy', ['user' => $User->id, 'product' => $product->id]) }}" class="btn btn-success flex-fill">Buy</a>
                            <a href="{{ route('show', ['user' => $User->id, 'product' => $product->id]) }}" class="btn btn-primary flex-fill">Show Details</a>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        
    </div>
</div>
@endsection