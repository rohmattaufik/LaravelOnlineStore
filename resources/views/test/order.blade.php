ALl Orders
<br>
<br>

@foreach ($orders as $order)
  <a href="/order/order_number/{{ $order['order_number']}}">{{ $order['order_number']}}</a> -- {{$order['nama_penerima']}}
  <hr>
@endforeach
