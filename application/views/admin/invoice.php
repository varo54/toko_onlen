<div class="container-fluid">

<h4> Invoices Pemesanan Produk </h4>

<table class="table table-bordered table-hover table-striped"> 
<tr>
<th>Id Invoices</th>
<th>Nama Pemesan</th>
<th>Alamat Pengiriman</th>
<th>Tanggal Pemesanan</th>
<th>Batas Pembayaran</th>
<th>Aksi</th>
<th>Status</th>
</tr>

<?php foreach($Invoices as $inv):?>
<tr>
<td><?php echo $inv->id?></td>
<td><?php echo $inv->nama?></td>
<td><?php echo $inv->alamat?></td>
<td><?php echo $inv->tgl_pesan?></td>
<td><?php echo $inv->batas_bayar?></td>
<td><?php echo anchor('admin/Invoices/detail/'.$inv->id, '<div class="btn btn-sm btn-primary">Detail</div>')?></td>
<td><b><?php echo $inv->status?></b></td>
</tr>
<?php endforeach; ?>

</table>

</div>