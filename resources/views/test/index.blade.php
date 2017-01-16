ALl Products
<br>

<a href="/product/cart">
Shopping cart = {{ Session::has('cart') ? Session::get('cart')->totalQty : '0' }}
</a>

<br>


@foreach ($products as $product)
  <a href="/products/{{$product->slug}}">{{ $product->title}}</a><br>
  <a href="/products/{{$product->id}}/edit">edit</a>
  <form class="" action="products/{{$product->id}}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_method" value="delete">

    <input type="submit" name="name" value="delete">
  </form>
  <a href="/product/cart/{{$product->id}}">Beli</a>
<hr>
@endforeach
