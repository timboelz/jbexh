

<style type="text/css">
    .form_barang input[type="text"],
    .form_barang input[type="password"] {
        Font-size: 16px;
        Color: black;
        
        Height: auto;
        Margin-bottom: 15px;
        Padding: 7px 9px;
        Width: 300px;
    }
    .text-center{
        Text-align: center;
    }
</style>
<script type="text/javascript">
   $(function(){
      Window.prettyprint && prettyprint();
      $('#datein').datepicker();
      $('#dateexp').datepicker();
    });

</script>
<div class="span9">
   <div id="wrapper">
             
            
    <table>
      <fieldset style=" width:auto; border-color:#00ff00; border-width:thick; background-color: #f5f5f5;
                                    border-radius: 4px;
                                    list-style: none outside none;
                                    margin-bottom: 20px;
                                    padding: 8px 15px;">
      
              <li><a href="<?php echo site_url('produk/')?>"><i class="fa fa-dashboard"></i> master</a></li>
      
      </fieldset>
<form action="<?php echo site_url('produk/editproduk'); ?>" method="post" enctype="multipart/form-data" id="form_produk"> 
            <tr>
         <td >Kode Produk </td>
              <td>
                <input type="hidden" id="kode_produk_hide" name="kode_produk_hide" value="<?php echo $kode_produk_hide; ?>"/>
                <input type="text"  class="form-control"  id="kode_produk" name="kode_produk" disabled  value="<?php echo isset($infouser['kode_produk']) ? $infouser['kode_produk'] : ''; ?>"></td>
              </td>
            </tr>  
            
            <tr>
              <td><label>Nama Produk</label></td>
              <td><input type="text" class="form-control" required  name="nama_produk" value="<?php echo isset($infouser['nama_produk']) ? $infouser['nama_produk'] : ''; ?>"></td>
            </tr>

            <tr>
              <td><label>Kategori</label></td>
                  <td>
                      
<select name="satuan" class="form-control">
          <?php
            if($id_kategori2 == "1")
            {
              ?>
              <option value="1" selected="selected">Smartphone</option>
              <option value="2">Aksesoris</option>
              <?php
            }
            else if($id_kategori2=="2")
            {
              ?>
              <option value="1" >Smartphone</option>
              <option value="2" selected="selected">Aksesoris</option>
              <?php
            }
            
            else
            {
              ?>
               <option value="1" >Smartphone</option>
               <option value="2" >Aksesoris</option>
              <?php
            }
          ?>
        </select>



                      
                  </td> 
            </tr>

            <tr>     
<td><label>Harga beli</label> </td>
<td><input type="text"  class="form-control" required   name="harga" value="<?php echo isset($infouser['harga']) ? $infouser['harga'] : ''; ?>"></td>
            </tr>

            <tr>
<td><label>Stok</label> </td>
<td><input type="text"  class="form-control" required name="stok" value="<?php echo isset($infouser['stok']) ? $infouser['stok'] : ''; ?>"></td>
            </tr>
             
            <tr> 
<td><label>Deskripsi</label></td>
<td>
<textarea class="form-control" required name="deskripsi" id="deskripsi" cols="4" rows="4"><?php echo isset($infouser['deskripsi']) ? $infouser['deskripsi'] : ''; ?></textarea>
</td>
            </tr>

            <tr> 
<td><label>Gambar</label></td>
<td>
    <input type="file"  class="form-control"  name="image" value="<?php echo isset($infouser['gbr_besar']) ? $infouser['gbr_besar'] : ''; ?>"></td>
<td><img width="120px" src="<?php echo base_url('asset/produk/'.$infouser['gbr_besar'])?>"></td>
            </tr>
                     
            <tr>
                <td>
                    <button type="submit" value="add" class="btn btn-default" href="#">Update</button>
                    <button  class="btn btn-default" href="<?php echo site_url('produk/index')?>">Cancel</button>  
                </td>
            </tr>
      </form>
    </table>
  </div>
  <br>
    <fieldset style=" width:auto; border-color:#00ff00; border-width:thick; background-color: #f5f5f5;
                                    border-radius: 4px;
                                    list-style: none outside none;
                                    margin-bottom: 20px;
                                    padding: 8px 15px;">
    </fieldset>
      

