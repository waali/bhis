<?php
function simpan_buku_tamu($nama, $email, $telepon, $pesan)
{
	$sql = "INSERT INTO buku_tamu(nama, email, telepon, pesan, tanggal)
		VALUES ('$nama', '$email', '$telepon', '$pesan', CURRENT_TIMESTAMP)";
	
	return mysql_query($sql);
}

if($_POST)
{
	$err = false;
	// strip_tags() all post
	foreach($_POST as $key=>$value)
	{
		$_POST[$key] = strip_tags($_POST[$key]);
	}
	
	if($_POST['nama'] == '')
	{
		$err = true;
		$err_nama = 'Nama harus diisi.';
	}
	else
	{
		$nama = filter_var($_POST['nama'], FILTER_SANITIZE_STRING);
	}
	
	if($_POST['email'] == '')
	{
		$err = true;
		$err_email = 'Email harus diisi.';
	}
	else
	{
		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
		{
			$err = true;
			$err_email = 'Format Email salah.';
		}
		else
		{
			$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
		}
	}
	
	if($_POST['pesan'] == '')
	{
		$err = true;
		$err_pesan = 'Pesan harus diisi.';
	}
	else
	{
		$pesan = filter_var($_POST['pesan'], FILTER_SANITIZE_STRING);
	}
	
	if($_POST['telepon'] != '' && !is_numeric($_POST['telepon']))
	{
		$err = true;
		$err_telepon = 'Telepon harus angka.';
	}
	else
	{	
		$telepon = filter_var($_POST['telepon'], FILTER_SANITIZE_NUMBER_INT);
	}
	
	if (!$err)
	{
		$success = simpan_buku_tamu($nama, $email, $telepon, $pesan);
		
		// freeup $_POST variables
		foreach($_POST as $key=>$value)
		{
			unset($_POST[$key]);
		}
	}
}
?>
<style>
.templatemo_fullgraybox {
    border: 1px solid #cccccc;
    clear: both;
    float: left;
    margin: 0px 0px 25px;
    padding: 25px;
    width: 800px;
}
/*---------------contact_form------------------*/

.right_content{
	width:380px;
	float:left;
	padding: 0 0 0 20px;
}
.contact_form{
	float:left;
}
.form_row{
	width:380px;
	clear:both;
	padding:12px 0 12px 0;
	color:#a53d17;
}
label.contact{
	width:70px;
	float:left;
	font-size:14px;
	font-weight:bold;
	text-align:right;
	padding:4px 15px 0 0;
	color: #868788;
}
input.contact_input{
	width:250px;
	height:21px;
	float:left;
	border:1px #98cdec solid;
	background-color:#e2eff4;
	color:#3596c5;
	font-size:13px;
	margin:3px 0 0 0;
	padding:3px 0 0 5px;
}
textarea.contact_textarea{
	width:250px;
	height:120px;
	float:left;
	border:1px #98cdec solid;
	background-color:#e2eff4;
	color:#3596c5;
	font-size:13px;
	margin:3px 0 0 0;
	padding:2px 0 0 5px;
}
input.send{
	cursor:pointer;
	float:right;
	padding:4px 15px 4px 10px;
	height: inherit;
}

.employe_box_left{
	float:left;
	width:180px;
	line-height:25px;
	margin:20px 0 0 0;
	border-right:1px #CCCCCC dotted;
}
.employe_box_right{
	float:left;
	width:180px;
	line-height:25px;
	margin:20px 0 0 40px;
}
.contact_info{
	float:left;
	padding:5px 0 0 0;
}
form {
	margin: 0;
}

.employe_box_left{
	float:left;
	width:170px;
	line-height:25px;
	margin:20px 0 0 0;
	border-right:1px #CCCCCC dotted;
}
.employe_box_right{
	float:left;
	width:160px;
	line-height:25px;
	margin:20px 0 0 40px;
}
</style>
<h1>Hubungi Kami</h1>
<div class="templatemo_fullgraybox">
    <div class="left_content">
		<div class="contact_form">
			<form method="post" >
			<?php echo (isset($success) && $success == true) ? '<p>Pesan Anda sukses terkirim. Kami akan segera meresponya.</p>' : ''; ?>
			<div class="form_row">
				<label class="contact">nama:</label>
				<input type="text" name="nama" value="<?php echo (isset($_POST['nama'])) ? $_POST['nama'] : ''; ?>" class="contact_input" />
				<?php echo (isset($err_nama)) ? '<p class="error">'.$err_nama.'</p>' : ''; ?>
			</div>
			<div class="form_row">
				<label class="contact">email:</label>
				<input type="text" name="email" value="<?php echo (isset($_POST['email'])) ? $_POST['email'] : ''; ?>" class="contact_input" />
				<?php echo (isset($err_email)) ? '<p class="error">'.$err_email.'</p>' : ''; ?>
			</div>
			<div class="form_row">
				<label class="contact">telepon:</label>
				<input type="text" name="telepon" value="<?php echo (isset($_POST['telepon'])) ? $_POST['telepon'] : ''; ?>" class="contact_input" />
				<?php echo (isset($err_telepon)) ? '<p class="error">'.$err_telepon.'</p>' : ''; ?>
			</div>
			<div class="form_row">
				<label class="contact">pesan:</label>
				<textarea class="contact_textarea" name="pesan" rows="" cols="" ><?php echo (isset($_POST['pesan'])) ? $_POST['pesan'] : ''; ?></textarea>
				<?php echo (isset($err_pesan)) ? '<p class="error">'.$err_pesan.'</p>' : ''; ?>
			</div>
			<div class="form_row">
				<input type="submit" value="SUBMIT" class="send"/>
			</div>
			</form>
		</div>
	</div>
	<!--End of left_content-->
    <div class="right_content">
		<h2>Alamat Kami</h2>
			<p class="info_contact">Bumi Ps.Kemis Indah Jl. Melati 1 Block E4 No.20 <br>Tangerang - 15810<br>http://www.akparbhis.com</p>
			<p class="info_contact">Email: cecokay@yahoo.co.id</p>
			<p class="info_contact">Telp: 0856 9163 3930</p>
		<div class="employe_box_left">
			<span class="blue">Mr.awang Setiaji, S.Pd</span><br />
		<span class="orange">Email:</span>cecokay@gmail.com<br />
		  <span class="orange">Telp:</span><span class="info_contact">0856 9163 3930</span>
		</div>
		<div class="employe_box_right">
        <span class="blue">Mrs.Niken, S.Pd</span><br />
	    <span class="orange">Email:</span><span class="info_contact">cecokay@yahoo.id</span><br />
			<span class="orange">Telp.:</span> 0821 1186 9843<br />
		</div>
    </div>
</div>