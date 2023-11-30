<title>Cover Raport Kelas X-TEL1 Tahun Pelajaran 2023/2024 Semester 1</title>
<body style="font-family:Arial;">
<style type="text/css">
.tabel td{
	font-size:12px;
	border-top:#000 solid 1px;
	border-left:#000 solid 1px;
	padding:5px;
}
.tabel th{
	font-size:11px;
	border-left:#000 solid 1px;
	padding:5px;

}
.tabel table{
	border-top:#000 solid 1px;
	border-bottom:#000 solid 1px;
	border-right:#000 solid 1px;
	background:#FFF;
}
@media all {
	.page-break	{ display: none; }
}

@media print {
	.page-break	{ display: block; page-break-before: always; }
}
</style>
<?php foreach($data as $cover):?>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tbody>
		<tr>
		<td align="center"><p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p><img src="<?= base_url('assets/img/logo/garuda-pancasila.png');?>" width="120" height="123" alt=""/></p>
			<p>&nbsp;</p>
			<p><span style="font-size:28px;">LAPORAN HASIL BELAJAR PESERTA DIDIK<br>
			</span>
			<span style="font-size:32px; font-weight:bold;">
				<?= $cover->nama_sekolah;?>
			</span>
			
			</p>
			<p>&nbsp;</p>
		<p><img src="<?= base_url($cover->logo);?>" width="150" height="151" alt=""/></p></td>
		</tr>
	</tbody>
	</table>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<table width="520" border="0" align="center" cellpadding="0" cellspacing="0">
		<tbody>
			<tr>
				<td width="200" height="30">Nama</td>
				<td width="20" height="30" align="center">:</td>
				<td width="300" height="30">
					<span style="font-size: 14px; font-weight: bold; text-transform:uppercase;">
					<?= $cover->nama;?>
					</span>
				</td>
			</tr>
			<tr>
				<td height="30">Nomor Induk Siswa</td>
				<td height="30" align="center">:</td>
				<td height="30">
					<span style="font-size:14px;">
						<?= $cover->nis;?>
					</span>
				</td>
			</tr>
			<tr>
				<td height="30">NISN</td>
				<td height="30" align="center">:</td>
				<td height="30">
					<span style="font-size:14px;">
						<?= $cover->nisn;?>
					</span>
				</td>
			</tr>
		</tbody>
		</table>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tbody>
			<tr>
				<td align="center"><p>&nbsp;</p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<p><span style="font-size:24px; font-weight:bold;">KEMENTERIAN AGAMA REPUBLIK INDONESIA</span><br>
					<span style="font-size:18px; font-weight:bold;">DIREKTORAT JENDERAL PENDIDIKAN ISLAM<br>
					DIREKTORAT PENDIDIKAN MADRASAH
					</span></p>
				</td>
			</tr>
		</tbody>
	</table>
<div class="page-break"></div>
<?php endforeach;?>