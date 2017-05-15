<?php
/**
 * Created by PhpStorm.
 * User: amesa
 * Date: 4/15/17
 * Time: 12:18 PM
 */
include("koneksi.php");

    function getDetailCicilan ($kd_dftr){
        $sqlDetail = "SELECT * FROM pengembalian WHERE kd_daftar = '$kd_dftr'";
        $excSqlDetail = mysqli_query($GLOBALS['koneksi'], $sqlDetail );
        $hasil='';
        while($row = mysqli_fetch_array($excSqlDetail)){
            $hasil .='
        <tr>
            <td>'.$row['tgl_bayar'].'</td>
            <td>'.$row['nominal_bayar'].'</td>
        </tr>';
        }

        $table='
    <table class="table table-striped table-bordered">
        <tr>
            <th class="text-center">Tanggal</th>
            <th class="text-center">Jumlah</th>
        </tr>
        '.$hasil.'
    </table>    
    
    
    ';
        return $table;
}

