@extends('layouts.app')
@section('title', 'Booking')
@section('content')
@include('online-booking.mua.cover-partner')

<!--===== STEP 2 : PILIH TANGGAL BOOKING ====-->

<section class="innerpage-wrapper">
    <div id="booking" class="innerpage-section-padding">
        <div class="container">
            <div class="row">
                @include('online-booking.mua.package-info')
                <form role="form" action="{{ route('pg.submit.step4') }}" method="post" enctype="multipart/form-data" class="lg-booking-form">
                {{ csrf_field() }}
                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 content-side">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h4>Pesanan-KU</h4></div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12  user-detail">
                                    <br>
                                      <div class="row">
                                        <div class="col-md-12">
                                          @foreach($detail_pesanan as $data)
                                           @include('online-booking.pg.table-detail-pesanan')
                                          @endforeach
                                        </div>
                                      </div>         
                                    </div>
                                </div>

                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="alert alert-warning">
                                      <b>Cek Ketersediaan</b> akan dilakukan pada <b>Jam Operasional {{$partner->pr_name}}</b> dari Pukul <b>{{$partner->open_hour}}:00 - {{$partner->close_hour - 1}}:00 WIB</b>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        </div>
                    <div class="lg-booking-form">
                        <div class="checkbox col-xs-12 col-sm-12 col-md-8 col-lg-8"  >
                            <label> By continuing, you are agree to the <a href="{{ route('term') }}">Terms & Condition</a></label>
                        </div><!-- end checkbox -->
                        <input type="text" name="booking_id" value="{{$booking_id}}" hidden="">
                        <div class="checkbox col-xs-12 col-sm-12 col-md-4 col-lg-4"  >
                            <button type="submit" class="btn btn-orange" style="float: right;">Cek Ketersediaan</button>
                        </div>
                    </div> 
                </div><!-- end columns -->
                </form> 
            </div>
        </div><!-- end container -->         
    </div><!-- end flight-booking -->
</section>

@include('layouts.footer')
@endsection


