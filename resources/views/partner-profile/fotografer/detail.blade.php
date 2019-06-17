@extends('layouts.app')
@section('title', 'Partner-Ku Profile')
@section('content')
@foreach($detail as $data)
<section class="page-cover " id="cover-hotel-detail" style="margin-top: 5.5%;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
              <div class="col-sm-12 col-md-2">
                <div id="abt-cnt-2-img">
                    @if(File::exists(public_path("logo/".$data->pr_logo.".jpg")))
                    <img src="{{ asset('logo/'.$data->pr_logo.'.jpg')  }}" class="img-responsive" alt="about-img" style="max-width: 100%; margin: 0 auto; float: none; display: block;position: relative; border-radius: 100%;" />
                    @elseif(File::exists(public_path("logo/".$data->pr_logo.".png")))
                    <img src="{{ asset('logo/'.$data->pr_logo.'.png')  }}" class="img-responsive" alt="about-img" style="max-width: 100%; margin: 0 auto; float: none; display: block;position: relative; border-radius: 100%;" />
                    @elseif(File::exists(public_path("logo/".$data->pr_logo.".jpeg")))
                    <img src="{{ asset('logo/'.$data->pr_logo.'.jpeg')  }}" class="img-responsive" alt="about-img" style="max-width: 100%; margin: 0 auto; float: none; display: block;position: relative; border-radius: 100%;" />
                    @elseif(File::exists(public_path("logo/".$data->pr_logo.".JPG")))
                    <img src="{{ asset('logo/'.$data->pr_logo.'.JPG')  }}" class="img-responsive" alt="about-img" style="max-width: 100%; margin: 0 auto; float: none; display: block;position: relative; border-radius: 100%;" />
                    @elseif(File::exists(public_path("logo/".$data->pr_logo.".PNG")))
                    <img src="{{ asset('logo/'.$data->pr_logo.'.PNG')  }}" class="img-responsive" alt="about-img" style="max-width: 100%; margin: 0 auto; float: none; display: block;position: relative; border-radius: 100%;" />
                    @elseif(File::exists(public_path("logo/".$data->pr_logo.".JPEG")))
                    <img src="{{ asset('logo/'.$data->pr_logo.'.JPEG')  }}" class="img-responsive" alt="about-img" style="max-width: 100%; margin: 0 auto; float: none; display: block;position: relative; border-radius: 100%;" />
                    @else
                    <img src="{{asset('dist/images/spot-logo.png')  }}" class="img-responsive" alt="about-img" style="max-width: 100%; margin: 0 auto; float: none; display: block;position: relative; border-radius: 100%;" />
                    @endif
                </div>
              </div>
              <div class="col-sm-12 col-md-10">
                <br><br>  
                <h1 class="page-title">{{$data->pr_name}}</h1>
                <!--@if(Auth::check())-->
                <!--<ul class="breadcrumb">-->
                <!--    <li class="active">{{$data->pr_addr}}, {{$data->pr_kel}}, {{$kecamatan->name}}, {{$kota->name}}, {{$provinsi->name}}, {{$data->pr_postal_code}}</li>-->
                <!--</ul>-->
                <!--@endif-->
              </div>
            </div><!-- end columns -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end page-cover -->

<section id="studio" class="section-padding">
            <!-- <div class="container"> -->
      <div class="row">
        <div class="col-sm-1 col-md-1"></div>
            <div class="col-sm-5 col-md-5">
                <div class="row">
                    <section id="thematic-offers" class="">
                            <div class="col-sm-12">
                                <div class="page-heading">
                                    <h2 style="font-family: 'Abel', sans-serif; font-size: 35px; background: linear-gradient(#FE9321, #FF6E6D);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;">Highlights</h2>
                                    <hr class="heading-line" />
                                </div><!-- end page-heading -->
                                
                                <div class="owl-carousel owl-theme owl-custom-arrow" id="owl-portofolio">
                                    @foreach($album as $listalbum)
                                        @if(!empty($listalbum->album_img_1))
                                        <div class="item">
                                            <div class="main-block hotel-block ">
                                                <div class=" main-img img-hover ">
                                                    @if(File::exists(public_path("album/".$listalbum->album_img_1.".jpg")))
                                                    <a href="{{ asset('album/'.$listalbum->album_img_1.'.jpg')  }}" title="image-1" class="with-caption gallery image-link">
                                                    <img style="width: 500px; height: auto;" class="img-responsive" src="{{ asset('album/'.$listalbum->album_img_1.'.jpg')  }}" alt= "Album / Portofolio Bisnis" />
                                                    </a>
                                                    @elseif(File::exists(public_path("album/".$listalbum->album_img_1.".png")))
                                                    <a href="{{ asset('album/'.$listalbum->album_img_1.'.png')  }}" title="image-1" class="with-caption gallery image-link">
                                                    <img style="width: 500px; height: auto;" class="img-responsive" src="{{ asset('album/'.$listalbum->album_img_1.'.jpg')  }}" alt= "Album / Portofolio Bisnis" />
                                                    </a>
                                                    @elseif(File::exists(public_path("album/".$listalbum->album_img_1.".jpeg")))
                                                    <a href="{{ asset('album/'.$listalbum->album_img_1.'.jpeg')  }}" title="image-1" class="with-caption gallery image-link">
                                                    <img style="width: 500px; height: auto;" class="img-responsive" src="{{ asset('album/'.$listalbum->album_img_1.'.jpg')  }}" alt= "Album / Portofolio Bisnis" />
                                                    @elseif(File::exists(public_path("album/".$listalbum->album_img_1.".JPG")))
                                                    <a href="{{ asset('album/'.$listalbum->album_img_1.'.JPG')  }}" title="image-1" class="with-caption gallery image-link">
                                                    <img style="width: 500px; height: auto;" class="img-responsive" src="{{ asset('album/'.$listalbum->album_img_1.'.JPG')  }}" alt= "Album / Portofolio Bisnis" />
                                                    @elseif(File::exists(public_path("album/".$listalbum->album_img_1.".JPEG")))
                                                    <a href="{{ asset('album/'.$listalbum->album_img_1.'.JPEG')  }}" title="image-1" class="with-caption gallery image-link">
                                                    <img style="width: 500px; height: auto;" class="img-responsive" src="{{ asset('album/'.$listalbum->album_img_1.'.JPEG')  }}" alt= "Album / Portofolio Bisnis" />
                                                    @elseif(File::exists(public_path("album/".$listalbum->album_img_1.".PNG")))
                                                    <a href="{{ asset('album/'.$listalbum->album_img_1.'.PNG')  }}" title="image-1" class="with-caption gallery image-link">
                                                    <img style="width: 500px; height: auto;" class="img-responsive" src="{{ asset('album/'.$listalbum->album_img_1.'.PNG')  }}" alt= "Album / Portofolio Bisnis" />
                                                    </a>
                                                    @endif
                                                </div>
                                            </div><!-- end hotel-block -->
                                        </div><!-- end item -->
                                        @endif
                                        @if(!empty($listalbum->album_img_2))
                                        <div class="item">
                                            <div class="main-block hotel-block ">
                                                <div class=" main-img img-hover">
                                                    @if(File::exists(public_path("album/".$listalbum->album_img_2.".jpg")))
                                                    <a href="{{ asset('album/'.$listalbum->album_img_2.'.jpg')  }}" title="image-2" class="with-caption gallery image-link">
                                                    <img style="width: 500px; height: auto;" class="img-responsive" src="{{ asset('album/'.$listalbum->album_img_2.'.jpg')  }}" alt= "Album / Portofolio Bisnis" />
                                                    </a>
                                                    @elseif(File::exists(public_path("album/".$listalbum->album_img_2.".png")))
                                                    <a href="{{ asset('album/'.$listalbum->album_img_2.'.png')  }}" title="image-2" class="with-caption gallery image-link">
                                                    <img style="width: 500px; height: auto;" class="img-responsive" src="{{ asset('album/'.$listalbum->album_img_2.'.jpg')  }}" alt= "Album / Portofolio Bisnis" />
                                                    </a>
                                                    @elseif(File::exists(public_path("album/".$listalbum->album_img_2.".jpeg")))
                                                    <a href="{{ asset('album/'.$listalbum->album_img_2.'.jpeg')  }}" title="image-2" class="with-caption gallery image-link">
                                                    <img style="width: 500px; height: auto;" class="img-responsive" src="{{ asset('album/'.$listalbum->album_img_2.'.jpg')  }}" alt= "Album / Portofolio Bisnis" />
                                                    </a>
                                                    @elseif(File::exists(public_path("album/".$listalbum->album_img_2.".JPG")))
                                                    <a href="{{ asset('album/'.$listalbum->album_img_2.'.JPG')  }}" title="image-2" class="with-caption gallery image-link">
                                                    <img style="width: 500px; height: auto;" class="img-responsive" src="{{ asset('album/'.$listalbum->album_img_2.'.JPG')  }}" alt= "Album / Portofolio Bisnis" />
                                                    @elseif(File::exists(public_path("album/".$listalbum->album_img_2.".JPEG")))
                                                    <a href="{{ asset('album/'.$listalbum->album_img_2.'.JPEG')  }}" title="image-2" class="with-caption gallery image-link">
                                                    <img style="width: 500px; height: auto;" class="img-responsive" src="{{ asset('album/'.$listalbum->album_img_2.'.JPEG')  }}" alt= "Album / Portofolio Bisnis" />
                                                    @elseif(File::exists(public_path("album/".$listalbum->album_img_2.".PNG")))
                                                    <a href="{{ asset('album/'.$listalbum->album_img_2.'.PNG')  }}" title="image-2" class="with-caption gallery image-link">
                                                    <img style="width: 500px; height: auto;" class="img-responsive" src="{{ asset('album/'.$listalbum->album_img_2.'.PNG')  }}" alt= "Album / Portofolio Bisnis" />
                                                    </a>
                                                    @endif
                                                </div>
                                            </div><!-- end hotel-block -->
                                        </div><!-- end item -->
                                        @endif
                                        @if(!empty($listalbum->album_img_3))
                                        <div class="item">
                                            <div class="main-block hotel-block ">
                                                <div class=" main-img img-hover">
                                                    @if(File::exists(public_path("album/".$listalbum->album_img_3.".jpg")))
                                                    <a href="{{ asset('album/'.$listalbum->album_img_3.'.jpg')  }}" title="image-3" class="with-caption gallery image-link">
                                                    <img style="width: 500px; height: auto;" class="img-responsive" src="{{ asset('album/'.$listalbum->album_img_3.'.jpg')  }}" alt= "Album / Portofolio Bisnis" />
                                                    </a>
                                                    @elseif(File::exists(public_path("album/".$listalbum->album_img_3.".png")))
                                                    <a href="{{ asset('album/'.$listalbum->album_img_3.'.png')  }}" title="image-3" class="with-caption gallery image-link">
                                                    <img style="width: 500px; height: auto;" class="img-responsive" src="{{ asset('album/'.$listalbum->album_img_3.'.jpg')  }}" alt= "Album / Portofolio Bisnis" />
                                                    </a>
                                                    @elseif(File::exists(public_path("album/".$listalbum->album_img_3.".jpeg")))
                                                    <a href="{{ asset('album/'.$listalbum->album_img_3.'.jpeg')  }}" title="image-3" class="with-caption gallery image-link">
                                                    <img style="width: 500px; height: auto;" class="img-responsive" src="{{ asset('album/'.$listalbum->album_img_3.'.jpg')  }}" alt= "Album / Portofolio Bisnis" />
                                                    </a>
                                                    @elseif(File::exists(public_path("album/".$listalbum->album_img_3.".JPG")))
                                                    <a href="{{ asset('album/'.$listalbum->album_img_3.'.JPG')  }}" title="image-3" class="with-caption gallery image-link">
                                                    <img style="width: 500px; height: auto;" class="img-responsive" src="{{ asset('album/'.$listalbum->album_img_3.'.JPG')  }}" alt= "Album / Portofolio Bisnis" />
                                                    @elseif(File::exists(public_path("album/".$listalbum->album_img_3.".JPEG")))
                                                    <a href="{{ asset('album/'.$listalbum->album_img_3.'.JPEG')  }}" title="image-3" class="with-caption gallery image-link">
                                                    <img style="width: 500px; height: auto;" class="img-responsive" src="{{ asset('album/'.$listalbum->album_img_3.'.JPEG')  }}" alt= "Album / Portofolio Bisnis" />
                                                    @elseif(File::exists(public_path("album/".$listalbum->album_img_3.".PNG")))
                                                    <a href="{{ asset('album/'.$listalbum->album_img_3.'.PNG')  }}" title="image-3" class="with-caption gallery image-link">
                                                    <img style="width: 500px; height: auto;" class="img-responsive" src="{{ asset('album/'.$listalbum->album_img_3.'.PNG')  }}" alt= "Album / Portofolio Bisnis" />
                                                    </a>
                                                    @endif
                                              </div>
                                            </div><!-- end hotel-block -->
                                        </div><!-- end item -->
                                        @endif
                                        @if(!empty($listalbum->album_img_4))
                                        <div class="item">
                                            <div class="main-block hotel-block ">
                                                <div class=" main-img img-hover">
                                                    @if(File::exists(public_path("album/".$listalbum->album_img_4.".jpg")))
                                                    <a href="{{ asset('album/'.$listalbum->album_img_4.'.jpg')  }}" title="image-4" class="with-caption gallery image-link">
                                                    <img style="width: 500px; height: auto;" class="img-responsive" src="{{ asset('album/'.$listalbum->album_img_4.'.jpg')  }}" alt= "Album / Portofolio Bisnis" />
                                                    </a>
                                                    @elseif(File::exists(public_path("album/".$listalbum->album_img_4.".png")))
                                                    <a href="{{ asset('album/'.$listalbum->album_img_4.'.png')  }}" title="image-4" class="with-caption gallery image-link">
                                                    <img style="width: 500px; height: auto;" class="img-responsive" src="{{ asset('album/'.$listalbum->album_img_4.'.jpg')  }}" alt= "Album / Portofolio Bisnis" />
                                                    </a>
                                                    @elseif(File::exists(public_path("album/".$listalbum->album_img_4.".jpeg")))
                                                    <a href="{{ asset('album/'.$listalbum->album_img_4.'.jpeg')  }}" title="image-4" class="with-caption gallery image-link">
                                                    <img style="width: 500px; height: auto;" class="img-responsive" src="{{ asset('album/'.$listalbum->album_img_4.'.jpg')  }}" alt= "Album / Portofolio Bisnis" />
                                                    </a>
                                                    @elseif(File::exists(public_path("album/".$listalbum->album_img_4.".JPG")))
                                                    <a href="{{ asset('album/'.$listalbum->album_img_4.'.JPG')  }}" title="image-4" class="with-caption gallery image-link">
                                                    <img style="width: 500px; height: auto;" class="img-responsive" src="{{ asset('album/'.$listalbum->album_img_4.'.JPG')  }}" alt= "Album / Portofolio Bisnis" />
                                                    @elseif(File::exists(public_path("album/".$listalbum->album_img_4.".JPEG")))
                                                    <a href="{{ asset('album/'.$listalbum->album_img_4.'.JPEG')  }}" title="image-4" class="with-caption gallery image-link">
                                                    <img style="width: 500px; height: auto;" class="img-responsive" src="{{ asset('album/'.$listalbum->album_img_4.'.JPEG')  }}" alt= "Album / Portofolio Bisnis" />
                                                    @elseif(File::exists(public_path("album/".$listalbum->album_img_4.".PNG")))
                                                    <a href="{{ asset('album/'.$listalbum->album_img_4.'.PNG')  }}" title="image-4" class="with-caption gallery image-link">
                                                    <img style="width: 500px; height: auto;" class="img-responsive" src="{{ asset('album/'.$listalbum->album_img_4.'.PNG')  }}" alt= "Album / Portofolio Bisnis" />
                                                    </a>
                                                    @endif
                                                </div>
                                            </div><!-- end hotel-block -->
                                        </div><!-- end item -->
                                        @endif
                                    @endforeach
                                </div><!-- end owl-hotel-offers -->
                            </div><!-- end columns -->
                    </section><!-- end hotel-offers -->
                    <div class="col-sm-12 col-md-12">
                        <div class="page-heading white-heading">
                          <h2 style="font-family: 'Abel', sans-serif; font-size: 35px; background: linear-gradient(#FE9321, #FF6E6D);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;">Amenities</h2>
                        </div>
                        <div class="row">
                          @foreach($fasilitas as $listfasil)
                          @if(!empty($listfasil->wifi))  
                          <div class="col-xs-6 col-md-4">
                            <img style="height:100px; width: auto; position:relative; margin: 0 auto; float: none; display:block;" class="img-responsive" src="{{ asset('dist/images/amenities/wifi.png')  }}"alt= "amenities" />
                          </div><!-- end columns -->
                          @endif
                          @if(!empty($listfasil->toilet))
                          <div class="col-xs-6 col-md-4">
                            <img style="height:100px; width: auto; position:relative; margin: 0 auto; float: none; display:block;" class="img-responsive" src="{{ asset('dist/images/amenities/toilet.png')  }}"alt= "amenities" />
                          </div><!-- end columns -->
                          @endif
                          @if(!empty($listfasil->parkir))
                          <div class="col-xs-6 col-md-4">
                            <img style="height:100px; width: auto; position:relative; margin: 0 auto; float: none; display:block;" class="img-responsive" src="{{ asset('dist/images/amenities/parking.png')  }}"alt= "amenities" />
                          </div><!-- end columns -->
                          @endif
                          @if(!empty($listfasil->rganti))
                          <div class="col-xs-6 col-md-4">
                            <img style="height:100px; width: auto; position:relative; margin: 0 auto; float: none; display:block;" class="img-responsive" src="{{ asset('dist/images/amenities/dressroom.png')  }}"alt= "amenities" />
                          </div><!-- end columns -->
                          @endif
                          @if(!empty($listfasil->ac))
                          <div class="col-xs-6 col-md-4">
                            <img style="height:100px; width: auto; position:relative; margin: 0 auto; float: none; display:block;" class="img-responsive" src="{{ asset('dist/images/amenities/ac.png')  }}"alt= "amenities" />
                          </div><!-- end columns -->
                          @endif
                          @endforeach
                        </div>
                    </div>    
                    <div class="col-sm-12 col-md-12">
                      <div class="page-heading white-heading">
                        <h2 style="font-family: 'Abel', sans-serif; font-size: 35px; background: linear-gradient(#FE9321, #FF6E6D);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;">Rules</h2>
                      </div>
                      <div class="row">
                        <table class="table">
                            @foreach($tnc as $key => $data)
                            <tr>
                              <td><b>{{$key + 1}}</b></td>
                              <td><p>{{$data->tnc_desc}}</p></td>
                            </tr>
                            @endforeach
                        </table>
                      </div>
                    </div>                           
                </div>
            </div>
                 
            <div class="col-sm-6 col-md-6">
                @if(!empty($AllFotografer[0])) 
                <section id="alacarte-offers" class="">
                    <div class="col-lg-12">
                        <div class="page-heading">
                            <h2 style="font-family: 'Abel', sans-serif; font-size: 35px; background: linear-gradient(#FFBD54, #FF6E6D);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;">Fotografer</h2>
                            <hr class="heading-line" />
                        </div>
                        <div class="owl-carousel owl-theme owl-custom-arrow" id="owl-alacarte-offers">
                          <!-- <ul class="list-unstyled list-inline offer-price-1"> -->
                          @foreach($AllFotografer as $listthem)    
                            <!-- <li class="price"> -->
                                @include('partner-profile.fotografer.paket')
                            <!-- </li> -->
                            @endforeach
                          <!-- </ul> -->
                        </div>
                    </div>
                </section>
                @endif
            </div>
    </div>
  </section>

@endforeach
@include('layouts.footer')
@endsection