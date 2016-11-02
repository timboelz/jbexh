<div class="span9">
    <h3> Invoice No.  <?php echo $generatenoshow; ?></h3>
    <form action="<?php echo site_url('user/inserttransaksi'); ?>" method="post">
				<table class="table table-striped table-hover">
					<thead>
						<tr align="center">
							<td >Jumlah</td>
							<td >Nama Barang</td>
							<td >Harga</td>
							<td >Sub Total</td>
							<td >Hapus</td>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach($this->cart->contents() as $items): ?>
						
						<?php echo form_hidden('rowid[]', $items['rowid']); ?>
						<tr>
					  		<td>
					  		<select type="text" name="qty[]" class="span1"/>
				  			<?php
				  			
							for($i=1;$i<=1000;$i++)	{
							if($i==$items['qty']) {
								echo "<option selected>".$items['qty']."</option>";
								//echo form_input(array('name' => 'qty[]', 'value' => $items['qty'], 'maxlength' => '2', 'size' => '1', 'class' => 'input-teks')); 
							}
							else {
								echo "<option>".$i."</option>";
								}
							}
							?>
						</select>
							</td>
							
							<td ><?php echo $items['name']; ?></td>
					  		<td >Rp. <?php echo $this->cart->format_number($items['price']); ?></td>
					  		<td >Rp. <?php echo $this->cart->format_number($items['subtotal']); ?></td>
				 		 	<td  align="center"><a href="<?php echo base_url(); ?>user/hapus_keranjang/<?php echo $items['rowid']; ?>"><i class="icon-trash"></i></a></td>
					  	</tr>
		<?php $i++; ?>
		<?php endforeach; ?>
						<tr>
							<td  colspan=3><b>Total Belanja</b></td>
 		 					<td  colspan=2>Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></td>
						</tr>
					</tbody>
				</table>			

                    <dl class="dl-horizontal pull-right">
                        <dt>Total:</dt>
                        <dd>Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></dd>
                        <br>
                    </dl>
			
			<div class="clearfix"></div>
    
   <input type="hidden" id="generateno" name="generateno" value="<?php echo $generateno ;?>">
   <input type="hidden" id="total" name="total" value="<?php echo $this->cart->total();?>">
   <input type="hidden" id="tgl_pembelian" name="tgl_pembelian" data-date-format="dd-mm-yyyy" value="<?php echo isset($date) ? $date : 
    date('d-m-Y')?>" data-date="12-02-2012">

<button type="submit" name="update_keranjang" value="update_keranjang" class="btn btn-primary"><i class="icon-ok-sign icon-white"></i> Update Keranjang Belanja</button>
&nbsp;

<!--<a href="<?php echo site_url('user/clearsession')?>"  class="btn btn-primary"><i class="icon-ok-sign icon-white"></i> Cancel</a>		
<a href="<?php echo site_url('member/lokasikirim')?>"  class="btn btn-success pull-right"><i class="icon-ok-sign icon-white"></i> Selesai</a>		-->
<?
if ($this->cart->total_items() == 0)
 { $disabled ="disabled";} else { $disabled ="";}
?>
     
<button type="submit" name="add" value="add" class="btn btn-success"><i class="icon-ok-sign icon-white"></i> Lanjut Belanja </button> 

<button type="submit" <?php echo $disabled; ?> name="selesai" value="selesai" class="btn btn-success pull-right"><i class="icon-ok-sign icon-white"></i> Selesai Belanja </button>   

			<hr>
		</form>
		</div>	
	<br>	

	
	<ul class="thumbnails">
		<li>* Apabila Anda mengubah jumlah (Qty), jangan lupa tekan tombol Update Keranjang Belanja</li>
		<li>* Untuk menghaspus barang pada keranjang belanja, silahkan ganti jumlah barang menjadi 0. Atau klik tombol Hapus.</li>
		<li>* Total harga di atas belum termasuk ongkos kirim yang akan dihitung saat Selesai Belanja</li>
	</ul>
</div>		
</div>
</div>
