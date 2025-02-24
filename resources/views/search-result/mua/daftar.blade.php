@extends('layouts.master-studio')
@section('title', 'Make Up Artist')
@section('content')
<section class="innerpage-wrapper">
    <div id="search-result-page" class="top-section-padding">
        <div class="container"></div>
    </div>
</section>

<section class="innerpage-wrapper">
    <div id="hotel-listing" class="bottom-padding">
        <div class="container">
            <div class="row">     

                <div class="col-xs-12 col-sm-12 col-md-4 side-bar left-side-bar" >
                    <div class="col-xs-12 col-sm-12 col-md-12">            
                        <div class="side-bar-block filter-block ">
                            <h3>Filter Harga</h3>
                            <br>
                            <form role="form" action="{{ route('search.fotografer') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                             @include('search-result.mua.filterpaket')   
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 content-side">
                    <div class="col-sm-12 col-md-12">
                        <h3><b>Make up Artist</b></h3> 
                    </div>
                    <div class="col-sm-12 col-md-12">
                        @if(empty($tema->type_name))
                        <h3><b><span style="color: #FF0073;">Semua </span> Fotografer di <span style="color: #FF0073;">Kota Surabaya</span></b></h3>
                        @else
                        <h3><b><span style="color: #FF0073;">{{$tema->type_name}}</span> di <span style="color: #FF0073;">Kota Surabaya</span></b></h3> 
                        @endif
                        @if(Auth::check())
                        <small>Harga yang tercantum adalah harga minimum paket.</small> 
                        @else
                        <small>Harga hanya dapat dilhat jika sudah melakukan login.</small> 
                        @endif
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 content-side" >
                    @foreach($allThemes as $data)
                    <div class="col-sm-6 col-md-4">
                        @include('search-result.mua.paket')
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</section>
@include('layouts.footer')
@endsection

@section('script')
<script type="text/javascript">
    $('input.number').keyup(function(event) {

      // skip for arrow keys
      if(event.which >= 37 && event.which <= 40) return;

      // format number
      $(this).val(function(index, value) {
        return value
        .replace(/\D/g, "")
        .replace(/\B(?=(\d{3})+(?!\d))/g, ".")
        ;
      });
    });
</script>
@endsection