<?php helper('settings'); ?>
<html moznomarginboxes mozdisallowselectionprint>
    <head>
        <title>-- Print Nota --</title>
        <style type="text/css">
            html { font-family: "Tahoma";}
            .content{
                width: 100%;
                font-size: 10px;
                padding: 5px;
                margin-right: 40px;
            }
            .title{
                text-align: center;
                font-size: 13px;
                padding-bottom: 5px;
                border-bottom: 1px solid;
            }
            .head{
                margin-top: 5px;
                margin-bottom: 5px;
                padding-bottom: 5px;
                border-bottom: 1px solid;
            }
            table{
                width: 100%;
                font-size: 10px;
            }
            .thank{
                margin-top: 5px;
                padding-top: 10px;
                text-align: center;
                border-top: 1px solid;
            }
            .note{
                margin-top: 5px;
                padding-top: 10px;
                text-align: left;
            }
            @media print{
                @page{
                    width: 90mm;
                    margin: 0mm
                }
            }
            table thead{
                height: 20px;
            }
            
            .left{
                text-align: left;
            }
    </style>
    </head>
   
    <body onload="window.print()"> 
        <div class="content">
            <div class="title">
                <b>Toko Klontong</b><br>
                Alamat<br>
                Kabupaten<br>
                NO. HP
            </div>

            <div class="head">
                <table cellspacing="0" cellpadding="0">
                    
                    <tr>
                        <td style="width: 10px">Tanggal</td>
                        <td style="text-align: center; width: 10px">:</td>
                        <td style="width : 80%">
                            <?php
                            // $chq_date = str_replace('/', '-', $penjualan->date );
                            // $chq_date_penjualan = str_replace('/', '-', $penjualan->created_date );
                            echo Date("Y-m-d",strtotime($penjualan->tanggal))." ". Date("H:i",strtotime($penjualan->created_at));
                            ?>
                        </td>
                        <td style="width: 10px">Kasir</td>
                        <td style="text-align: center; width: 10px">:</td>
                        <td style="text-align: left;">
                        <?= ucfirst($penjualan->user_username);?>
                        </td>
                    </tr>
                    <tr>
                        <td >Invoice</td>
                        <td style="text-align: center; width: 10px">:</td>
                        <td  style="width: 10px">
                            <?= $penjualan->invoice?>
                        </td>
                        <td>Pelanggan</td>
                        <td style="text-align: center;">:</td>
                        <td style="text-align: left;">
                        <?= $penjualan->nm_kostumer?>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="transaction">
                <table class="transaction-table" cellspacing="0" cellpadding="0">
                    <thead class="left">
                        <th>No</th>
                        <th >Nama</th>
                        <th >Qty</th>
                        <th style="text-align: right;">Harga</th>
                        <th style="text-align: center;">Total</th>
                    </thead>
                    <tbody class="left" >
                        <tr>
                            <td colspan="5" style="padding-top : 5px; "></td>
                        </tr>
                        <?php
                        $i = 1;
                        $arr_discount = array();
                        foreach($transaksi_detail as $value){ ?>
                        <tr>
                            <td style="width: 2%;"><?= $i++?></td>
                            <td style="width: 50%;"><?= $value->bstock_nama_barang?></td>
                            <td style="width: 5%;"><?= $value->qty ?></td>
                            <td style="width:15%; text-align:right;"><?= rupiah($value->harga)?></td>
                            <td style="width:15%; text-align:right;">
                                <?= rupiah(($value->harga - $value->diskon) * $value->qty) ?></td>
                        </tr>

                        <?php
                        if($value->diskon > 0){
                            $arr_discount[] = $value->diskon;
                        }
                    }

                    foreach($arr_discount as $key => $value){ ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="text-align: right;">Disk. <?= ($key+1)?></td>
                            <td style="text-align:right"><?= rupiah($value)?></td>
                        </tr>
                    <?php
                    } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" style="border-bottom: 1px solid; padding-top : 10px; "></td>
                        </tr>
                        <tr>
                        <td colspan="3"></td>
                            <td style="text-align : right; padding-bottom: 5px; padding-top:10px;">Sub Total</td>
                            <td style="text-align : right; padding-bottom: 5px; padding-top:10px; "><?= rupiah($penjualan->total_harga)?></td>
                        </tr>
                        <?php if($penjualan->diskon > 0){?>
                        <tr>
                            <td colspan="3"></td>
                            <td style="text-align : right; padding-bottom: 5px;">Disk. penjualan</td>
                            <td style="text-align : right; padding-bottom: 5px;"><?= rupiah($penjualan->diskon)?></td>
                        </tr>
                        <?php
                        } ?>
                        <tr>
                            <td colspan="3"></td>
                            <td style="text-align : right; padding-bottom: 5px;">Grand Total</td>
                            <td style="text-align : right; padding-bottom: 5px;"><?= rupiah($penjualan->harga_final)?></td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td style="text-align : right; padding-bottom: 5px;">Pembayaran</td>
                            <td style="text-align : right; padding-bottom: 5px;"><?= rupiah($penjualan->tunai)?></td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td style="text-align : right; padding-bottom: 5px;">Kembalian</td>
                            <td style="text-align : right; padding-bottom: 5px;"><?= $penjualan->kembalian == 0 ? "-": rupiah($penjualan->kembalian)?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="thank">
                ---- Thank You ----
            </div>
            <div class="note">
                Catatan : Barang yang sudah di beli tidak dapat dikembalikan
            </div>
        </div>
    </body>
</html>