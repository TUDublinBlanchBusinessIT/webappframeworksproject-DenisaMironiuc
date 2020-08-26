@extends('layouts.app') 
@section('content') 
<H2>Place Order</h2> 
{{ Form::open(array('url' => 'scorders/placeorder', 'method' => 'post')) }} 
@csrf <table class="table table-condensed table-bordered"> 
    <thead> 
        <tr><th>Id</th><th>Name</th><th>Description</th><th>Details</th><th>Price</th><th>Quantity</th>
        </tr>
    </thead> 
    <tbody> 
    @php $ttlCost=0; $ttlQty=0;@endphp 
    @foreach ($lineitems as $lineitem) 
        @php $product=$lineitem['product']; @endphp 
        <tr> 
            <td><input size="3" style="border:none" type="text" name="productid[]" readonly value="{{ $product->id }}"></td> 
              <td>{{ $product->name }}</td> 
              <td>{{ $product->description }}</td> 
              <td>{{ $product->details }}</td> 
              <td><div class="price "><a>$</a>{{ $product->price }}</div></td> 
              <td> <input size="3" style="border:none" class="qty" type="text" name="quantity[]" readonly value="<?php echo $lineitem['qty'] ?>"> </td> 
              <td> 
                  <button type="button" class="btn btn-default add"><span class="glyphicon glyphicon-plus"></span></button> 
                  <button type="button" class="btn btn-default subtract"><span class="glyphicon glyphicon-minus"></span></button> 
                  <button type="button" class="btn btn-default" value="remove" onClick="$(this).closest('tr').remove();"><span class="glyphicon glyphicon-remove"></span></button> 
              </td>
              @php $ttlQty = $ttlQty + $lineitem['qty']; $ttlCost = $ttlCost + ($product->price*$lineitem['qty']);
              @endphp 
        </tr> 
       
    @endforeach
   
    <tr>
        <td>  @php  echo '<b>Total to pay: </b>' . $ttlCost . '$' @endphp</td>
        <td>  @php  echo '<b>Total cars buyed: </b>' . $ttlQty @endphp cars</td>
    </tr>
    </tbody> 
</table> 

<button type="submit" class="btn btn-primary">Submit</button> {{ Form::close() }} 
@endsection 