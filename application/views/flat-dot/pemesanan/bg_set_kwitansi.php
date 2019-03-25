<script type="text/javascript">
function hitSisa()
{
	var total = document.getElementById("jumlah_harga").value;
	var bayar = document.getElementById("bayar").value;
	var sisa = eval(bayar-total);
	document.frm_pesan.kembalian.value = sisa;
}



</script>
	<div id="content" class="span11">
	<div class="row-fluid sortable">		
		<div class="box span12">
			<div class="box-header" data-original-title="">
				<h2><i class="halflings-icon hdd"></i><span class="break"></span>
				Form Konfirmasi</h2>
			</div>
			<div class="box-content">
				<?php echo form_open_multipart("dashboard/pemesanan/simpan_pembayaran",'class="form-horizontal" name="frm_pesan" '); ?>
				  <fieldset>
				  
					<div class="control-group">
					  <label class="control-label">No Kwitansi</label>
					  <div class="controls">
						<input type="text" class="input-xlarge" value="<?php echo $kode_pembayaran; ?>" name="kode_pembayaran" required readonly="true" />
					  </div>
					</div>
				  
					<div class="control-group">
					  <label class="control-label">No Nota</label>
					  <div class="controls">
						<input type="text" class="input-xlarge" value="<?php echo $no_nota; ?>" name="no_nota" required readonly="true" />
					  </div>
					</div>
				  
					<div class="control-group">
					  <label class="control-label">Produser</label>
					  <div class="controls">
						<select data-placeholder="Cari nama Produser..." class="chzn-select" style="width:400px;" tabindex="2" name="kode_user" id="kode_user" 
						disabled="disabled">
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
					  <label class="control-label">Presenter</label>
					  <div class="controls">
						<input type="text" class="input-xlarge" id="presenter_shooting" value="<?php echo $presenter_shooting; ?>" name="presenter_shooting" required />
					  </div>
					</div>
					
					<div class="control-group">
					  <label class="control-label">Narasumber</label>
					  <div class="controls">
						<input type="text" class="input-xlarge" id="narasumber_shooting" value="<?php echo $narasumber_shooting; ?>" name="narasumber_shooting" required />
					  </div>
					</div>
					
					<div class="control-group">
					  <label class="control-label">Alamat</label>
					  <div class="controls">
						<input type="text" class="input-xlarge" id="alamat_shooting" value="<?php echo $alamat_shooting; ?>" name="alamat_shooting" required />
					  </div>
					</div>
										
					<div class="control-group">
					  <label class="control-label">Tanggal</label>
					  <div class="controls">
						<input type="text" class="input-xlarge" id="tgl_pesan" value="<?php echo $tgl_pesan; ?>" name="tgl_pesan" required disabled="disabled" />
					  </div>
					</div>
				  
					<div class="control-group">
					  <label class="control-label">Tanggal Produksi</label>
					  <div class="controls">
						<input type="text" class="input-xlarge" id="tgl_selesai" value="<?php echo $tgl_selesai; ?>" name="tgl_selesai" required disabled="disabled" />
					  </div>
					</div>
				  
					<div class="control-group">
					  <label class="control-label">Konfirmasi</label>
					  <div class="controls">
						<input type="text" class="input-xlarge" id="tgl_bayar" value="<?php echo date("d F Y");?>" name="tgl_bayar" onChange="hitTanggal()" required />
					  </div>
					</div>
					
					<script>
						function hitTanggal(){
							var date1 = document.getElementById("tgl_selesai").value;
							var date2 = document.getElementById("tgl_bayar").value;
							if(date2 < date1){
								alert("Maaf, tanggal yang anda masukkan kurang dari tanggal produksi");
							}
						}
					</script>
					
					<table class="table table-striped table-bordered bootstrap-datatable datatable">
						<thead>
							<tr>
								<th>No.</th>
								<th>Nama Crew</th>
							</tr>
						</thead> 
						<?php $i = 1; $no=1;?>
						<?php foreach($this->cart->contents() as $items): ?>
						
						<?php echo form_hidden('rowid[]', $items['rowid']); ?>
						<tr class="content">
							
							<td><?php echo $no; ?></td>
							<td><?php echo $items['name']; ?></td>
						</tr>
			
					<?php $i++; $no++;?>
					<?php endforeach; ?>
					</table>
			  
				<div class="control-group">
				  <label class="control-label">Status Shooting</label>
				  <div class="controls">
				  <?php echo $status_pembayaran; ?>
				  </div>
				</div>
				
				<div class="form-actions">
				  <button type="submit" class="btn btn-primary">Konfirmasi Selesai</button>
				  <button type="reset" class="btn">Cancel</button>
				</div>
					
				  </fieldset>
				<script src="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/js/chosen.jquery.js" type="text/javascript"></script>
				<script type="text/javascript"> 
					$(".chzn-select").chosen();
					$(".chzn-select2").chosen();
				</script>
				<?php echo form_close(); ?> 
			</div>
		</div>
	
	</div>
	</div>
	</div>