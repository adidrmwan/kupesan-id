@extends('partner.layouts.app-add')
@section('title', 'Add Package')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title"><b>Add Package</b></h4>
                        
                    </div>

                    <div class="content">
                        <form role="form" action="{{route('mua-package.store')}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                                {{ csrf_field() }}
                            <div class="row">
                              <div class="col-md-8">
                                <div class="row">
                                  <div class="col-md-12 col-lg-12">
                                    <div class="alert alert-info alert-dismissible">
                                      <h4>Upload Foto</h4>
                                      Minimal upload 1(satu) foto dengan perbandingan <b>1:1</b><br>dalam format file <b>JPG, JPEG, atau PNG.</b> <br>
                                        Ukuran Maksimal <b>512 KB</b>
                                    </div>
                                  </div>
                                </div>                                
                                <div class="row">
                                  <div class="col-md-2 col-lg-2">
                                  </div>
                                  <div class="col-md-8 col-lg-8">
                                  <h4 style="text-align: center;">Foto Utama <span style="font-size: 15px;">*Wajib Diisi</span></h4> 
                                    <div class="file-loading">
                                      <input id="file-0a" class="file" type="file" name="pg_img_1" required >
                                    </div>
                                  </div>
                                  
                                </div>
                                <hr>
                                <h4 style="text-align: center; padding: 10px;">Foto Pendukung</h4>
                                <div class="row">

                                  
                                  <div class="col-md-4 col-lg-4">
                                    <div class="file-loading">
                                      <input id="file-0a" class="file" type="file" name="pg_img_2">
                                    </div>
                                  </div>
                                  <div class="col-md-4 col-lg-4">
                                    <div class="file-loading">
                                      <input id="file-0a" class="file" type="file" name="pg_img_3">
                                    </div>
                                  </div>
                                  <div class="col-md-4 col-lg-4">
                                    <div class="file-loading">
                                      <input id="file-0a" class="file" type="file" name="pg_img_4">
                                    </div>
                                  </div>
                                </div>
                              </div>
                                <div class="col-md-4">
                                  <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nama Paket<small><b style="color:red;"> * </b></small></label>
                                            <input type="text" class="form-control" placeholder="Nama Paket" required="" name="pg_name" value="{{ old('pg_name') }}">
                                            <div class="invalid-feedback">Wajib diisi.</div>
                                        </div>
                                    </div> 
                                  </div>
                                  <!-- <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Kategori Paket<small><b style="color:red;"> * </b></small></label>
                                            <select  class="form-control" id="inlineFormCustomSelectPref" name="pkg_category_them" >
                                                <option selected value="">Pilih Kategori Paket</option>
                                                <option value="A La Carte">A La Carte</option>
                                                <option value="Special Package">Special Package</option>
                                                <option value="Special Studio">Special Studio</option>
                                            </select>
                                            <div class="invalid-feedback">Wajib diisi.</div>
                                        </div>
                                    </div>
                                  </div> -->
                                  <div class="row">
                                    <div class="col-lg-12">
                                      <!-- <button type="button" class="btn btn-info addPaket">Tambah Durasi Paket</button> -->
                                      <div class="row">
                                        <div class="col-lg-5 col-xs-4">
                                            <div class="form-group">
                                              <label>Durasi Paket (1 hari)<small><b style="color:red;"> * </b></small></label>
                                              <select  class="form-control" id="inlineFormCustomSelectPref" value="{{ old('pg_duration') }}" name="durasi_jam[]" required>
                                                <option selected value="">Pilih Durasi Paket</option>
                                                <option value="1">1 Jam</option>
                                                <option value="2">2 Jam</option>
                                                <option value="3">3 Jam</option>
                                                <option value="4">4 Jam</option>
                                                <option value="5">5 Jam</option>
                                                <option value="6">6 Jam</option>
                                                <option value="7">7 Jam</option>
                                                <option value="8">8 Jam</option>
                                                <option value="9">9 Jam</option>
                                                <option value="10">10 Jam</option>
                                                <option value="11">11 Jam</option>
                                                <option value="12">12 Jam</option>
                                                <option value="13">13 Jam</option>
                                                <option value="14">14 Jam</option>
                                                <option value="15">15 Jam</option>
                                                <option value="16">16 Jam</option>
                                                <option value="17">17 Jam</option>
                                                <option value="18">18 Jam</option>
                                                <option value="19">19 Jam</option>
                                                <option value="20">20 Jam</option>
                                                <option value="21">21 Jam</option>
                                                <option value="22">22 Jam</option>
                                                <option value="23">23 Jam</option>
                                                <option value="24">1 Hari</option>
                                              </select>
                                              <div class="invalid-feedback">Wajib diisi.</div> 
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-xs-8">
                                          <div class="form-group">
                                            <label>Harga Paket<small><b style="color:red;"> * </b></small></label>
                                            <div class="input-group mb-4">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Rp</span>
                                              </div>
                                              <input class="form-control number" placeholder="Harga Paket" min="1000" value="{{ old('pg_price') }}" name="durasi_harga[]" required>
                                            <div class="invalid-feedback">Wajib diisi.</div>
                                            </div>
                                            </div>
                                        </div>
                                      </div>
                                    </div>  
                                  </div>
                                  <!-- <div class="row">
                                    <div class="col-md-12">
                                      <div class="form-group">
                                            <label>Harga Overtime (Per Jam)<small><b style="color:red;"> * </b></small></label>
                                            <div class="input-group mb-4">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Rp</span>
                                              </div>
                                              <input class="form-control number" placeholder="Harga Overtime" min="1000" name="pkg_overtime_them">
                                            </div>
                                        </div>
                                    </div>
                                  </div> -->
                                  <!-- <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Jumlah Lokasi Pemotretan<small><b style="color:red;"> * </b></small></label>
                                            <input type="number" min="1" max="100" class="form-control" placeholder="Jumlah Lokasi Pemotretan" name="pg_location_jumlah" value="{{ old('pg_location_jumlah') }}">
                                            <div class="invalid-feedback">Wajib diisi.</div>
                                        </div>
                                    </div>
                                  </div> -->
                                  <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Retouch<small><b style="color:red;"> * </b></small></label>
                                            <select  class="form-control" id="inlineFormCustomSelectPref" name="pg_retouch"  required>
                                                <option selected value="">Pilih</option>
                                                <option value="Include">Include</option>
                                                <option value="Exclude">Exclude</option>
                                            </select>
                                            <div class="invalid-feedback">Wajib diisi.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Hairdo/Hijabdo<small><b style="color:red;"> * </b></small></label>
                                            <select  class="form-control" id="inlineFormCustomSelectPref" name="pg_hairhijabdo" required>
                                                <option selected value="">Pilih</option>
                                                <option value="Include">Include</option>
                                                <option value="Exclude">Exclude</option>
                                            </select>
                                            <div class="invalid-feedback">Wajib diisi.</div>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                  </div>
<!-- FOTO EDIT -->
                                  <hr>
                                  <h5 style="text-align: center; ">Standby</h5>
                                  <small style="color: grey;">Jika Exclude Standby:
                                    <ul>
                                      <li>Waktu Standby: 0</li>
                                    </ul>
                                  </small>
                                  <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Standby<small><b style="color:red;"> * </b></small></label>
                                            <select  class="form-control" id="inlineFormCustomSelectPref" name="pg_standby" required>
                                                <option selected value="">Pilih</option>
                                                <option value="Include">Include</option>
                                                <option value="Exclude">Exclude</option>
                                            </select>
                                            <div class="invalid-feedback">Wajib diisi.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Waktu Standby (jam)<small><b style="color:red;"> * </b></small></label>
                                            <input type="number" min="0" max="1000" class="form-control" placeholder="Waktu Standby" required="" name="pg_standby_jumlah">
                                            <div class="invalid-feedback">Isi 0, jika Exclude Standby.</div>
                                        </div>
                                    </div>
                                  </div>
                                  <!-- FOTO EDIT -->
                                  <hr>
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <label>Tags<small><b style="color:red;"> * </b></small></label>
                                        <select id="tags-mua" class="form-control" name="tag[]" required=""></select>
                                            <div class="invalid-feedback">Wajib diisi.</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <label>Deskripsi Paket/Informasi Tambahan (Opsional)</label>
                                        <textarea class="form-control" name="pg_desc" style="height: 100px;"></textarea>
                                      </div>
                                    </div>
                                  </div>

                              </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill pull-right">Add Package</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        
@endsection

@section('script')
<script type="text/javascript">
  var pg_duration = $('#durasi');
    $(pg_duration).select2({
      data:[
        {id:1,text:"1 Jam"},
        {id:2,text:"2 Jam"},
        {id:3,text:"3 Jam"},
        {id:4,text:"4 Jam"},
        {id:5,text:"5 Jam"},
      ],
      multiple: true,
      placeholder: "Pilih Durasi Paket",
      required: true,
      width: "100%"
    });
</script>
<script type="text/javascript">
$(document).on('click', '.addPaket', function(){
    var html = '<div class="row"><div class="col-md-5"><label>Durasi Paket</label><select  class="form-control" id="inlineFormCustomSelectPref" name="durasi_jam[]" required><option selected value="">Pilih Durasi Paket</option><option value="1">1 Jam</option><option value="2">2 Jam</option><option value="3">3 Jam</option><option value="4">4 Jam</option><option value="5">5 Jam</option></select><div class="invalid-feedback">Wajib diisi.</div></div><div class="col-md-7"><label>Harga Paket</label><div class="input-group mb-4"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1">Rp</span></div><input class="form-control number2" placeholder="Harga Paket" min="1000" name="durasi_harga[]" required><div class="invalid-feedback">Wajib diisi.</div></div></div></div>';
  $(this).parent().append(html);
});
</script>
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
<script type="text/javascript">
    $('input.number2').keyup(function(event) {

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

