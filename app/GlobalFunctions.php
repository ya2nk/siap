<?php

function hoursToMinutes($hours)
{
    $minutes = 0;
    if (strpos($hours, ':') !== false)
    {
        // Split hours and minutes.
        list($hours, $minutes) = explode(':', $hours);
    }
    return $hours * 60 + $minutes;
}
function minutesToHours($minutes)
{
    $hours = (int)($minutes / 60);
    $minutes -= $hours * 60;
    if($hours >= 24){
      $hours = $hours-24;
    }
    return sprintf("%d:%02.0f", $hours, $minutes);
}

function getTime($time){
    $h = floor($time/3600);
    $m = floor(($time % 3600) /60);
    $s = $time % 60;
    $h = $h < 10 ? '0'.$h : $h;
    $m = $m < 10 ? '0'.$m : $m;
    $s = $s < 10 ? '0'.$s : $s;
    return $h.':'.$m.':'.$s;
}

function listBulan() {
    return [""=>"-",1=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
}

function getHariKerja($tanggal_from, $tanggal_to) {
    $hari_kerja = [];
    $tanggal = $tanggal_from;
    $libur = App\Models\Libur::whereBetween('tanggal',[$tanggal_from,$tanggal_to])->lists('tanggal');
    while ($tanggal <= $tanggal_to) {
        $dayofweek = date('w',strtotime($tanggal));
        if ($dayofweek != 0  && !$libur->contains($tanggal)) {
            $hari_kerja[] = $tanggal;
        }
        $tanggal = date('Y-m-d', strtotime($tanggal.' +1 day'));
    }
    return $hari_kerja;
}

function getAllUnitKerjaChildren($unit_kerja_id) {
  $lists = [$unit_kerja_id];
  $uks = [$unit_kerja_id];
  do {
    $uks = App\Model\UnitKerja::whereIn('unit_kerja_parent',$uks)->lists('unit_kerja_id');
    $lists = array_merge($lists,$uks->toArray());
  } while (count($uks) > 0);
  return $lists;

}

function getNamaHari($tanggal){
  $hari = date('w',strtotime($tanggal));
  switch($hari){
        case 0 : {
            $hari='Minggu';
                }
        break;
        case 1 : {
            $hari='Senin';
                }
        break;
        case 2 : {
            $hari='Selasa';
                }
        break;
        case 3 : {
            $hari='Rabu';
                }
        break;
        case 4 : {
            $hari='Kamis';
                }
        break;
        case 5 : {
            $hari="Jumat";
                }
        break;
        case 6 : {
            $hari='Sabtu';
                }
        break;
        default: {
            $hari='';
                }
        break;
    }
    return $hari;
}

function logAction($aksi,$keterangan='',$entity_id=null,$username=null){
    if (!$username) {
        $username = Auth::user() ? Auth::user()->username : 'Guest';
    }
    App\Models\ActionLog::create([
        'username' => $username,
        'aksi' => $aksi,
        'keterangan' => $keterangan,
        'entity_id' => $entity_id
    ]);
}