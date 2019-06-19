<?php

namespace App\Http\Controllers\Mua;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use File;
use Image;
use Auth;
Use Redirect;
Use App\MUAPackage;
Use App\MUAType;
Use App\MUADurasi;
Use App\Partner;
Use App\MUAPackageType;

class MuaPackageController extends Controller
{
    public function index()
    {   
        $listTag = DB::table('mua_type')->get();
        $user = Auth::user();
        $package = DB::table('mua_package')
                    ->where('partner_id',$user->id)
                    ->where('status', '1')
                    ->select('*')
                    ->get();
        $partner = DB::table('partner')
                    ->where('user_id',$user->id)
                    ->select('*')
                    ->first();
        $hargaPaket = MUADurasi::where('partner_id', $partner->id)->get();

        return view('partner.mua.package.index', compact('partner', 'package', 'hargaPaket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $partner = DB::table('partner')
                    ->where('user_id',$user->id)
                    ->select('*')
                    ->first();
        return view('partner.mua.package.create', compact('partner'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $user = Auth::user();
        $partner = Partner::where('user_id', $user->id)->first();

        $package = new MUAPackage();
        $package->partner_id = $partner->user_id;
        $package->partner_name = $partner->pr_name;
        $package->pg_category = $partner->pr_subtype;
        $package->pg_name = $request->input('pg_name');
        $package->pg_retouch = $request->input('pg_retouch');
        $package->pg_hairhijabdo = $request->input('pg_hairhijabdo');
        $package->pg_desc = $request->input('pg_desc');
        $package->pg_location_jumlah = '1';
        $package->pg_standby = $request->input('pg_standby');
        $package->pg_standby_jumlah = $request->input('pg_standby_jumlah');
        $package->status = '1';
        $package->save();

        $dataSet = [];
        if ($package->save()) {
            for ($i = 0; $i < count($request->tag); $i++) {
                $dataSet[] = [
                    'package_id' => $package->id,
                    'type_id' => $request->tag[$i],
                ];
            }
        }
        MUAPackageType::insert($dataSet);

        $durasiSet = [];
        if ($package->save()) {
            for ($i = 0; $i < count($request->durasi_jam); $i++) {
                $price = $request->durasi_harga[$i];
                $price_array = explode(".", $price);
                $pg_price = '';
                foreach ($price_array as $key => $value) {
                    $pg_price = $pg_price . $price_array[$key];
                }
                $durasiSet[] = [
                    'partner_id' => $partner->id,
                    'package_id' => $package->id,
                    'durasi_jam' => $request->durasi_jam[$i],
                    'durasi_harga' => $pg_price,
                ];
            }
        }
        MUADurasi::insert($durasiSet);

        $durasiPaket = MUADurasi::where('package_id', $package->id)->min('durasi_harga');
        $package->pg_price = $durasiPaket;
        $package->save();
        
        if ($request->hasFile('pg_img_1')) {
            $package->pg_img_1 = $package->id . '_' . $package->pg_category . '_' . $user->id . '_1';
            $package->save();
            $foto_new = $package->pg_img_1;
            if( File::exists(public_path('/img_pkg/' . $foto_new .'.jpeg' ))){
                File::delete(public_path('/img_pkg/' . $foto_new .'.jpeg' ));
            } elseif( File::exists(public_path('/img_pkg/' . $foto_new .'.jpg' ))){
                File::delete(public_path('/img_pkg/' . $foto_new .'.jpg' ));
            } elseif( File::exists(public_path('/img_pkg/' . $foto_new .'.png' ))){
                File::delete(public_path('/img_pkg/' . $foto_new .'.png' ));
            } elseif( File::exists(public_path('/img_pkg/' . $foto_new .'.JPG' ))){
                File::delete(public_path('/img_pkg/' . $foto_new .'.JPG' ));
            } elseif( File::exists(public_path('/img_pkg/' . $foto_new .'.PNG' ))){
                File::delete(public_path('/img_pkg/' . $foto_new .'.PNG' ));
            } elseif( File::exists(public_path('/img_pkg/' . $foto_new .'.JPEG' ))){
                File::delete(public_path('/img_pkg/' . $foto_new .'.JPEG' ));
            }  
            $foto = $request->file('pg_img_1');
            $foto_name = $foto_new . '.' .$foto->getClientOriginalExtension();
            Image::make($foto)->save( public_path('/img_pkg/' . $foto_name ) );
            $user = Auth::user();
            $package= MUAPackage::where('partner_id',$user->id)->first();
            $package->save();
        }

        if ($request->hasFile('pg_img_2')) {
            $package->pg_img_2 = $package->id . '_' . $package->pg_category . '_' . $user->id . '_2';
            $package->save();
            $foto_new = $package->pg_img_2;
            if( File::exists(public_path('/img_pkg/' . $foto_new .'.jpeg' ))){
                File::delete(public_path('/img_pkg/' . $foto_new .'.jpeg' ));
            } elseif( File::exists(public_path('/img_pkg/' . $foto_new .'.jpg' ))){
                File::delete(public_path('/img_pkg/' . $foto_new .'.jpg' ));
            } elseif( File::exists(public_path('/img_pkg/' . $foto_new .'.png' ))){
                File::delete(public_path('/img_pkg/' . $foto_new .'.png' ));
            } elseif( File::exists(public_path('/img_pkg/' . $foto_new .'.JPG' ))){
                File::delete(public_path('/img_pkg/' . $foto_new .'.JPG' ));
            } elseif( File::exists(public_path('/img_pkg/' . $foto_new .'.PNG' ))){
                File::delete(public_path('/img_pkg/' . $foto_new .'.PNG' ));
            } elseif( File::exists(public_path('/img_pkg/' . $foto_new .'.JPEG' ))){
                File::delete(public_path('/img_pkg/' . $foto_new .'.JPEG' ));
            }
            $foto = $request->file('pg_img_2');
            $foto_name = $foto_new . '.' .$foto->getClientOriginalExtension();
            Image::make($foto)->save( public_path('/img_pkg/' . $foto_name ) );
            $user = Auth::user();
            $package= MUAPackage::where('partner_id',$user->id)->first();
            $package->save();
        }

        if ($request->hasFile('pg_img_3')) {
            $package->pg_img_3 = $package->id . '_' . $package->pg_category . '_' . $user->id . '_3';
            $package->save();
            $foto_new = $package->pg_img_3;
            if( File::exists(public_path('/img_pkg/' . $foto_new .'.jpeg' ))){
                File::delete(public_path('/img_pkg/' . $foto_new .'.jpeg' ));
            } elseif( File::exists(public_path('/img_pkg/' . $foto_new .'.jpg' ))){
                File::delete(public_path('/img_pkg/' . $foto_new .'.jpg' ));
            } elseif( File::exists(public_path('/img_pkg/' . $foto_new .'.png' ))){
                File::delete(public_path('/img_pkg/' . $foto_new .'.png' ));
            } elseif( File::exists(public_path('/img_pkg/' . $foto_new .'.JPG' ))){
                File::delete(public_path('/img_pkg/' . $foto_new .'.JPG' ));
            } elseif( File::exists(public_path('/img_pkg/' . $foto_new .'.PNG' ))){
                File::delete(public_path('/img_pkg/' . $foto_new .'.PNG' ));
            } elseif( File::exists(public_path('/img_pkg/' . $foto_new .'.JPEG' ))){
                File::delete(public_path('/img_pkg/' . $foto_new .'.JPEG' ));
            }
            $foto = $request->file('pg_img_3');
            $foto_name = $foto_new . '.' .$foto->getClientOriginalExtension();
            Image::make($foto)->save( public_path('/img_pkg/' . $foto_name ) );
            $user = Auth::user();
            $package= MUAPackage::where('partner_id',$user->id)->first();
            $package->save();
        }

        if ($request->hasFile('pg_img_4')) {
            $package->pg_img_4 = $package->id . '_' . $package->pg_category . '_' . $user->id . '_4';
            $package->save();
            $foto_new = $package->pg_img_4;
            if( File::exists(public_path('/img_pkg/' . $foto_new .'.jpeg' ))){
                File::delete(public_path('/img_pkg/' . $foto_new .'.jpeg' ));
            } elseif( File::exists(public_path('/img_pkg/' . $foto_new .'.jpg' ))){
                File::delete(public_path('/img_pkg/' . $foto_new .'.jpg' ));
            } elseif( File::exists(public_path('/img_pkg/' . $foto_new .'.png' ))){
                File::delete(public_path('/img_pkg/' . $foto_new .'.png' ));
            } elseif( File::exists(public_path('/img_pkg/' . $foto_new .'.JPG' ))){
                File::delete(public_path('/img_pkg/' . $foto_new .'.JPG' ));
            } elseif( File::exists(public_path('/img_pkg/' . $foto_new .'.PNG' ))){
                File::delete(public_path('/img_pkg/' . $foto_new .'.PNG' ));
            } elseif( File::exists(public_path('/img_pkg/' . $foto_new .'.JPEG' ))){
                File::delete(public_path('/img_pkg/' . $foto_new .'.JPEG' ));
            }
            $foto = $request->file('pg_img_4');
            $foto_name = $foto_new . '.' .$foto->getClientOriginalExtension();
            Image::make($foto)->save( public_path('/img_pkg/' . $foto_name ) );
            $user = Auth::user();
            $package= MUAPackage::where('partner_id',$user->id)->first();
            $package->save();
        }

        return redirect()->intended(route('mua-package.index'));   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $partner = DB::table('partner')
                    ->where('user_id',$user->id)
                    ->select('*')
                    ->first();
        $package = MUAPackage::where('id', $id)->get();
        $packageList = MUAPackage::where('id', $id)->first();
        $partnerTag = MUAPackageType::join('mua_type', 'mua_type.id', '=', 'mua_package_type.package_id')->where('package_id', $packageList->id)->get();
        $durasiPaket = MUADurasi::where('package_id', $packageList->id)->get();

        return view('partner.mua.package.show', compact('package', 'partnerTag', 'partner', 'durasiPaket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $id = $request->id;
        $partner = Partner::where('user_id', $user->id)->first();
        $package = MUAPackage::findOrFail($id);
        
        $package->pg_name = $request->input('pg_name');
        $package->pg_retouch = $request->input('pg_retouch');
        $package->pg_hairhijabdo = $request->input('pg_hairhijabdo');
        $package->pg_desc = $request->input('pg_desc');
        $package->pg_location_jumlah = '1';
        $package->pg_standby = $request->input('pg_standby');
        $package->pg_standby_jumlah = $request->input('pg_standby_jumlah');
        $package->save();

        $package = MUAPackage::findOrFail($id);
        
        if(!empty($request->tag)) {
            $dataSet = [];
            if ($package->save()) {
                for ($i = 0; $i < count($request->tag); $i++) {
                    $dataSet[] = [
                        'package_id' => $package->id,
                        'type_id' => $request->tag[$i],
                    ];
                }
            }
            MUAPackageType::insert($dataSet);
        }
        
        if(!empty($request->durasi_jam)) {
            $durasiSet = [];
            if ($package->save()) {
                for ($i = 0; $i < count($request->durasi_jam); $i++) {
                    $price = $request->durasi_harga[$i];
                    $price_array = explode(".", $price);
                    $pg_price = '';
                    foreach ($price_array as $key => $value) {
                        $pg_price = $pg_price . $price_array[$key];
                    }
                    $durasiSet[] = [
                        'partner_id' => $partner->id,
                        'package_id' => $package->id,
                        'durasi_jam' => $request->durasi_jam[$i],
                        'durasi_harga' => $pg_price,
                    ];
                }
            }
            MUADurasi::insert($durasiSet);
        }
        
        if ($request->hasFile('pg_img_1')) {
            $package->pg_img_1 = $package->id . '_' . $package->pg_category . '_' . $user->id . '_1';
            $package->save();
            $foto_new = $package->pg_img_1;
            if( File::exists(public_path('/img_pkg/' . $foto_new .'.jpeg' ))){
                File::delete(public_path('/img_pkg/' . $foto_new .'.jpeg' ));
            } elseif( File::exists(public_path('/img_pkg/' . $foto_new .'.jpg' ))){
                File::delete(public_path('/img_pkg/' . $foto_new .'.jpg' ));
            } elseif( File::exists(public_path('/img_pkg/' . $foto_new .'.png' ))){
                File::delete(public_path('/img_pkg/' . $foto_new .'.png' ));
            } elseif( File::exists(public_path('/img_pkg/' . $foto_new .'.JPG' ))){
                File::delete(public_path('/img_pkg/' . $foto_new .'.JPG' ));
            } elseif( File::exists(public_path('/img_pkg/' . $foto_new .'.PNG' ))){
                File::delete(public_path('/img_pkg/' . $foto_new .'.PNG' ));
            } elseif( File::exists(public_path('/img_pkg/' . $foto_new .'.JPEG' ))){
                File::delete(public_path('/img_pkg/' . $foto_new .'.JPEG' ));
            }  
            $foto = $request->file('pg_img_1');
            $foto_name = $foto_new . '.' .$foto->getClientOriginalExtension();
            Image::make($foto)->save( public_path('/img_pkg/' . $foto_name ) );
            $user = Auth::user();
            $package= MUAPackage::where('user_id',$user->id)->first();
            $package->save();
        }

        if ($request->hasFile('pg_img_2')) {
            $package->pg_img_2 = $package->id . '_' . $package->pg_category . '_' . $user->id . '_2';
            $package->save();
            $foto_new = $package->pg_img_2;
            if( File::exists(public_path('/img_pkg/' . $foto_new .'.jpeg' ))){
                File::delete(public_path('/img_pkg/' . $foto_new .'.jpeg' ));
            } elseif( File::exists(public_path('/img_pkg/' . $foto_new .'.jpg' ))){
                File::delete(public_path('/img_pkg/' . $foto_new .'.jpg' ));
            } elseif( File::exists(public_path('/img_pkg/' . $foto_new .'.png' ))){
                File::delete(public_path('/img_pkg/' . $foto_new .'.png' ));
            } elseif( File::exists(public_path('/img_pkg/' . $foto_new .'.JPG' ))){
                File::delete(public_path('/img_pkg/' . $foto_new .'.JPG' ));
            } elseif( File::exists(public_path('/img_pkg/' . $foto_new .'.PNG' ))){
                File::delete(public_path('/img_pkg/' . $foto_new .'.PNG' ));
            } elseif( File::exists(public_path('/img_pkg/' . $foto_new .'.JPEG' ))){
                File::delete(public_path('/img_pkg/' . $foto_new .'.JPEG' ));
            }
            $foto = $request->file('pg_img_2');
            $foto_name = $foto_new . '.' .$foto->getClientOriginalExtension();
            Image::make($foto)->save( public_path('/img_pkg/' . $foto_name ) );
            $user = Auth::user();
            $package= MUAPackage::where('user_id',$user->id)->first();
            $package->save();
        }

        if ($request->hasFile('pg_img_3')) {
            $package->pg_img_3 = $package->id . '_' . $package->pg_category . '_' . $user->id . '_3';
            $package->save();
            $foto_new = $package->pg_img_3;
            if( File::exists(public_path('/img_pkg/' . $foto_new .'.jpeg' ))){
                File::delete(public_path('/img_pkg/' . $foto_new .'.jpeg' ));
            } elseif( File::exists(public_path('/img_pkg/' . $foto_new .'.jpg' ))){
                File::delete(public_path('/img_pkg/' . $foto_new .'.jpg' ));
            } elseif( File::exists(public_path('/img_pkg/' . $foto_new .'.png' ))){
                File::delete(public_path('/img_pkg/' . $foto_new .'.png' ));
            } elseif( File::exists(public_path('/img_pkg/' . $foto_new .'.JPG' ))){
                File::delete(public_path('/img_pkg/' . $foto_new .'.JPG' ));
            } elseif( File::exists(public_path('/img_pkg/' . $foto_new .'.PNG' ))){
                File::delete(public_path('/img_pkg/' . $foto_new .'.PNG' ));
            } elseif( File::exists(public_path('/img_pkg/' . $foto_new .'.JPEG' ))){
                File::delete(public_path('/img_pkg/' . $foto_new .'.JPEG' ));
            }
            $foto = $request->file('pg_img_3');
            $foto_name = $foto_new . '.' .$foto->getClientOriginalExtension();
            Image::make($foto)->save( public_path('/img_pkg/' . $foto_name ) );
            $user = Auth::user();
            $package= MUAPackage::where('user_id',$user->id)->first();
            $package->save();
        }

        if ($request->hasFile('pg_img_4')) {
            $package->pg_img_4 = $package->id . '_' . $package->pg_category . '_' . $user->id . '_4';
            $package->save();
            $foto_new = $package->pg_img_4;
            if( File::exists(public_path('/img_pkg/' . $foto_new .'.jpeg' ))){
                File::delete(public_path('/img_pkg/' . $foto_new .'.jpeg' ));
            } elseif( File::exists(public_path('/img_pkg/' . $foto_new .'.jpg' ))){
                File::delete(public_path('/img_pkg/' . $foto_new .'.jpg' ));
            } elseif( File::exists(public_path('/img_pkg/' . $foto_new .'.png' ))){
                File::delete(public_path('/img_pkg/' . $foto_new .'.png' ));
            } elseif( File::exists(public_path('/img_pkg/' . $foto_new .'.JPG' ))){
                File::delete(public_path('/img_pkg/' . $foto_new .'.JPG' ));
            } elseif( File::exists(public_path('/img_pkg/' . $foto_new .'.PNG' ))){
                File::delete(public_path('/img_pkg/' . $foto_new .'.PNG' ));
            } elseif( File::exists(public_path('/img_pkg/' . $foto_new .'.JPEG' ))){
                File::delete(public_path('/img_pkg/' . $foto_new .'.JPEG' ));
            }
            $foto = $request->file('pg_img_4');
            $foto_name = $foto_new . '.' .$foto->getClientOriginalExtension();
            Image::make($foto)->save( public_path('/img_pkg/' . $foto_name ) );
            $user = Auth::user();
            $package= MUAPackage::where('user_id',$user->id)->first();
            $package->save();
        }
        
         return redirect()->intended(route('mua-package.index'));  
        // return redirect()->intended(route('partner.listpackage'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    public function deletePackage(Request $request)
    {
        $id = $request->id;
        $package = MUAPackage::findOrFail($id);
        $package->status = '0';
        $package->save();
        return redirect()->intended(route('mua-package.index')); 
    }
}
