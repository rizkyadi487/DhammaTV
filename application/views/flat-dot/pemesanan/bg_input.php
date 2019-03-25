<script type="text/javascript">
function hitSisa()
{
	var total = document.getElementById("jumlah_harga").value;
	var uang_muka = document.getElementById("uang_muka").value;
	var sisa = eval(total-uang_muka);
	document.frm_pesan.sisa_bayar.value = sisa;
}
</script>
<div id="content" class="span11">
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title="">
			<h2><i class="halflings-icon hdd"></i><span class="break"></span>
			<i class="halflings-icon plus-sign"></i><a href="<?php echo base_url(); ?>dashboard/pemesanan/tambah">Tambah Data</a><span class="break"></span>
			Data Pemesanan</h2>
		</div>
		<div class="box-content">
			<?php echo form_open_multipart("dashboard/pemesanan/simpan",'class="form-horizontal" name="frm_pesan"'); ?>
			  <fieldset>
			  
				<div class="control-group">
				  <label class="control-label">No Nota</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" value="<?php echo $no_nota; ?>" name="no_nota" required readonly="true" />
				  </div>
				</div>
			  
				<div class="control-group">
				  <label class="control-label">Produser</label>
				  <div class="controls">
					<select data-placeholder="Cari nama Produser..." class="chzn-select" style="width:400px;" tabindex="2" name="kode_user" id="kode_user">
          		<option value=""></option> 
					<?php
						foreach($user->result_array() as $dp)
						{
						$pilih='';
						if($dp['kode_user']==$this->session->userdata("kode_user"))
						{
						$pilih='selected="selected"';
					?>
						<option value="<?php echo $dp['kode_user']; ?>" <?php echo $pilih; ?>><?php echo $dp['nama_user']; ?></option>
					<?php
					}
					else
					{
					?>
						<option value="<?php echo $dp['kode_user']; ?>"><?php echo $dp['nama_user']; ?></option>
					<?php
					}
						}
					?>
				</select>
				  </div>
				</div>
				
				<div class="control-group">
				  <label class="control-label">Acara</label>
				  <div class="controls">
					<select data-placeholder="Cari nama Acara..." class="chzn-select2" style="width:400px;" tabindex="2" name="id_jenis_acara" id="id_jenis_acara">
          		<option value=""></option> 
					<?php
						foreach($acara->result_array() as $dp)
						{
						$pilih='';
						if($dp['id_jenis_acara']==$this->session->userdata("id_jenis_acara"))
						{
						$pilih='selected="selected"';
					?>
						<option value="<?php echo $dp['id_jenis_acara']; ?>" <?php echo $pilih; ?>><?php echo $dp['acara']; ?></option>
					<?php
					}
					else
					{
					?>
						<option value="<?php echo $dp['id_jenis_acara']; ?>"><?php echo $dp['acara']; ?></option>
					<?php
					}
						}
					?>
				</select>
				  </div>
				</div>
			  
				<div class="control-group">
				  <label class="control-label">Tanggal Pesan</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" id="tgl_pesan" value="<?php echo $tgl_pesan; ?>" name="tgl_pesan" required />
				  </div>
				</div>
			  
				<div class="control-group">
				  <label class="control-label">Tanggal Produksi</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" id="tgl_selesai" value="<?php echo $tgl_selesai; ?>" name="tgl_selesai" required />
				  </div>
				</div>
				
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
					<thead>
						<tr>
							<th>No.</th>
							<th>Nama Crew</th>
							<th><a href="<?php echo base_url(); ?>dashboard/pemesanan/tambah_item" class="cbbarang btn btn-warning btn-small">Tambah Crew</a></th>
						</tr>
					</thead> 
					<?php $i = 1; $no=1;?>
					<?php foreach($this->cart->contents() as $items): ?>
					
					<?php echo form_hidden('rowid[]', $items['rowid']); ?>
					<tr class="content">
						
						<td><?php echo $no; ?></td>
						<td><?php echo $items['name']; ?></td>
						<td align="center">
						<a href="#" class="delbutton" id="<?php echo $items['rowid']; ?>" class="btn btn-small">Hapus</a>
						</td>
					</tr>
	  	
				<?php $i++; $no++;?>
				<?php endforeach; ?>
				</table>
				
				<div class="control-group">
				  <label class="control-label">Narasumber</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" id="narasumber_shooting" value="<?php echo $alamat_shooting; ?>" name="narasumber_shooting" required />
				  </div>
				</div>
				
				<div class="control-group">
				  <label class="control-label">Presenter</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" id="presenter_shooting" value="<?php echo $alamat_shooting; ?>" name="presenter_shooting" required />
				  </div>
				</div>
				
				<div class="control-group">
				  <label class="control-label">Alamat Shooting</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" id="alamat_shooting" value="<?php echo $alamat_shooting; ?>" name="alamat_shooting" required />
				  </div>
				</div>
				
				<div class="control-group">
				  <label class="control-label">Naskah</label>
				  <div class="controls">
					<input type="file" value="<?php echo $naskah;?>" class="input-xlarge" name="naskah" />
				  </div>
				</div>
			  
				<div class="control-group">
				  <label class="control-label">Status Shooting</label>
				  <div class="controls">
					Belum Shooting
				  </div>
				</div>
				
				<div class="form-actions">
				  <button type="submit" class="btn btn-primary">Save changes</button>
				  <button type="reset" class="btn">Cancel</button>
				</div>
			  </fieldset>
			<script src="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/js/chosen.jquery.js" type="text/javascript"></script>
			<script type="text/javascript"> 
			
				$(".chzn-select").chosen().change(function(){ 
						var kode_user = $("#kode_user").val(); 
						$.ajax({ 
						url: "<?php echo base_url(); ?>dashboard/pemesanan/set_kd_user", 
						data: "kode_user="+kode_user, 
						cache: false, 
						success: function(msg){} 
				})
				});
				
				$(".chzn-select2").chosen().change(function(){ 
						var id_jenis_acara = $("#id_jenis_acara").val(); 
						$.ajax({ 
						url: "<?php echo base_url(); ?>dashboard/pemesanan/set_id_jenis_acara", 
						data: "id_jenis_acara="+id_jenis_acara, 
						cache: false, 
						success: function(msg){} 
				})
				});
				
				$(".chzn-select3").chosen();
				
				$(document).ready(function() {
					$(".delbutton").click(function(){
					 var element = $(this);
					 var del_id = element.attr("id");
					 var info = del_id;
					 if(confirm("Anda yakin akan menghapus?"))
					 {
							 $.ajax({
							 url: "<?php echo base_url(); ?>dashboard/pemesanan/hapus_pesanan", 
							 data: "kode="+info, 
							 cache: false, 
							 success: function(){
							 }
						 });	
					 	$(this).parents(".content").animate({ opacity: "hide" }, "slow");
						}
					 return false;
					 });
					 
					 $('#tgl_pesan').change(function() {
					  var tgl_pesan = $("#tgl_pesan").val(); 
						$.ajax({ 
						url: "<?php echo base_url(); ?>dashboard/pemesanan/set_tgl_pesanan", 
						data: "tgl_pesan="+tgl_pesan, 
						cache: false, 
						success: function(msg){} 
					}) 
					})
					 
					 $('#tgl_selesai').change(function() {
					  var tgl_selesai = $("#tgl_selesai").val(); 
						$.ajax({ 
						url: "<?php echo base_url(); ?>dashboard/pemesanan/set_tgl_selesai", 
						data: "tgl_selesai="+tgl_selesai, 
						cache: false, 
						success: function(msg){} 
					}) 
					})
					 
					 $('#jumlah_harga').change(function() {
					  var jumlah_harga = $("#jumlah_harga").val(); 
						$.ajax({ 
						url: "<?php echo base_url(); ?>dashboard/pemesanan/set_jumlah_harga", 
						data: "jumlah_harga="+jumlah_harga, 
						cache: false, 
						success: function(msg){} 
					}) 
					})
				})
			</script>
			<?php echo form_close(); ?> 
		</div>
	</div>

</div>
</div>
</div>