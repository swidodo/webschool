
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Identitas Peserta Didik</title>
<style type="text/css">
body{
	font-family:Arial;
}
h1,h4,h2,h3 {
	margin:0;
}
h3{
	font-size:18px;
	font-weight:bold;
}
h4{
	font-size:16px;
	font-weight:bold;
}
h1{
	font-size:20px;
}
h2{
	font-size:16px;
	font-weight:bold;
}
hr{
	border:solid 1px #000000;
}
td{
	font-size:14px;
	height:20px;
}
@media all {
	.page-break	{ display: none; }
}

@media print {
	.page-break	{ display: block; page-break-before: always; }
}
</style>
</head>

<body>
	<?php foreach($data as $siswa):?>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td colspan="7" align="center"><h3>IDENTITAS PESERTA DIDIK</h3></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td colspan="2">&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td width="18">1.</td>
			<td width="400">Nama Lengkap </td>
			<td width="24">&nbsp;</td>
			<td width="10">:</td>
			<td colspan="2">
				<h2><?= $siswa->nama;?></h2>
			</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>2.</td>
			<td>NIS / NISN</td>
			<td>&nbsp;</td>
			<td>:</td>
			<td colspan="2"><?= $siswa->nis.' / '.$siswa->nisn; ?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>3.</td>
			<td>Tempat dan Tanggal Lahir</td>
			<td>&nbsp;</td>
			<td>:</td>
			<td colspan="2"><?= $siswa->tempat_lahir;?>, <?= ($siswa->tgl_lahir !='') ? date('d F Y', strtotime($siswa->tgl_lahir)) : '';?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>4.</td>
			<td>Jenis Kelamin</td>
			<td>&nbsp;</td>
			<td>:</td>
			<td colspan="2"><?= ($siswa->jk =="P") ? 'Perempuan' : 'Laki-laki';?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>5.</td>
			<td>Agama</td>
			<td>&nbsp;</td>
			<td>:</td>
			<td colspan="2" style="text-transform:uppercase;"><?= $siswa->agama;?></td>
			<td style="text-transform:uppercase;">&nbsp;</td>
		</tr>
		<tr>
			<td>6.</td>
			<td>Status Dalam Keluarga</td>
			<td>&nbsp;</td>
			<td>:</td>
			<td colspan="2"><?= $siswa->status_dlm_kel;?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>7.</td>
			<td>Anak Ke</td>
			<td>&nbsp;</td>
			<td>:</td>
			<td colspan="2"><?= $siswa->anak_ke;?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>8.</td>
			<td>Alamat Peserta Didik</td>
			<td>&nbsp;</td>
			<td>:</td>
			<td colspan="2"><?= $siswa->alamat;?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>9.</td>
			<td>Nomor Telepon Rumah</td>
			<td>&nbsp;</td>
			<td>:</td>
			<td colspan="2"><?= $siswa->hp;?></td>
			<td>&nbsp;</td>
		</tr>
		
		<tr>
			<td>10.</td>
			<td>Diterima di Sekolah ini</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td colspan="2">&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>a. Di Kelas</td>
			<td>&nbsp;</td>
			<td>:</td>
			<td colspan="2"><?= $siswa->kelas;?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>b. Pada Tanggal</td>
			<td>&nbsp;</td>
			<td>:</td>
			<td colspan="2"><?= ($siswa->tanggal_diterima !='') ? date('d F Y', strtotime($siswa->tanggal_diterima)) : '';?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>11.</td>
			<td> Orang Tua</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td colspan="2">&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>a. Nama Ayah</td>
			<td>&nbsp;</td>
			<td>:</td>
			<td colspan="2"><?= $siswa->nama_ayah;?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>b. Nama Ibu</td>
			<td>&nbsp;</td>
			<td>:</td>
			<td colspan="2"><?= $siswa->nama_ibu;?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>c. Alamat</td>
			<td>&nbsp;</td>
			<td>:</td>
			<td colspan="2"><?= $siswa->alamat_ortu;?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>d. Nomor Telepon/HP</td>
			<td>&nbsp;</td>
			<td>:</td>
			<td colspan="2"><?= $siswa->hp_ortu;?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>12.</td>
			<td>Pekerjaan Orang Tua</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td colspan="2">&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>a. Ayah</td>
			<td>&nbsp;</td>
			<td>:</td>
			<td colspan="2"><?= $siswa->kerja_ayah;?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>b. Ibu</td>
			<td>&nbsp;</td>
			<td>:</td>
			<td colspan="2"><?= $siswa->kerja_ibu;?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>13.</td>
			<td>Wali Peserta Didik</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td colspan="2">&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>a.  Nama Wali</td>
			<td>&nbsp;</td>
			<td>:</td>
			<td colspan="2"><?= $siswa->nama_wali;?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>b. Nomor Telp/HP</td>
			<td>&nbsp;</td>
			<td>:</td>
			<td colspan="2"><?= $siswa->hp_wali;?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>c. Alamat</td>
			<td>&nbsp;</td>
			<td>:</td>
			<td colspan="2"><?= $siswa->alamat_wali;?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>d. Pekerjaan</td>
			<td>&nbsp;</td>
			<td>:</td>
			<td colspan="2"><?= $siswa->kerja_wali;?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td colspan="2">&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td colspan="5" rowspan="2"><table width="50%" border="0" cellspacing="0" cellpadding="0">
				
			</table></td>
			<td width="500"><?= $siswa->kabkota;?>, <?= ($siswa->tgl_biodata !='') ? date('d F Y', strtotime($siswa->tgl_biodata)):'';?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>Kepala Sekolah, <br> </br></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td colspan="4" rowspan="3">&nbsp;</td>
			<td><table width="110" align="right" cellspacing="7"><tr><td width="100" height="100" rowspan="3" align="center" valign="middle" style="border: solid #000000 1px;"><p>&nbsp;</p>
				<p>pas foto<br />
					3cm x 4cm</p>
				<p>&nbsp;</p></td></tr></table></td>
			<td><p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>
				<u style="text-transform:capitalize;text-underline-position: under; text-decoration: underline">
				<strong><?= $siswa->kepala_sekolah;?></strong></u>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>NIP. <?= $siswa->nip_kepsek;?></td>
		</tr>
		<tr>
			<td></td>
			<td>Keterangan :</td>
		</tr>
			<tr>
			<td></td>
			<td>NIS : Nomor Induk Siswa</td>
		</tr>
			<tr>
			<td></td>
			<td>NISN : Nomor Induk Siswa Nasional</td>
		</tr>
	</table>
	<div class="page-break"></div>
	<?php endforeach;?>
</body>
</html>