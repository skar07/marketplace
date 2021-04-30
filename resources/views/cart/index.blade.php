@extends('layouts.app')

	@section('content')

		<table class='table'>
			<thead>
				<tr>
					<th>Name</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Action</h1>
				</tr>
			</thead>
			<tbody>
				@foreach($cartItems as $items)
					<tr>
						<td scope='row'>{{ $items -> name }}</td>
						<td>{{ \Cart::session(auth() -> id()) -> get($items -> id) -> getPriceSum() }}</td>
						<td>
							<form action="{{ route('cart.update', $items->id) }}">
								<input type='number' value= {{ $items -> quantity }}>
								<input type='submit' value='Save'>
							</form>
						</td>
						<td>
							<a href="{{ route('cart.delete', $items->id) }}">Delete</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	<h3>
		Total amount: ${{ Cart::session(auth() -> id())->getTotal() }}
	</h3>
	<a name="" id="" class="btn btn-primary" href="{{ route('cart.checkout') }}" role="button">Proceed to Checkout</a>
	@endsection
