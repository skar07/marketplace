@extends('layouts.app')

@section('content')
<div class="container text-center">
	<div class="row">
		@foreach($products as $product)
			<div class='col-4'>
				<div class="card">
					<img class="card-img-top" src="{{ asset('default-image.jpg') }}"" alt="Card image cap">
					<div class="card-body">
						<h4 class="card-title">{{ $product -> title }}</h4>
						<p class="card-text">{{ $product -> description }}</p>
					</div>
					<div class="card-body">
						<p class="card-text">Price: ${{ $product -> price }}</p>
						<a href="{{ route('cart.add', $product->id) }}" class="card-link">Add to Cart</a>
					</div>
				</div>
			</div>
		@endforeach
	</div>
</div>
@endsection
