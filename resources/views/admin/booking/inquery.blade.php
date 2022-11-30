@extends('admin.master')
@section('content')
<div class="container-fluid py-4">
<table class="table" id="usertable">
    <thead>
      <tr>
        <th scope="col">Inquiry Number</th>
        <th scope="col">Customer Details</th>
        <th scope="col">Service/Item</th>
        <th scope="col">Total Price</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)

      <tr>
        <th scope="row">{{ $order->inquery_id }}</th>

        <td>{{ $order->customer_name }}<br/>
            {{ $order->customer_email }} <br/>
            {{ $order->customer_phone }} <br/>
        </td>

        <td>
            {{ $order->cat_name }}
        <br/>
            {{ $order->s_name}}<br/>

        </td>
        <td>
            {{ $order->grand_total}}
        </td>
        <td>
            <select class="custom-select">
                <option value="pending">IN PROGRESS</option>
                <option value="pending">APPROVED</option>
                <option value="pending">COMPLETED</option>
                <option value="pending">PENDING</option>
                <option value="pending">CANCEL</option>
            </select>
        </td>
        <td>
            <button class="btn btn-outline-success" type="submit">View</button>
        </td>
      </tr>

      @endforeach
    </tbody>
  </table>
</div>

@endsection
@section('footer_js')
<script>
    $(document).ready( function () {
    $('#usertable').DataTable();
});
</script>
@endsection

