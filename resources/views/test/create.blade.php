Create Products
<br>
<br>


<form class="" action="/products" method="post">
  <input type="text" name="title" placeholder="title product"><br>
  <input type="text" name="kategory" placeholder="kategori product"><br>
  <textarea name="desc" rows="8" cols="80"></textarea><br>
  <input type="number" name="stock" value="" placeholder="stock"><br>
  <input type="number" name="price" value="" placeholder="price"><br>
  <input type="text" name="image" value="" placeholder="image"><br>

  <input type="hidden" name="_token" value="{{ csrf_token() }}">

  <input type="submit" name="name" value="post">
</form>
