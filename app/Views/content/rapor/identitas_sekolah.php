
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
<?php foreach($data as $identitas):?>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td align="center"><p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p><span style="font-size:28px; font-weight:bold;">LAPORAN HASIL BELAJAR PESERTA DIDIK<br>
                        <?= $identitas->nama_sekolah;?><br>
                    </span></p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                </td>
            </tr>
        </tbody>
    </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <table width="620" border="0" align="center" cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <td width="190" height="30"><strong>Nama</strong></td>
                <td width="30" height="30" align="center">:</td>
                <td width="400" height="30">
                    <strong>
                        <span style="text-transform:uppercase;">
                            <?= $identitas->nama;?>
                        </span>
                    </strong>
                </td>
            </tr>
            <tr>
                <td height="30"><strong>Nomor Induk</strong></td>
                <td height="30" align="center">:</td>
                <td height="30"><?= $identitas->nis;?></td>
            </tr>
            <tr>
                <td height="30"><strong>NISN</strong></td>
                <td height="30" align="center">:</td>
                <td height="30"><?= $identitas->nisn;?></td>
            </tr>
            <tr>
                <td height="30"><strong>Nama Sekolah</strong></td>
                <td height="30" align="center">:</td>
                <td height="30"><?= $identitas->nama_sekolah;?></td>
            </tr>
            <tr>
                <td height="30">&nbsp;</td>
                <td height="30" align="center">&nbsp;</td>
                <td height="30"><!-- $identitas->nama_sekolah_belakang; --></td>
            </tr>
            <tr>
                <td height="30"><strong>NPSN / NSS</strong></td>
                <td height="30" align="center">:</td>
                <td height="30"><?= $identitas->npsn;?></td>
            </tr>
            <tr>
            <td height="30"><strong>Alamat Sekolah</strong></td>
            <td height="30" align="center">:</td>
            <td height="30"><?= $identitas->alamat_sekolah;?></td>
            </tr>
            <tr>
            <td height="30">&nbsp;</td>
            <td height="30" align="center">&nbsp;</td>
            <td height="30">Telp. <?= $identitas->telpon;?></td>
            </tr>
            <tr>
            <td height="30">&nbsp;</td>
            <td height="30" align="center">&nbsp;</td>
            <td height="30">Fax. <?= $identitas->fax;?> Kode Pos 15310<?= $identitas->kode_pos;?></td>
            </tr>
            <tr>
            <td height="30"><strong>Kelurahan</strong></td>
            <td height="30" align="center">:</td>
            <td height="30"><?= $identitas->kelurahan;?></td>
            </tr>
            <tr>
            <td height="30"><strong>Kecamatan</strong></td>
            <td height="30" align="center">:</td>
            <td height="30"><?= $identitas->kecamatan;?></td>
            </tr>
            <tr>
            <td height="30"><strong>Kabupaten / Kota</strong></td>
            <td height="30" align="center">:</td>
            <td height="30"><?= $identitas->kabkota;?></td>
            </tr>
            <tr>
            <td height="30"><strong>Provinsi</strong></td>
            <td height="30" align="center">:</td>
            <td height="30"><?= $identitas->provinsi;?></td>
            </tr>
        </tbody>
    </table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tbody>
        <tr>
            <td align="center"><p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
            </td>
        </tr>
    </tbody>
</table>
<div class="page-break"></div>
<?php endforeach;?>
</body>
</html>
