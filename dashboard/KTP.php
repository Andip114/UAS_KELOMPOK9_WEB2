<!DOCTYPE html>
<html>
<head>
	<title>KTP</title>

	<style type="text/css">
		p {color:#000099; font-family: verdana; } body {background-color: #333333; }
		table{margin:0 auto;width: 50%; border-collapse: collapse;background: #ecf3eb;}
		th, td{border:1px solid #999;}
		th{padding: 8px 0;background: #0cf; font-size: 30px;}
		td{padding: 4px 4px;}
	</style>
</head>

<body>
	<table align="center">
		<tr>
			<th align="50" colspan="2">PROVINSI JAWA TENGAH <br> KOTA TEGAL</th>
		</tr>
		<tr>
			<td>
				<p><blockquote><pre>
					<?php
					$NIK            = $_POST['NIK'];
					$nama           = $_POST['nama'];
					$tempat_lahir   = $_POST['tempat_lahir'];
					$tanggal_lahir  = $_POST['tanggal_lahir'];
					$jenis_kelamin  = $_POST['jenis_kelamin'];
					$gol_darah = $_POST['gol_darah'];
					$alamat = $_POST['alamat'];
					$RT_RW = $_POST['RT_RW'];
					$desa = $_POST['desa'];
					$kecematan = $_POST['kecematan'];
					$agama = $_POST['agama'];
					$status_perkawinan = $_POST['status_perkawinan'];
					$pekerjaan = $_POST['pekerjaan'];
					$kewarganegaraan = $_POST['kewarganegaraan'];
					$foto = $_POST['foto'];	
					$berlaku = 5 + date("Y");

					print '<h3><b>NIK         		:';
					print $NIK;

					print '<br>Nama   			:';
					print $nama;

					print '<br>Tempat/Tgl Lahir 	:';
					print $tempat_lahir;
					print ',';
					print $tanggal_lahir;

					print '<br>Jenis Kelamin  		:';
					print $jenis_kelamin;

					print '<br>Gol. Darah 		:';
					print $gol_darah;

					print '<br>Alamat  		:';
					print $alamat;

					print '<br>RT/RW  			:';
					print $RT_RW;

					print '<br>Desa  			:';
					print $desa;

					print '<br>Kecamatan  		:';
					print $kecematan;

					print '<br>Agama  			:';
					print $agama;

					print '<br>Status Perkawinan 	:';
					print $status_perkawinan;

					print '<br>Pekerjaan  		:';
					print $pekerjaan;	

					?></pre>
				</blockquote></p>

			</td>
			<td>

				<blockquote>
					<?php 

				//cetak foto
					$sumber = $_FILES['foto']['tmp_name'];
					$target = $_FILES['foto']['name'];

					if(move_uploaded_file($sumber, $target))		
					{
						echo "<img src='$target' height=300 width=200>";
					}
					else
						echo "Cant Upload Selected File";

						?>
				</blockquote>

			</td>	
		</tr>
	</table><br>
	<table align="center">
		<tr><td colspan="2"><center>
			<a 	href="list_penduduk.php" title="KLIK" font color="white"><h3>Back</h3></a></center></td></tr>
		</center>
	</table>
</body>
</html>