<?php
	include '../../koneksi.php';
        if($_POST){

          $id = $_GET['id'] ;
          
          $judul = $_POST['judul'];
          $kategori = $_POST['kategori'];
          $foto = $_FILES['foto']['name'];
          $isi = $_POST['isi'];
          $sql ="UPDATE artikel SET judul='$judul',kategori='$kategori',foto='$foto',isi='$isi' where id='$id'";
           move_uploaded_file($_FILES['foto']['tmp_name'],'foto/'. $foto);
          if ($koneksi->query($sql) === TRUE){
            echo "<script> alert('Data Berhasil Di UPDATE'); window.location.href='artikel.php'</script>";
          } else {
            echo "Gagal :" .$koneksi->error;
          }
          $koneksi->close();
        } else {
          $query = $koneksi->query ("SELECT * FROM p_surat WHERE id=".$_GET['id']);
          if ($query->num_rows > 0){
            $data = mysqli_fetch_object($query) ;
          }else{
            echo "Data tidak terdaftar" ;
            die();
          }
        ?>
<html>
<head>
<title></title>
</head>
<body>
<table align="center" border="0" cellpadding="1" style="width: 700px;">
<tr>
<td width="25" align="center"><img src="<?php echo $base_url;?>admin/foto/jogja.png" width="50%"></td>
<td width="50" align="center"><b>PEMERINTAHAN KOTA YOGYAKARTA <br>
	KECAMATAN JETIS KAMPUNG BADRAN</b> <br>
	Gg.Melati , Badran RT49 RW 11 Kosan Pak Ribut , Yogyakarta 55231 <br>
	No Telp : 089673881528 <br>
</td>
<td width="15" align="center"></td>
</tr>
</table>

<hr width="650px">

<table align="center" border="0" cellpadding="1" style="width: 500px;"><tbody>
<tr>     <td colspan="3"><div align="center">


	<font size="5">SURAT KETERANGAN</font>
	<br>No : 01/SRT/SKTPS/JETIS/YOGYAKARTA/2019
</div>
</td> </tr>
<tr>
	<td></td>
</tr>

<tr>     
	<td colspan="3" height="270" valign="top">
		<div align="justify">

	<p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kepala Dinas Kependudukan dan Pencatatan Sipil Kota Yogyakarta , Menerangkan <br>
	Bahwa :</p>

<table border="0" style="width: 500px;">
	<tbody>
<tr>           
	<td width="300">
		Nomor Induk Kependudukan</td>           
		<td width="10">:</td>           
		<td width="300"><?= $data->nik?></td>         
	</tr>
<tr>           
	<td width="300">
		Nama Lengkap</td>           
		<td width="10">:</td>           
		<td width="300"><?= $data->nama?></td>         
	</tr>
<tr>           
	<td width="300">
		Tempat/Tgl Lahir</td>           
		<td width="10">:</td>           
		<td width="300"><?= $data->tgl?></td>         
	</tr>

<tr>           
	<td width="300">
		Jenis Kelamin</td>           
		<td width="10">:</td>           
		<td width="300"><?= $data->jk?></td>         
	</tr>
<tr>           
	<td width="300">
		Alamat</td>           
		<td width="10">:</td>           
		<td width="300"><?= $data->alamat?></td>         
</tr>
<tr>           
	<td width="300">
		RT/RW</td>           
		<td width="10">:</td>           
		<td width="300"><?= $data->rtrw?></td>         
</tr>
<tr>           
	<td width="300">
		Kelurahan</td>           
		<td width="10">:</td>           
		<td width="300"><?= $data->kel?></td>         
</tr>
<tr>           
	<td width="300">
		Kecamatan</td>           
		<td width="10">:</td>           
		<td width="300"><?= $data->kec?></td>         
</tr>
<tr>           
	<td width="300">
		Kota</td>           
		<td width="10">:</td>           
		<td width="300"><?= $data->kota?></td>         
</tr>
<tr>           
	<td width="300">
		Provinsi</td>           
		<td width="10">:</td>           
		<td width="300"><?= $data->prov?></td>         
</tr>

</tbody>
</table>
<div align="justify">
<p align="justify">

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;adalah sebagai Penduduk Kota Yogyakarta dan telah melaksanakan perekaman Kartu Tanda Penduduk Elektronik (E-Ktp) dan terdaftar dalam database kependudukan di Kota Yogyakarta Provinsi DIY sesuai UUD RI Nomor 24 Tahun 2013 tentang perubahan UUD Nomor 23 Tahun 2006 tentang Administrasi kependudukan dan Surat Menteri Dalam negeri Republik Indonesia Nomor : 471.13/5184/SJ tanggal 13 Desember 2012 Perihal Pelaksanaan e-KTP secara nasional.
<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian surat keterangan ini dibuat untuk digunakan sebagaimana mestinya.</p> 
</div>
</div>

<p align="right">Yogyakarta , 07-12-2019	<br> 
				Kepala Desa <br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
			Fadilah Riczky</p>
</tbody>
</table>
<?php
}

?>

<script type="text/javascript">
	window.print();
</script>

</body>
</html> 
</body>
</html>