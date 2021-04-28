    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url();?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    
    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url();?>assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url();?>assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url();?>assets/js/demo/chart-area-demo.js"></script>
    <script src="<?php echo base_url();?>assets/js/demo/chart-pie-demo.js"></script>

    <script>
$(".item-remove").click(function(event) {
    event.preventDefault();
    $(this).parents('.item').remove();
});
</script>

    <script>
    $(document).ready(function(){

        $('.add_cart').click(function(){
            var product_id = $(this).data("productid");
            var product_name = $(this).data("productname");
            var product_price = $(this).data("price");
            var quantity = $('#' + product_id).val();
            if(quantity != '' && quantity > 0)
            {
                $.ajax({
                    url:"<?php echo base_url();?>dashboard/add",
                    method:"POST",
                    data:{product_id:product_id, product_name:product_name,
                          product_price:product_price, quantity:quantity},
                    success:function(data)
                    {
                        alert("Product Added into cart");
                        $('#items').html(data);
                        $('#' + product_id).val('');
                    }
                });
            }
            else
            {
              alert("Please Enter Quantity")
            }
        });

        $('#items').load("<?php echo base_url();?>dashboard/load");

      

        $(document).on('click', '.remove_inventory', function(){
            var row_id = $(this).attr("id");
            if(confirm("Delete barang ini?"))
            {
             $.ajax({
                 url:"<?php echo base_url();?>dashboard/remove",
                 method:"POST",
                 data:{row_id:row_id},
                 success:function(data)
                 {
                     alert("Barang berhasil dihapus dari cart");
                     $('#items').html(data);
                 }
             })
            }
            else
            {
             return false;
            }
        });
   


    $("body").on('DOMSubtreeModified', "#items", function() {
        $.ajax({
                 url:"<?php echo base_url();?>dashboard/totalcart",
                 method:"POST",
                 data:{},
                 success:function(data)
                 {
                     $('#items_count').html(data);
                 }
             });
    });

    $('.add_detail_cart').click(function(){
            var product_id = $(this).data("idbrg");
            var product_name = $(this).data("namabrg");
            var product_price = $(this).data("hargabrg");
            var quantity = $('#detail_jumlah').val();
            if(quantity != '' && quantity > 0)
            {
                $.ajax({
                    url:"<?php echo base_url();?>dashboard/add",
                    method:"POST",
                    data:{product_id:product_id, product_name:product_name,
                          product_price:product_price, quantity:quantity},
                    success:function(data)
                    {
                        alert("Product Added into cart");
                        $('#items').html(data);
                        $('#detail_jumlah').val('');
                        $('#tambah_keranjang').modal('hide');
                    }
                });
            }
            else
            {
              alert("Please Enter Quantity")
            }

        });



    $('.cari-invoice').click(function(){
        var invoice = $('#kd-invoice').val();
        $.ajax({
            url:"<?php echo base_url();?>dashboard/cari_invoice",
            method:"POST",
            data:{invoice:invoice},
            success:function(data)
            {
                $('#isi-invoice').html(data);
            }
        });
    });

});

      

    

    </script>

</body>

</html>

