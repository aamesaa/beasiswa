<?php
/**
 * Created by PhpStorm.
 * User: amesa
 * Date: 4/15/17
 * Time: 11:52 AM
 */


function getDetailCicilan ($kd_dftr){


    $sqlDetail = "SELECT * FROM pengembalian WHERE kd_daftar = '$kd_dftr'";

    $excSqlDetail = mysqli_query($GLOBALS["koneksi"], $sqlDetail);

    $hasil='';
    while($row = mysqli_fetch_array($excSqlDetail)){
        $hasil= $hasil.'
        <tr>
            <td>'.$row['tgl_bayar'].'</td>
            <td style="text-align:right;">'.$row['nominal_bayar'].'</td>
        </tr>
        ';
    }
    $table='
    <table>
        <tr>
            <th class="text-center">Tanggal</th>
            <th class="text-center">Jumlah</th>
        </tr>
        '.$hasil.'
    </table>    
    
    
    ';
    return $table;
}