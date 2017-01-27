Orders
<br>
<br>

Order number = {{$order['id']}} <br>
Nama penerima = {{$order['nama_penerima']}} <br>
Alamat = {{$order['alamat']}} <br>
Kode pos = {{$order['kode_pos']}} <br>
<br>
Produk yang dibeli : <br>
<?php
$total = 0;
?>
@foreach ($items as $item)
  {{$item['product_name']}} --- {{$item['quantity']}} --- {{$item['price']}} --- {{$item['quantity'] * $item['price']}}
  <?php
  $total = $total + ($item['quantity'] * $item['price']);
   ?>
  <hr>
@endforeach
Total : {{ $total }}
