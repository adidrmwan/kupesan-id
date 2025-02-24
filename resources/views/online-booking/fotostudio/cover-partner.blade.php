<section class="page-cover section-padding" id="cover-hotel-detail" style="margin-top: 3.5%;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
              <div class="col-sm-12 col-md-2">
                <div id="abt-cnt-2-img">
                    @if(File::exists(public_path("logo/".$partner->pr_logo.".jpg")))
                    <img src="{{ asset('logo/'.$partner->pr_logo.'.jpg')  }}" class="img-responsive" alt="about-img" style="max-width: 100%; margin: 0 auto; float: none; display: block;position: relative; border-radius: 100%;" />
                    @elseif(File::exists(public_path("logo/".$partner->pr_logo.".png")))
                    <img src="{{ asset('logo/'.$partner->pr_logo.'.png')  }}" class="img-responsive" alt="about-img" style="max-width: 100%; margin: 0 auto; float: none; display: block;position: relative; border-radius: 100%;" />
                    @elseif(File::exists(public_path("logo/".$partner->pr_logo.".jpeg")))
                    <img src="{{ asset('logo/'.$partner->pr_logo.'.jpeg')  }}" class="img-responsive" alt="about-img" style="max-width: 100%; margin: 0 auto; float: none; display: block;position: relative; border-radius: 100%;" />
                    @elseif(File::exists(public_path("logo/".$partner->pr_logo.".JPG")))
                    <img src="{{ asset('logo/'.$partner->pr_logo.'.JPG')  }}" class="img-responsive" alt="about-img" style="max-width: 100%; margin: 0 auto; float: none; display: block;position: relative; border-radius: 100%;" />
                    @elseif(File::exists(public_path("logo/".$partner->pr_logo.".PNG")))
                    <img src="{{ asset('logo/'.$partner->pr_logo.'.PNG')  }}" class="img-responsive" alt="about-img" style="max-width: 100%; margin: 0 auto; float: none; display: block;position: relative; border-radius: 100%;" />
                    @elseif(File::exists(public_path("logo/".$partner->pr_logo.".JPEG")))
                    <img src="{{ asset('logo/'.$partner->pr_logo.'.JPEG')  }}" class="img-responsive" alt="about-img" style="max-width: 100%; margin: 0 auto; float: none; display: block;position: relative; border-radius: 100%;" />
                    @else
                    <img src="{{asset('dist/images/spot-logo.png')  }}" class="img-responsive" alt="about-img" style="width: 200px; height: 200px; margin: 0 auto; float: none; display: block;position: relative; border-radius: 100%;" />
                    @endif
                </div>
              </div>
              <div class="col-sm-12 col-md-10">
                <br><br>  
                <h1 class="page-title">{{$partner->pr_name}}</h1>
                @if(Auth::check())
                <ul class="breadcrumb">
                    <li class="active">{{$partner->pr_addr}}, {{$partner->pr_kel}}, {{$kecamatan->name}}, {{$kota->name}}, {{$provinsi->name}}, {{$partner->pr_postal_code}}</li>
                </ul>
                @endif
              </div>
            </div>
        </div>
    </div>
</section>