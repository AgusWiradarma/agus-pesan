<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style type="text/css">
body {
  margin: 0 auto;
  max-width: 800px;
  padding: 0 20px;
}

.container {
  border: 2px solid #dedede;
  background-color: white;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.darker {
  border: 2px solid #dedede;
  background-color: grey;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.darker img {
  float: right;
  max-width: 60px;
  width: 100%;
  margin-left: 20px;
  border-radius: 50%;
}

.darker img.left {
  float: left;
  margin-right: 20px;
  margin-left:0;
}

.date {
  font-size: 10px;
}

</style>
</head>

<?php
include "koneksi.php";
$waktu = date("y-m-d h:i:s");
date_default_timezone_set('Asia/Jakarta');

$ppq=mysqli_query($koneksi, "SELECT * FROM tbpesan ORDER BY id DESC LIMIT 10");
while($d=mysqli_fetch_assoc($ppq)){
  $pesan = $d['content'];

$send = mysqli_query($koneksi,"SELECT * FROM tbuser WHERE id = $d[sender] LIMIT 1");
$a = mysqli_fetch_assoc($send)
?>

<?php
$take = mysqli_query($koneksi,"SELECT * FROM tbuser WHERE id = $d[receiver] LIMIT 1");
$b = mysqli_fetch_assoc($take)

?>

<?php
    if($a["registered"]>=$waktu){
        echo "<div class=container><img src=gambar/$a[foto] class=right><p align=right><span class=date>$d[created]</span><br/><span class=shout><b>$a[username] : </b></span><br/>";
		echo "<span class=shout>$pesan</span></p></div>";
		echo "<hr color=#e0cb91 noshade=noshade />";
    }else{
        echo "<div class=darker><img src=gambar/$a[foto] class=left><p><span class=date>$d[created]</span><br/><span class=shout><b>$a[username] : </b></span><br/>";
		echo "<span class=shout>$pesan</span></p></div>";
		echo "<hr color=#e0cb91 noshade=noshade />";
    }
  }
?>
</html>