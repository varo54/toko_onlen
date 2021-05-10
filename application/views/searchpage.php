<div class="container-fluid">

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img class="d-block w-100" src="<?php echo base_url('assets/img/slider1.jpg');?>" alt="First slide">
        </div>
        <div class="carousel-item">
        <img class="d-block w-100" src="<?php echo base_url('assets/img/slider2.jpg');?>" alt="Second slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    </div>

    <div class="row text-center mt-4">
    <?php foreach($barang as $brg): ?>

        <div class="card ml-3 mb-3" style="width: 16rem;">
  <img class="card-img-top" src="<?php echo base_url().'/uploads/'.$brg->gambar?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title mb-1"><?php echo $brg->nama_brg ?></h5>
    <small><?php echo $brg->keterangan ?></small><br>
    <span class="badge badge-pill badge-success mb-3">Rp. <?php echo number_format($brg->harga,0,',','.') ?></span>
    
    <input type="text" name="quantity" class="mb-2 front-place" placeholder="Jumlah" id="<?php echo $brg->id_brg ?>">

    <button type="button" name="add_cart" class="btn btn-primary add_cart front-place"
    data-productname="<?php echo $brg->nama_brg?>" data-price="<?php echo $brg->harga?>"
    data-productid="<?php echo $brg->id_brg?>" data-totalcart="<?php echo $this->cart->total_items()?>">Add to Cart</button>
    
    <a href="<?php echo base_url('Dashboards/detail/'.$brg->id_brg);?>" class="stretched-link"></a>

    
  </div>
</div>

    <?php endforeach; ?>
    </div>

</div>