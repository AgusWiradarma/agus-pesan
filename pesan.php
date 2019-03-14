<?php
session_start();
if(!isset($_SESSION['username']))
{
	echo "<script>alert('Anda belum Login');location.href='login.php';</script>";
}
?>

<?php
include "koneksi.php";
$sql=mysqli_query($koneksi,"SELECT * FROM tbpesan");
$hasil=mysqli_fetch_assoc($sql)
?>

<form method="POST" action="prspesan.php">
	<table align="center" border="1">
		<tr>
			<td colspan="2" align="center"><h4>Kirim Pesan</h4></td>
		</tr>
		<tr>
			<td>Dari :</td>
			<td><select name="from">
<option value="" selected="selected">-User-</option>
<?php
  include "koneksi.php";
$lol=mysqli_query($koneksi,"SELECT * FROM tbuser ORDER BY registered DESC LIMIT 1");
while($rows=mysqli_fetch_array($lol))
{
    if ($rows['id'] == $hasil['sender']) {
echo "<option value='".$rows['id']."' selected='selected'>".$rows['username']."</option>";
}
else {
    echo "<option value='".$rows['id']."'>".$rows['username']."</option>";
}
}?></select></td>
		</tr>
		<tr>
			<td>Ke :</td>
			<td><select name="to">
<option value="" selected="selected">-User-</option>
<?php
  include "koneksi.php";
$lol=mysqli_query($koneksi,"SELECT * FROM tbuser");
while($row=mysqli_fetch_array($lol))
{
echo "<option value='".$row['id']."'>".$row['username']."</option>";
}?></select></td>
		</tr>
		<tr>
			<td colspan="2"><iframe src='new.php' width=100% height=300px border=1 solid></iframe>
            <table class=font-right width=100%>
        <form name=font action=prspesan.php method=POST>
        </form>
    </table></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><textarea style="width: 100%; height: 20px;" name="pesan"></textarea> <input type="submit" name="kirim" value="Kirim" style="width: 30%;"> <input type="reset" name="batal" value="Batal" style="width: 30%;"></td>
		</tr>
	</table>
	<table align="center" border="0">
		<tr>
			<td align="center"><a href="pesan.php">Home</a> <a href="sesion.php?id=<?php echo $row["id"]; ?>">Logout</a></td>
		</tr>
	</table>
</form>

<?php include "koneksi.php"; ?>
<!DOCTYPE HTML>
<html>
    <head>
        <title></title>
        <style>
         body{
             font-family:arial;font-size:12px;
         }
         #onlinebox{
             background:#ffffff;
             position:fixed;
             z-index:2;
             top:0px;
             right:0px;
             bottom:0px;
             width:200px;
             border-left:1px solid grey;
         }
        .userlist{
            font-family:arial;
            font-size:12px;
            display:block;
            padding:5px;
            cursor:pointer;
        }
        .userlist:hover{
            background:#fcfcfc;
        }
        .userlist .status-On{
            color:green;
            font-size:10px;
            float:right;
        }
        .userlist .status-Off{
            color:Red;
            font-size:10px;
            float:right;
        }
        </style>
        <script src="jquery-1.8.3.js"></script>
    </head>
    <body>    
    	        <div id="onlinebox">
        <table cellpadding="5" align="center">
            <tr><td>User</td></tr>
        </table>
        <script> get_user_online(); </script>
    </body>
</html>

<?php
include "koneksi.php";
$waktu = date("y-m-d h:i:s");
date_default_timezone_set('Asia/Jakarta');
$register = mysqli_query($koneksi, "SELECT * FROM tbuser ORDER BY registered DESC");
while($user=mysqli_fetch_array($register)){
    if($user["registered"]>=$waktu){
        $status="On";
    }else{
        $status="Off";
    }
?>
<div class="userlist">
	<table border="0">
    <tr><td><img src="gambar/<?php echo $user['foto'] ?>" width="50px" height="50px"></td> <td><?php echo $user["username"]; ?> <b class="status-<?php echo $status ?>">[<?php echo $status ?>]</b></td></tr></table>
</div>
<?php } ?>
</div>