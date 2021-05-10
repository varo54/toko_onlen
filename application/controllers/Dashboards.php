<?php

class Dashboards extends CI_Controller{

    public function tambah_ke_keranjang($id)
    {
        $barang = $this->Model_barangs->find($id);

        $data = array(
            'id'      => $barang->id_brg,
            'qty'     => 1,
            'price'   => $barang->harga,
            'name'    => $barang->nama_brg,
    );
    
    $this->cart->insert($data);
    redirect('welcome');
    }

    public function detail_keranjang()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('keranjang');
        $this->load->view('templates/footer');
    }

    public function hapus_keranjang()
    {
        $this->cart->destroy();
        redirect('welcome');
    }

    public function pembayaran()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pembayaran');
        $this->load->view('templates/footer');
    }

    public function proses_psn()
    {
        $is_processed = $this->Model_invoices->index();
        if($is_processed){
            $this->cart->destroy();
            redirect('Dashboards/proses_pesanan/'.$is_processed);
        }else{
            echo "Maaf,Pesanan Anda Gagal diproses";
        }
        
    }

    public function proses_pesanan($is_processed)
    {
        $data['Invoices'] = $this->Model_invoices->ambil_id_invoice($is_processed);

        $data['pesanan'] = $this->Model_invoices->ambil_id_pesanan($is_processed);
        if($is_processed){
            $this->cart->destroy();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('proses_pesanan',$data);
            $this->load->view('templates/footer');
        }else{
            echo "Maaf,Pesanan Anda Gagal diproses";
        }
    }

    public function detail($id_brg)
    {
        $data['brg'] = $this->Model_barangs->detail_brg($id_brg);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('detail_barang',$data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data = array(
            "id" => $_POST["product_id"],
            "name" => $_POST["product_name"],
            "qty" => $_POST["quantity"],
            "price" => $_POST["product_price"],
        );
        $this->cart->insert($data);
        echo $this->view();
    }

    public function view()
    {
        $output = '';

    $count = 0;
    foreach($this->cart->contents() as $items)
    {
        $gambar = $this->Model_barangs->cari_gambar($items["id"]);
        $count++;
        $output .='
        <div class="row">
        <div class="col-4">
            <div class="item-pic">
                <img src="'.base_url().'/uploads/'.$gambar->gambar.'" class="img-fluid" alt="product">
            </div>
        </div>
        <div class="col-8 pl-0">
            <h6 class="item-name">'.$items["name"].'</h6>
            <p class="item-price"><span class="badge badge-pill badge-success mb-3">Rp. '.number_format($items["price"],0,',','.').'</span>&nbsp;&nbsp;'.$items["qty"].'x</p>
            <span class="item-remove remove_inventory" id="'.$items["rowid"].'"><i class="fa fa-times" aria-hidden="true"></i></span>
        </div>                           
    </div>
        ';
    }

    $output .= '<hr>
    <div class="text-center"><strong>Total: Rp. '.number_format($this->cart->total(),0,',','.').'</strong></div>
    ';

    if($count == 0)
    {
        $output = 'Cart is Empty';
    }
    return $output;
    }

    public function load()
    {
        echo $this->view();
    }

    public function remove()
    {
        $row_id = $_POST["row_id"];
        $data = array(
            'rowid' => $row_id,
            'qty'   => 0
        );
        $this->cart->update($data);
        echo $this->view();
    }

    public function totalcart()
    {
        echo $this->cart->total_items();
    }

    public function search()
    {
        $searchinput = $this->input->post('searchinput');

        $data['barang'] = $this->Model_barangs->search_barang($searchinput);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('searchpage',$data);
        $this->load->view('templates/footer');
    }

    public function cek_pembelian()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('cek_pembelian');
        $this->load->view('templates/footer');
    }

    public function cari_invoice()
    {
        $id_invoice = $_POST["Invoices"];
        $cek_invoice = $this->Model_invoices->check_invoice($id_invoice);
        $datainvoice = $this->Model_invoices->ambil_id_invoice($id_invoice);
        if($datainvoice){
        $status = $datainvoice->status;
        $nama = $datainvoice->nama;
        }
        $output_invoice = ' ';
        if($cek_invoice == true)
        {
            $datapsn = $this->Model_invoices->get_pesan($id_invoice);
            $output_invoice .= '
            <h4>Detail Pembelian <div class="btn btn-sm btn-success">No. Invoice: '.$id_invoice.'</div></h4>
            <br>
            <table class="table table-bordered table-hover table-striped">
            <h5><strong>Nama Pembeli: '.$nama.'</strong></h5>          
            <tr>
            <th>NAMA PRODUK </th>
            <th>JUMLAH PESANAN</th>
            <th>HARGA SATUAN</th>
            <th>SUB-TOTAL</th>
            </tr>';

            $total = 0;
            foreach($datapsn as $psn):
            $subtotal = $psn->jumlah * $psn->harga;
            $total += $subtotal;

            $output_invoice .='
            <tr>
            <td>'.$psn->nama_brg.'</td>
            <td>'.$psn->jumlah.'</td>
            <td>Rp. '.number_format($psn->harga,0,',','.').'</td>
            <td>Rp. '.number_format($subtotal,0,',','.').'</td>
            </tr>';
            endforeach;
            $output_invoice .='
            <tr>
            <td colspan="3" align="right">Grand Total</td>
            <td align="right">Rp. '.number_format($total,0,',','.').'</td>
            </tr>
            </table>

            <h4 class="float-right mr-2"><strong>Status: '.$status.'</strong></h4>
                        
            ';
            echo $output_invoice;
  
        }
        else
        {
            $output_invoice .= '<h2>Maaf Data Tidak Ditemukan </h2>';
            echo $output_invoice;
        }
    }

    }
