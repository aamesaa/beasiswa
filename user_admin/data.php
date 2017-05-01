<?php
Include("../function/koneksi.php");
?>
<html>
<body>
  <nav class="navbar-default" role="navigation" style="position: fixed; top: 0px;">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <a class="" href="index.php">
        <img src="../img/logo2.png" height="45px" style="margin-top:8px; margin-left:0" id="logo"/>
      </a>
      <div class="collapse navbar-collapse navbar-right navbar-ex1-collapse stuckMenu">
        <ul class="nav navbar-nav">
          <li class="menuItem"><a href="Cicilan.php">Pengembalian </a></li>
          <li class="menuItem"><a href="../index.php#infoBeasiswa">Info Beasiswa </a></li>
          <li class="menuItem"><a href="../index.php#hasilSeleksi">Hasil Seleksi </a></li>
          <li class="menuItem dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Admin<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="../user_admin/daftar_user.php">System User</a></li>
              <li><a href="function/logout.php">Logout</a></li>
            </ul>
          </li>

        </ul>
      </div>
    </div>
  </nav>
</body>
</html>
