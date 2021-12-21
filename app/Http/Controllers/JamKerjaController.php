<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JamKerja;
use Yajra\Datatables\DataTables;

class JamKerjaController extends Controller
{
    function index()
    {
        return view('master.jam-kerja.index');
    }
    
    function data()
    {
        $model = JamKerja::query();
        return Datatables::of($model)->make(true);
    }
    
    function row(Request $req)
    {
        return response(JamKerja::find($req->id));
    }
    
    function save(Request $request)
    {
       if($request->is_crossday == 0){
            if(hoursToMinutes($request->checkin_start) < hoursToMinutes($request->jam_masuk) && hoursToMinutes($request->checkin_start) < hoursToMinutes($request->checkin_end) 
                && hoursToMinutes($request->jam_masuk) < hoursToMinutes($request->istirahat_start) && hoursToMinutes($request->jam_masuk) < hoursToMinutes($request->jam_pulang)){
                $model = JamKerja::firstOrNew(['id'=>$request->id]);
                $model->name = $request->name;
                $model->checkin_start = hoursToMinutes($request->checkin_start);
                $model->checkin_end = hoursToMinutes($request->checkin_end);
                $model->checkout_start = hoursToMinutes($request->checkout_start);
                $model->checkout_end = hoursToMinutes($request->checkout_end);
                $model->jam_masuk = hoursToMinutes($request->jam_masuk);
                $model->jam_pulang = hoursToMinutes($request->jam_pulang);
                $model->istirahat_start = hoursToMinutes($request->istirahat_start);
                $model->istirahat_end = hoursToMinutes($request->istirahat_end);
                $model->is_crossday = $request->is_crossday;
                $model->save();
                return response(['error'=>false]);
            }else{
                return response(['error'=>true,'message'=>'Data gagal ditambahkan!<br>Aturan : Checkin start < jam masuk < checkin end dan Jam masuk < istirahat < jam pulang']);
            }
        }else{
            if(true || hoursToMinutes($request->jam_pulang)<=hoursToMinutes($request->jam_masuk)){
                $model = JamKerja::firstOrNew(['id'=>$request->id]);
                $model->name = $request->name;
                $model->checkin_start = hoursToMinutes($request->checkin_start) <= 1440 ? hoursToMinutes($request->checkin_start) : hoursToMinutes($request->checkin_start) + 1440 ;
                $model->checkin_end = hoursToMinutes($request->checkin_end) <= 1440 ? hoursToMinutes($request->checkin_end) : hoursToMinutes($request->checkin_end) + 1440;
                $model->checkout_start = hoursToMinutes($request->checkout_start) <=1440 ? hoursToMinutes($request->checkout_start) : hoursToMinutes($request->checkout_start) + 1440;
                $model->checkout_end = hoursToMinutes($request->checkout_end) <=1440 ? hoursToMinutes($request->checkout_end) : hoursToMinutes($request->checkout_end) + 1440;
                $model->jam_masuk = hoursToMinutes($request->jam_masuk) <=1440 ? hoursToMinutes($request->jam_masuk) : hoursToMinutes($request->jam_masuk) + 1440;
                $model->jam_pulang = hoursToMinutes($request->jam_pulang) <=1440 ? hoursToMinutes($request->jam_pulang) : hoursToMinutes($request->jam_pulang) + 1440;
                $model->istirahat_start = hoursToMinutes($request->istirahat_start) <=1440 ? hoursToMinutes($request->istirahat_start) : hoursToMinutes($request->istirahat_start) + 1440;
                $model->istirahat_end = hoursToMinutes($request->istirahat_end) <=1440 ? hoursToMinutes($request->istirahat_end) : hoursToMinutes($request->istirahat_end) +1440;
                $model->is_crossday = $request->is_crossday;
                $model->save();
                return response(['error'=>false]);
            }else{
                return response(['error'=>true,'message'=>'Data gagal ditambahkan!<br>Aturan Crossday: jam pulang < jam masuk']);
            }
        }
    }
    
    public function destroy($id){
        $model = JamKerja::where('id',$id)->delete();
        return response(['error'=>false]);
    }
}
