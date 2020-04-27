<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div id="data">
	<h2>Data Manager</h2>

	<form method="POST" action="">
		<div class="control">
			<p>Nama:</p>
			<input type="text" name="nama"/>
		</div>
		<div class="control">
			<p>Nip:</p>
			<input type="text" name="nip"/>
		</div>
		<div class="control">
			<p>Alamat</p>
			<textarea name="alamat" cols="25" rows="5"></textarea>
		</div>
		<div class="control">
			<p>No.Telp</p>
			<input type="text" name="telp"/>
		</div>
		<div class="control">
			<p>Email</p>
			<input type="email" name="email"/>
		</div>
		<div class="control">
			<input type="submit" name="submit" value="Submit" />
		</div>
	</form>
</div>
<div id="datas">
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th>Nama</th>
			<th>Nip</th>
			<th>Alamat</th>
			<th>No.Telp</th>
			<th>Email</th>
			<th colspan="2">Action</th>
			
		</tr>
		<td>Ibnu</td>
		<td>122344</td>
		<td>Yakisoba, Depok</td>
		<td>0821343434</td>
		<td>ibnudks@gmail.com</td>
		<td><a href="">Update</a></td>
		<td><a href="">Delete</a></td>
	</table>
</div>
</body>
</html>