Shopping Cart
<br>
<br>

@foreach ($products as $product)
<p>{{ $product['item']['title']}} -
{{ $product['qty']}} items @
{{ $product['item']['price']}} per items
</p>
@endforeach
<br>
Total Price = {{ $totalPrice}}
