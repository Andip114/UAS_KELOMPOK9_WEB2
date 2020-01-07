<?php
//memasukkan file config.php
include('../config.php');
?>
<?php
// Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excell
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=data_penduduk.xls");
?>
<table border="2" cellpadding="10">
  <thead>
     <tr>
         <th>No.</th>
         <th>NIK</th>
         <th>Nama</th>
         <th>Tempat Lahir</th>
         <th>Tanggal Lahir</th>
         <th>Jenis Kelamin</th>
         <th>Gol. Darah</th>
         <th>Alamat</th>
         <th>RT/RW</th>
         <th>Desa</th>
         <th>Kecamatan</th>
         <th>Agama</th>
         <th>AGAMA</th>
         <th>Status Perkawinan</th>
         <th>Pekerjaan</th>
         <th>Kewarganegaraan</th>
         <th>AKSI</th>
     </tr>
 </thead>
 <tbody>
  <?php
				//query ke database SELECT tabel data_penduduk urut berdasarkan id yang paling besar
  $sql = mysql_query("SELECT * FROM data_penduduk ORDER BY id DESC") or die(mysql_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
  if(mysql_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
   $no = 1;
					//melakukan perulangan while dengan dari dari query $sql
   while($data = mysql_fetch_assoc($sql)){
						//menampilkan data perulangan
    echo '
    <tr>
    <td>'.$no.'</td>
    <td>'.$data['NIK'].'</td>
    <td>'.$data['nama'].'</td>
    <td>'.$data['tempat_lahir'].'</td>
    <td>'.$data['tanggal_lahir'].'</td>
    <td>'.$data['jenis_kelamin'].'</td>
    <td>'.$data['gol_darah'].'</td>
    <td>'.$data['alamat'].'</td>
    <td>'.$data['RT_RW'].'</td>
    <td>'.$data['desa'].'</td>
    <td>'.$data['kecematan'].'</td>
    <td>'.$data['agama'].'</td>
    <td>'.$data['status_perkawinan'].'</td>
    <td>'.$data['pekerjaan'].'</td>
    <td>'.$data['kewarganegaraan'].'</tr>
    ';
    $no++;
}
				//jika query menghasilkan nilai 0
}else{
 echo '
 <tr>
 <td colspan="6">Tidak ada data.</td>
 </tr>
 ';
}
?>

<tbody>
</table>