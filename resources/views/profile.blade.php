@extends('layouts.app')
@section('header')
<link rel="stylesheet" href="{{ asset('bootstrap/css/custom.css') }}" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('bootstrap/css/popup.css') }}" crossorigin="anonymous">
@endsection

@section('content')
<section class="header_text sub">
  <img class="pageBanner" src="themes/images/pageBanner.png" alt="New products" >
  <h4><span>User Profile</span></h4>
</section class="main-content"> 
<section class="main-content">              
  <div class="row">                       
    <div class="accordion" id="accordion2">
      <div style="margin-left: 50%;" class="span6">
        @include('inc.message')
       <h4 class="title"><span class="text"><strong>My</strong> Order(s)</span></h4>
       <div class="block">
        <table  class="table table-striped">
          <thead>
            <tr> 
              <th>Product Name</th>
              <th>Quantity(s)</th>
              <th>Unit Price</th>
              <th>Total Price</th>
              <th>Remove</th>
            </tr>
          </thead>
          <tbody>
           @foreach ($orders as $order)
           @foreach ($order->cart->items as $item)
           <tr>
            <td>{{ $item['item']['name'] }} </td>

            <td>{{ $item['qty'] }}</td>

            <td>{{ money_format('$%i', $item['price'] / 364)}}</td>

            <td>{{ money_format('$%i', $order->discount / 100) }}</td>
            <td><form method="POST" action="{{ route('profile.delete', $order->id) }}">
              {{ csrf_field() }}
              {{ method_field('delete')}}
              <a class="btn btn-danger trigger_popup_fricc">Remove</a>
             
              <div class=" hover_bkgr_fricc">
                <span class="helper"></span>
                <div>
                  <div  class="popupCloseButton">X</div>
                  <p><h4>Are you sure you want to remove this product?</h4><br />
                    <button class="btn btn-reverse" type="submit">Yes</button>&emsp;
                    <a class="btn btn-reverse" style="display:  inline;">No</a>
                  </p>
                </div>
              </div>
           
            </form></td>
          </tr>
          @endforeach
          @endforeach
        </tbody>
      </table>   
    </div>
  </div>
</div>
</div>
</section>

@endsection
@section('footer')
<script>
  $(window).load(function () {
    $(".trigger_popup_fricc").click(function(){
     $('.hover_bkgr_fricc').show();
   });
    $('.hover_bkgr_fricc').click(function(){
      $('.hover_bkgr_fricc').hide();
    });
    $('.popupCloseButton').click(function(){
      $('.hover_bkgr_fricc').hide();
    });
  });
</script>
@endsection
