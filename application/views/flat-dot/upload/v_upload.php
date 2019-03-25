<div id="content" class="span11">
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title="">
			<h2><i class="halflings-icon hdd"></i><span class="break"></span>
			<i class="halflings-icon plus-sign"></i><a href="<?php echo base_url(); ?>dashboard/pengguna/tambah">Tambah Data</a><span class="break"></span>
			Data Pengguna</h2>
		</div>
		<div class="box-content">
	<?php echo $error;?>

	<?php echo form_open_multipart('dashboard/Upload/aksi_upload');?>

	<input type="file" name="berkas" />

	<br /><br />

	<input type="submit" value="upload" />

		</form>

		</div>
	</div>
</div>
</div>
</div>