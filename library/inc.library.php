<?php
date_default_timezone_set("Asia/Jakarta");

# Fungsi untuk membuat kode automatis
// function buatKode($tabel){
// 	$struktur	= mysql_query("SELECT * FROM $tabel");
// 	$field		= mysql_field_name($struktur,0);
// 	$panjang	= mysql_field_len($struktur,0);

//  	$qry	= mysql_query("SELECT MAX(".$field.") FROM ".$tabel);
//  	$row	= mysql_fetch_array($qry); 
//  	if ($row[0]=="") {
//  		$angka=0;
// 	}
//  	else {
//  		$angka		= substr($row[0]);
//  	}
	
//  	$angka++;
//  	$angka	=strval($angka); 
//  	$tmp	="";
//  	for($i=1; $i<=($panjang-strlen($angka)); $i++) {
// 		$tmp=$tmp."0";	
// 	}
//  	return $tmp.$angka;
// }

function kodeSurat() {
	$kodeBaru = mysql_fetch_array(mysql_query("SELECT * FROM surat ORDER BY id DESC LIMIT 1;"));
	$angka = str_pad($kodeBaru['id']+1, 3, '0', STR_PAD_LEFT);
	return $angka;
}

function bulan(){
	$bulan = array("I","II","III","IV","V","VI","VII","VIII","IX","X","XI","XII");
	$month = intval(date('m')) - 1;
	return $bulan[$month];
	

}

?>