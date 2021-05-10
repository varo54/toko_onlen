<div class="container-fluid">
 <div class="alert-success">
<h3 class="text-center align-middle">Selamat Pesanan Anda Telah Berhasil Diproses</h3>
</div>
<br>
<h4>Detail Pesanan <div class="btn btn-sm btn-success">No. Invoice: <?php echo $Invoices->id?></div></h4>

<table class="table table-bordered table-hover table-striped">

<tr>
<th>NAMA PRODUK </th>
<th>JUMLAH PESANAN</th>
<th>HARGA SATUAN</th>
<th>SUB-TOTAL</th>
</tr>

<?php 
$total = 0;
foreach($pesanan as $psn):
    $subtotal = $psn->jumlah * $psn->harga;
    $total += $subtotal;
?>
<tr>
 <td><?php echo $psn->nama_brg?></td>
 <td><?php echo $psn->jumlah?></td>
 <td><?php echo number_format($psn->harga,0,',','.');?></td>
 <td><?php echo number_format($subtotal,0,',','.');?></td>
</tr>
<?php endforeach; ?>
<tr>
<td colspan="3" align="right">Grand Total</td>
<td align="right">Rp. <?php echo number_format($total,0,',','.'); ?></td>
</tr>
</table>

<a href="<?php echo base_url('admin/Invoices/index');?>">
<div class="btn btn-sm btn-primary">Kembali</div></a>

<h4 class="float-right mr-2"><strong>Status: <?php echo $Invoices->status?> </strong></h4>
</div>

