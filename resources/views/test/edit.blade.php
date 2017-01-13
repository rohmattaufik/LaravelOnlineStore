Edit Products
<br>
<br>


<form class="" action="/products/{{$product->id}}" method="post">
  <input type="text" name="title" value="{{$product->title}}" placeholder="title product"><br>
  <input type="text" name="kategory" value="{{$product->kategory}}" placeholder="kategori product"><br>
  <textarea name="desc" rows="8" cols="80">{{$product->desc}}</textarea><br>
  <input type="number" name="stock" value="{{$product->stock}}" placeholder="stock"><br>
  <input type="number" name="price" value="{{$product->price}}" placeholder="price"><br>
  <input type="text" name="image" value="{{$product->image}}" placeholder="image"><br>

  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="_method" value="put">

  <input type="submit" name="name" value="post">
</form>
