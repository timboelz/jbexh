<div class="span9">
 <div id="wrapper">
                <ol class="breadcrumb">
                    <li><a href="<?php echo site_url('dashboard/index')?>"><i class="fa fa-dashboard"></i> Home </a></li>
                    <li class="active"><a href="<?php echo site_url('produk/index')?>"><i class="fa fa-table"></i></a></li>
                </ol>
              <hr />
                  <div  class="table-responsive">
                  <table class="table table-hover tablesorter">
                  <thead>
                  <tr>
                      <th>Kode Transaksi   <i class="fa fa-sort"></i></th>
                      <th>Nama Pengirim <i class="fa fa-sort"></i></th>
                      <th>Status <i class="fa fa-sort"></i></th>
                      <th>Action <i class="fa fa-sort"></i></th>
                      
                  </tr>
                  </thead>

                  <tbody>
                  <?php
                  $no=1;
                     if(!empty($query)) 
                        { foreach($query->result_array() as $row) 
                          { ?> 
                              <tr>
                              <td><?php echo $row['kode_transaksi']  ?></td>
                              <td><?php echo $row['nama_pengirim'] ?></td>
                              <td><?php echo $row['STATUS'] ?></td>
                              
                              <td align="center">
                              <div  align="center" >
<a class="btn btn-small" onclick="return confirm('Anda yakin?')" href="<?php echo site_url('produk/updatestatus/'.$row['kode_transaksi'])?>"><i class="icon-pencil"></i> Update</a>
                <? } ?> 
                                 </div> 
                              </td>
                          </tr>
                            
                      <?php }
                  
                  ?>
                  <tr><th COLSPAN="11"> Jumlah Data : <?php echo $count ?></th></tr>  
                  </tbody>
              </table>
               
<div class="pagination" align="center">
     <ul> 
       <li><?php echo $this->pagination->create_links(); ?></li>
      </ul>
  </div>
           
      </div>
    </div>
