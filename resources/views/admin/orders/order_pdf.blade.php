<h1>Order List</h1>
<table>
  <thead>
    <tr>
      <th>S No.</th>
      <th>Order Id</th>
      <th>Order Status</th>
      <th>Order Date</th>
      <th>Customer Name</th>
      <th>Address</th>
      <th>City</th>
      <th>State</th>
      <th>ZipCode</th>
      <th>Mobile</th>
      <th>Order Total</th>
    </tr>
  </thead>
  <tbody>
    @php $i= 1;
    @endphp
    @foreach($orders as $key => $order)
      <tr>
        <td>{{ $i }}</td>
        <td>{{ $order->order_id ?? ''}}</td>
        <td>{{ $order->order_status ?? ''}}</td>
        <td>{{ $order->order_date ?? ''}}</td>
        <td>{{ $order->user->first_name ?? ''}} {{$order->user->last_name ?? ''}}</td>
        <td>{{ $order->user->address_line_1.' '.$order->user->address_line_2}}</td>
        <td>{{ $order->user->city ?? ''}}</td>
        <td>{{ $order->user->state ?? ''}}</td>
        <td>{{ $order->user->zip_code ?? ''}}</td>
        <td>{{ $order->user->phone ?? ''}}</td>
        <td>{{ $order->order_total ?? ''}}</td>
      </tr>
      @php $i++;
    @endphp
    @endforeach
  </tbody>
</table>