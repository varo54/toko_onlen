<div class="container-fluid">

    <div class="card">
    <h5 class="card-header">Detail Produk</h5>
    <div class="card-body">
        <div  class="row">
            <div class="col-md-4"> 
                <img src="<?php echo base_url().'uploads/'.$brg->gambar?>" class="card-img-top">
            </div>

            <div class="col-md-8"> 
            <table class="table">
                <tr>
                <td>Nama Produk</td>
                <td><strong><?php echo $brg->nama_brg?></strong></td>
                </tr>

                <tr>
                <td>Keterangan</td>
                <td><strong><?php echo $brg->keterangan?></strong></td>
                </tr>

                <tr>
                <td>Kategoris</td>
                <td><strong><?php echo $brg->Kategoris?></strong></td>
                </tr>

                <tr>
                <td>Stok</td>
                <td><strong><?php echo $brg->stok?></strong></td>
                </tr>

                <tr>
                <td>Harga</td>
                <td><strong><div class="btn btn-sm btn-success">
                Rp. <?php echo number_format($brg->harga,0,',','.')?></div></strong></td>
                </tr>
            </table> 

            <button class="btn btn-sm btn-primary" data-toggle="modal" 
            data-target="#tambah_keranjang">Tambah ke Keranjang</button> 

            <?php echo anchor('welcome',
            '<div class="btn btn-sm btn-danger">Kembali</div>');?>
            </div>
        </div>
    </div>
    </div>

    <!-- Modal -->
<div class="modal fade" id="tambah_keranjang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Masukan ke Keranjang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row ml-1">
        <div class="col-xs-3">
            <label for="detail_jumlah"><strong>Jumlah</strong></label>
            <input class="form-control" id="detail_jumlah" type="text">
        </div>
        </div>
           
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary add_detail_cart" data-namabrg="<?php echo $brg->nama_brg?>"
        data-hargabrg="<?php echo $brg->harga?>" data-idbrg="<?php echo $brg->id_brg?>">
        Tambah</button>
      </div>
    </div>
  </div>
</div>

</div>