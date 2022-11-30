@extends('admin.master')
@section('content')

<div class="container-fluid py-4">
    <table class="table" id="usertable">
        <thead>
          <tr>
            <th scope="col">Order Number</th>
            <th scope="col">Customer Details</th>
            <th scope="col">Date / Time</th>
            <th scope="col">Service/Item</th>
            <th scope="col">Total Price</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)

          <tr>
            <th scope="row">{{ $order->order_number }}</th>

            <td>{{ $order->billing_fullname }}<br/>
                {{ $order->billing_phone }} <br/>
            </td>
            <td>{{ $order->date }}<br/>
                {{ $order->time }} <br/>
            </td>
            <td>
            @foreach ($order->items as $item)
                {{ $item->s_name }}
            @endforeach
            <br/>
                {{ $order->item_count}}
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
               <a class="btn btn-outline-success" href="{{ url('admin/booking/invoice', $order->order_number) }}" type="submit">Invoice</a>
            </td>
          </tr>

          @endforeach
        </tbody>
</div>

@endsection
@section('footer_js')
<script>
    $(document).ready( function () {
    $('#usertable').DataTable();
});
</script>
@endsection

