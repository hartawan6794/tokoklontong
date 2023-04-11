<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<?php helper('settings'); ?>

<section class="content">
    <div class="row">
        <!-- tampilan date, kasir dan pelanggan -->
        <div class="col-lg-4">
            <div class="card card-widget">
                <div class="card-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align: center;">
                                <label for="date">Tanggal</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="date" id="date" value="<?= date('Y-m-d') ?>" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: center; width:30%">
                                <label for="user">Kasir</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" id="user" value="<?= $kasir?>" readonly class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: center; width:30%">
                                <label for="customer">Pelanggan</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" id="customer" value="Pelanggan" class="form-control">
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>

            </div>
        </div>

        <!-- nama barang dan quantity barang -->
        <div class="col-lg-4">
            <div class="card card-widget">
                <div class="card-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align: center;  width:30%">
                                <label for="barcode">Nama Barang</label>
                            </td>
                            <td>
                                <div class="form-group input-group">
                                    <input type="hidden" id="bstock_id">
                                    <input type="hidden" id="stok_harga">
                                    <input type="hidden" id="stok_jumlah">
                                    <input type="hidden" id="qty_cart">
                                    <input type="text" id="barcode" class="form-control" autofocus>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat show-btn" data-bs-toggle="modal" data-bs-target="#modal-item">
                                            <span class="fas fa-search"></span>
                                        </button>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: center;">
                                <label for="qty">Qty</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="qty" value="1" min="1" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <div>
                                    <button type="button" id="add_cart" class="btn btn-primary">
                                        <i class="fas fa-cart-plus"></i> Tambah
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card card-widget">
                <div class="card-body">
                    <div align="right">
                        <h4>Invoice <b><span id="invoice"><?= $invoice ?></span></b></h4>
                        <h1><b><span id="grand_total2" style="font-size: 47.5pt">0</span></b></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- tabel keranjang -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-widget">
                <div class="card-body table-responsive">
                    <table id="cart_table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Barcode</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th width="10%">Total Diskon</th>
                                <th width="15%">Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- sub-total/diskon/grand_total -->
        <div class="col-lg-3">
            <div class="card card-widget">
                <div class="card-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align: top; width:30%">
                                <label for="sub_total">Sub Total</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="sub_total" value="" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top;">
                                <label for="diskon">Diskon</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="diskon" value="0" min="0" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top;">
                                <label for="grand_total">Grand Total</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="grand_total" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Tunai/Kembalian -->
        <div class="col-lg-3">
            <div class="card card-widget">
                <div class="card-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align: top; width:30%">
                                <label for="tunai">Tunai</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="tunai" value="0" min="0" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top;">
                                <label for="kembalian">Kembalian</label>
                            </td>
                            <td>
                                <input type="number" id="kembalian" class="form-control" readonly>
                            </td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>

        <!-- catatan -->
        <div class="col-lg-3">
            <div class="card card-widget">
                <div class="card-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align: top; width:30%">
                                <label for="note">Catatan</label>
                            </td>
                            <td>
                                <textarea name="note" id="note" rows="3" class="form-control"></textarea>
                            </td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>

        <!-- reset/proses_pembayaran -->
        <div class="col-lg-3">
            <div>
                <button id="cancel_payment" class="btn btn-flat btn-warning">
                    <i class="fas fa-sync-alt"></i> Reset
                </button><br><br>
                <button id="prosess_payment" class="btn btn-flat btn-lg btn-success">
                    <i class="fas fa-paper-plane"></i> Proses Pembayaran
                </button>
            </div>
        </div>

    </div>
</section>

<!-- modal item -->
<div class="modal fade" id="modal-item">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-tittle">Pilih Barang</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped" id="table1" width="100%">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Barcode</td>
                            <td>Nama</td>
                            <td>Unit</td>
                            <td>Harga</td>
                            <td>Stock</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($item as $data) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data->bstock_custom_code ?></td>
                                <td><?= $data->bstock_nama_barang ?></td>
                                <td><?= $data->bstock_unit ?></td>
                                <td class="text-right"><?= rupiah($data->bstock_harga) ?></td>
                                <td class="text-right"><?= $data->bstock_ready_stock ?></td>
                                <td class="text-center">
                                    <button class="btn btn-xs btn-info" id="select" data-id="<?= $data->bstock_id ?>" data-harga="<?= $data->bstock_harga ?>" data-barcode="<?= $data->bstock_custom_code ?>" data-stok="<?= $data->bstock_ready_stock ?>">
                                        <i class="fas fa-check"></i> Select
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

</div>

<!-- Modal ubah item -->
<div class="modal fade" id="modal-item-edit">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-tittle">Ubah Produk</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="cartid_item">
                <div class="form-group">
                    <label for="product_item">Produk Item</label>
                    <div class="row">
                        <!-- <div class="col-md-5">
                            <input type="text" id="barcode_item" class="form-control" readonly>
                        </div> -->
                        <div class="col-md-12">
                            <input type="text" id="product_item" class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="harga_item">Harga</label>
                    <input type="number" id="harga_item" min="0" class="form-control">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-7">
                            <label for="qty_item">Qty</label>
                            <input type="number" id="qty_item" min="1" class="form-control">
                        </div>
                        <div class="col-md-5">
                            <label>Stok Item</label>
                            <input type="number" id="stock_item" min="1" class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="total_before">Total sebelum diskon</label>
                    <input type="number" id="total_before" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="diskon_item">Dikon per item</label>
                    <input type="number" id="diskon_item" min="0" class="form-control">
                </div>
                <div class="form-group">
                    <label for="total_after">Total setelah diskon</label>
                    <input type="number" id="total_after" min="0" class="form-control" readonly>
                </div>
            </div>
            <div class="modal-footer">
                <div class="float-right">
                    <button type="button" id="edit_cart" class="btn btn-flat btn-success">
                        <i class="fas fa-paper-plane"></i> Simpan
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>


<!-- page script -->
<?= $this->section("pageScript") ?>

<script>
    // dataTables
    $(function() {
        calculate()
        var table = $('#cart_table').removeAttr('width').DataTable({
            "paging": false,
            "lengthkembalian": false,
            "searching": false,
            "ordering": true,
            "info": false,
            "autoWidth": false,
            // "scrollY": '45vh',/*  */
            "scrollX": true,
            "scrollCollapse": false,
            "responsive": true,
            "ajax": {
                "url": '<?php echo base_url("/transaksi/getCartData") ?>',
                "type": "POST",
                "dataType": "json",
                async: "true"
            }
        });
    });

    $(document).on('click', '#select', function() {
        $('#bstock_id').val($(this).data('id'));
        $('#stok_harga').val($(this).data('harga'));
        $('#barcode').val($(this).data('barcode'));
        $('#stok_jumlah').val($(this).data('stok'));
        $('#modal-item').modal('hide');
        get_cart_qty($(this).data('id'))
    })

    function get_cart_qty(bstock_id) {
        $.ajax({
            type: 'POST',
            url: '<?= base_url('transaksi/getcart') ?>',
            data: {
                'bstock_id': bstock_id
            },
            dataType: 'json',
            success: function(result) {
                $('#qty_cart').val(result.data)
            }
        })
    }

    $(document).on('click', '#add_cart', function() {
        var bstock_id = $('#bstock_id').val()
        var stok_harga = $('#stok_harga').val()
        var stok_jumlah = $('#stok_jumlah').val()
        var qty = $('#qty').val()
        var qty_cart = $('#qty_cart').val()

        if (bstock_id == '') {
            alert('Produk belum dipilih')
            $('barcode').focus()
        } else if (stok_jumlah < 1) {
            alert('Stok tidak mencukupi')
            $('#qty').focus()
        } else if ((parseInt(qty) + parseInt(qty_cart)) > parseInt(stok_jumlah)) {
            alert("stok tidak mencukupi, qty yang di masukan dalam keranjang sejumlah " + qty_cart + " sisa stock : " + (stok_jumlah - qty_cart) + "")
        } else if (qty == 0) {
            alert('Jumlah barang tidak boleh kosong')
            $('#item_id').val('')
            $('#barcode').val('')
            $('#qty').val('1')
            $('#barcode').focus()
        } else {
            $.ajax({
                type: 'POST',
                url: '<?= site_url('transaksi/addcart') ?>',
                data: {
                    // 'add_cart': true,
                    'bstock_id': bstock_id,
                    'harga': stok_harga,
                    'qty': qty
                },
                dataType: 'json',
                success: function(result) {
                    if (result.success == true) {
                        $('#cart_table').DataTable().ajax.reload(null, false).draw(false);
                        calculate();
                        $('#bstock_id').val('')
                        $('#barcode').val('')
                        $('#qty').val('1')
                        $('#barcode').focus()
                    } else {
                        alert('Gagal tambah barang ke keranjang')
                    }
                }

            })
        }
    })

    $(document).on('click', '#delete_cart', function() {
        if (confirm('Apakah anda yakin?')) {
            var cartid = $(this).data('id_cart')
            // console.log(cartid);
            $.ajax({
                type: 'POST',
                url: '<?= site_url('transaksi/cart_delete') ?>',
                data: {
                    'id_cart': cartid
                },
                dataType: 'json',
                success: function(result) {
                    if (result.success == true) {
                        $('#cart_table').DataTable().ajax.reload(null, false).draw(false);
                        calculate();
                    } else {
                        alert('Gagal hapus item cart')
                    }
                }
            })
        }
    })

    $(document).on('click', '#update_cart', function() {
        $('#cartid_item').val($(this).data('id_cart'));
        // $('#barcode_item').val($(this).data('barcode'));
        $('#product_item').val($(this).data('product'));
        $('#stock_item').val($(this).data('stock'));
        $('#harga_item').val($(this).data('harga'));
        $('#qty_item').val($(this).data('qty'));
        $('#total_before').val($(this).data('harga') * $(this).data('qty'));
        $('#diskon_item').val($(this).data('diskon'));
        $('#total_after').val($(this).data('total'));
        $('#modal-edit-item').modal('hide');
    })

    function count_edit_modal() {
        var harga = $('#harga_item').val()
        var qty = $('#qty_item').val()
        var diskon = $('#diskon_item').val()

        total_before = harga * qty;
        $('#total_before').val(total_before)

        total_after = (harga - diskon) * qty
        $('#total_after').val(total_after)
    }

    $(document).on('keyup mouseup', '#harga_item, #qty_item, #diskon_item', function() {
        count_edit_modal();
    })

    //fitur untuk
    $(document).on('click', '#edit_cart', function() {
        var id_cart = $('#cartid_item').val()
        var harga = $('#harga_item').val()
        var qty = $('#qty_item').val()
        var diskon = $('#diskon_item').val()
        var total = $('#total_after').val()
        var stock = $('#stock_item').val()

        if (harga == '' || harga == 0) {
            alert('Harga tidak boleh kosong')
            $('#harga_item').focus()
        } else if (qty == '' || qty < 1) {
            alert('Qty tidak boleh kosong')
            $('#qty_item').focus();
        } else if (parseInt(qty) > parseInt(stock)) {
            alert("Stok tidak mencukupi")
            $('#qty_item').focus();
        } else {
            $.ajax({
                type: 'POST',
                url: '<?= site_url('transaksi/edit_cart') ?>',
                data: {
                    'id_cart': id_cart,
                    'harga': harga,
                    'qty': qty,
                    'diskon': diskon,
                    'total': total
                },
                dataType: 'json',
                success: function(result) {
                    if (result.success) {
                        $('#cart_table').DataTable().ajax.reload(null, false).draw(false);
                        calculate();
                        alert('Data item cart telah dirubah')
                        $('#modal-item-edit').modal('hide')
                    } else {
                        alert('Data item cart tidak terubah')
                        $('#modal-item-edit').modal('hide')
                    }
                }

            })
        }
    })

    //kalkulasi jumlah penjualan yang ada dalam tabel, sub total belanja - diskon untuk mendapatkan total harga
    function calculate() {
        var subtotal = 0;
        $.ajax({
            type: 'POST',
            url: '<?= base_url('transaksi/getSubTotal') ?>',
            dataType: 'json',
            success: function(result) {
                subtotal = result.data;
                isNaN(subtotal) ? $('#sub_total').val(0) : $('#sub_total').val(subtotal)

                var diskon = $('#diskon').val()
                var grand_total = subtotal - diskon
                if (isNaN(grand_total)) {
                    $('#grand_total').val(0)
                    $('#grand_total2').text(0)
                } else {
                    $('#grand_total').val(grand_total)
                    $('#grand_total2').text(grand_total)
                }

                var tunai = $('#tunai').val();
                tunai != 0 ? $('#kembalian').val(tunai - grand_total) : $('#kembalian').val(0)

                if (diskon == '') {
                    $('#diskon').val(0)
                }
            }
        })

    }

    $(document).on('keyup mouseup', '#diskon, #tunai', function() {
        calculate()
    })

    $(document).ready(function() {
        calculate();
    })

    //hapus semua data belanja
    $(document).on('click', '#cancel_payment', function(){
        if(confirm('Apakah anda yakin?')){
            $.ajax({
                type : 'POST',
                url : '<?= site_url('transaksi/cart_delete')?>',
                dataType : 'json',
                data : {'cancel_payment' : true},
                success : function(result){
                    if(result.success = true){
                        $('#cart_table').DataTable().ajax.reload(null, false).draw(false);
                        calculate();
                    }
                }
            })
            $('#diskon').val(0)
            $('#tunai').val(0)
            $('#barcode').val('')
            $('#note').val('')
            $('#customer').val('').change()
            $('#barcode').focus()
        }
    })

    //proses pembayaran
    $(document).on('click','#prosess_payment',function(){
        var nm_kostumer = $('#customer').val()
        var invoice = $('#invoice').val()
        var total_harga = $('#sub_total').val()
        var diskon = $('#diskon').val()
        var harga_final = $('#grand_total').val()
        var tunai = $('#tunai').val()
        var kembalian = $('#kembalian').val()
        var catatan = $('#note').val()
        var date = $('#date').val()

        if(total_harga < 1){
            alert('Belum ada produk yang dipilih')
            $('#barcode').focus()
        }else if(tunai < 1){
            alert('Jumlah uang tunai belum di masukan')
            $('#tunai').focus()
        }else{
            if(confirm('Yakin proses transaksi ini ?')){
                $.ajax({
                    type : 'POST',
                    url : '<?= site_url('transaksi/prosesPembayaran')?>',
                    dataType : 'json',
                    data : {'nm_kostumer' : nm_kostumer, 'total_harga' : total_harga, 'diskon' : diskon, 'harga_final' : harga_final, 'tunai' : tunai, 'kembalian' : kembalian, 'catatan' : catatan, 'date' : date},
                    success : function(result){
                        if(result.success == true){
                            alert('Transaksi berhasil')
                            window.open('<?= site_url('transaksi/cetak/')?>'+result.transaksi_id, '_blank')
                        }else{
                            alert('Transaksi gagal')
                        }
                        location.href='<?= site_url('transaksi')?>'
                    }
                })
            }
        }
    })

</script>

<?= $this->endSection() ?>