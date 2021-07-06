<?php
   
function penjumlahan($angka1, $angka2){
    return $angka1 + $angka2;  
}

function hitungTakeHomePay($gajiPokok, $lembur, $kehadiran, $tunjangan) {
  $bpjs = 0.05;
  $pph = 0.05;
  $uangMakanPerHari = 25000;
  $gajiPerHari = $gajiPokok / 22;
  $uangLembur = $gajiPerHari * $lembur * 0.025;
  $uangMakan = $kehadiran * $uangMakanPerHari;
  if ($tunjangan === 1) {
    $perhitunganBpjs = $gajiPokok * $bpjs;
  } else {
    $perhitunganBpjs = ($gajiPokok * $bpjs) * 2;
  }
  $perhitunganPph = $gajiPokok * $pph;
  // take home pay = (Gaji pokok + uang lembur + uang makan) - (perhitungan bpjs + pph)
  $takeHomePay = ($gajiPokok + $uangLembur + $uangMakan) + $perhitunganBpjs - $perhitunganPph;
  return $takeHomePay;
}

function hitungUangLembur($gajiPokok, $lembur){
  $gajiPerHari = $gajiPokok / 22;
  return $gajiPerHari * $lembur * 0.025;
}

function hitungPph($gajiPokok){
  if ($gajiPokok < 50000000){
    return $gajiPokok * 0.05;
  } else {
    return $gajiPokok * 0.15;
  }
}

function hitungBpjs($tunjangan, $gajiPokok){
  if ($tunjangan === 1) {
   return $gajiPokok * 0.05;
  } else {
   return ($gajiPokok * 0.05) * 2;
  }
}

function hitungUangMakan($kehadiran) {
  return $kehadiran * 25000;
}
  