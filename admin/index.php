<?php 
include '../inc/config.php';

if(!isset($_SESSION['my_user']))
{
?>
	<script>
		alert('Maaf, anda harus login terlebih dahulu.');
		document.location='login.php';
	</script>
<?php
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>
<link type="text/css" href="css/admin.css" rel="stylesheet" />
<link type="text/css" href="css/jquery-ui.min.css" rel="stylesheet" />
<link type="text/css" href="css/jquery-ui.css" rel="stylesheet" />
<link type="text/css" href="css/jquery.ui.theme.css" rel="stylesheet" />

<script type="text/javascript" src="setting/jquery/jquery-1.9.1.js"></script>
<script type="text/javascript" src="setting/jquery/jquery.dataTables.js"></script>
<script type="text/javascript" src="setting/jquery/jquery-ui-1.10.2.custom.js"></script>

<!-- memanggil file jquery validasi -->
<script type="text/javascript" src="setting/jquery/jquery.validate.js"></script>

<!-- memanggil file jquery tinyMce -->
<script src="setting/jquery/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script>
    $(document).ready(function() {	  
		tinyMCE.init({
			// General options
			mode : "textareas",
			theme : "advanced",
			plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",

			// Theme options
			theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
			theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,forecolor,backcolor",
			theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,|,print,|,fullscreen",
			
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			theme_advanced_statusbar_location : "bottom",
			theme_advanced_resizing : false,

			// Example content CSS (should be your site CSS)
			content_css : "css/content.css",

			// Drop lists for link/image/media/template dialogs
			template_external_list_url : "lists/template_list.js",
			external_link_list_url : "lists/link_list.js",
			external_image_list_url : "lists/image_list.js",
			media_external_list_url : "lists/media_list.js",

			// Style formats
			style_formats : [
				{title : 'Bold text', inline : 'b'},
				{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
				{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
				{title : 'Example 1', inline : 'span', classes : 'example1'},
				{title : 'Example 2', inline : 'span', classes : 'example2'},
				{title : 'Table styles'},
				{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
			],

			// Replace values for the template plugin
			template_replace_values : {
				username : "Some User",
				staffid : "991234"
			}
		});
	
		$("#tanggal").datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange: "c-70:c+0"
		});
	
		$("form").validate();
		
		/*oTable = $('#example').dataTable({
						"bJQueryUI": true,
						"sPaginationType": "full_numbers"
					});
					*/
		$( ".klik" ).button();
	  
    });
  </script>
</head>
<body>
	<div id="container">
		<div id="header"><h2>Admin</h2></div>
		<div id="content">
			<div id="sidebar">
			  <ul>
				  <li><a href="index.php">Beranda</a></li>
				<li><a href="?pg=admin/data_admin">Data Admin</a></li>
				<li><a href="?pg=pendaftaran/data_pendaftar">Data Pendaftaran</a></li>
				<li><a href="?pg=mahasiswa/data_mahasiswa">Data Mahasiswaa</a></li>
				<li><a href="?pg=kontak/data_kontak">Buku Tamu</a></li>
				<li><a href="?pg=home/data_home">Home</a></li>
				<li><a href="?pg=slide/data_slide">Home Slide</a></li>
				<li><a href="?pg=content/data_content">Tentang Kami</a></li>
				<li><a href="?pg=jurusan/data_jurusan">Jurusan</a></li>
				<li><a href="?pg=kegiatan/data_kegiatan">Kegiatan</a></li>
				<li><a href="logout.php">Keluar</a></li>
			  </ul>
			</div>
			<div id="c-isi">
			<?php
				if(isset($_GET['li']))
				{ //jika bernilai pg maka akan memanggil file content.php yang berada pada folder include
					include"content/lihat_content.php";
				}
				elseif(isset($_GET['pg']))
				{
					include "$_GET[pg].php";
				}else{
					include"home.php"; // jika tidak bernilai pg maka akan menampilkan file home.php
				}
			?>
			</div>
			<div style="clear:both;"></div>
		</div>
		<div id="footer">Copyright&copy;BHIS INTERNATIONAL SCHOOL | <?php echo date('Y'); ?></div>
	</div>
</body>
</html>