<form action="prsdaftar.php" method="post" enctype="multipart/form-data">
<h1 align="center">Halaman Daftar Akun</h1>
	<table align="center" border="1">
		<tr>
			<td>Username :</td>
			<td><input type="text" name="user" required="" autofocus="" size="25"></td>
		</tr>
		<tr>
			<td>Password :</td>
			<td><input type="Password" name="pass" required="" autofocus="" size="25"></td>
		</tr>
		<tr>
			<td>Email :</td>
			<td><input type="text" name="email" required="" autofocus="" size="25"></td>
		</tr>
		<tr>
      		<td>Foto :</td>
      		<td><input type="file" name="fileToUpload" id="fileToUpload"></td>
    	</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="daftar" value="Daftar"> 
			<input type="reset" name="batal" value="Batal"></td>
		</tr>
	</table>
	<table align="center">
	<tr>
		<td>Sudah Punya Akun? <a href="login.php">Login di Sini....</a></td>
	</tr>
	</table>
</form>