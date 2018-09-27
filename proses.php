
<form action=" " method="POST" enctype="multipart/form-data">
	<p>Nama : <input type="text" name="nama"></p>
	<p>Input Gambar : <input type="file" name="berkas"></p>
		Hobi : <br>
			<input type="checkbox" name="hobi[]" value="makan">Makan<br>
			<input type="checkbox" name="hobi[]" value="minum">Minum<br>
			<input type="checkbox" name="hobi[]" value="Tidur">Tidur<br>
			<br>
		Genre film : <br>
				<input type="checkbox" name="genre[]" value="Horror">Horror<br>
			<input type="checkbox" name="genre[]" value="Action">Action<br>
			<input type="checkbox" name="genre[]" value="Thriller">Thriller<br>
			<input type="checkbox" name="genre[]" value="Anime">Anime<br>
			<input type="checkbox" name="genre[]" value="Animasi">Animasi<br>
			<br>
			Tujuan Travelling :<br> 
		<input type="checkbox" name="travel[]" value="Bali">Bali<br>
			<input type="checkbox" name="travel[]" value="Raja Ampat">Raja Ampat<br>
			<input type="checkbox" name="travel[]" value="Pulau Derawan">Pulau Derawan<br>
			<input type="checkbox" name="travel[]" value="Bangka Belitung">Bangka Belitung<br>
			<input type="checkbox" name="travel[]" value="Labuan Bajo">Labuan Bajo<br>
	<input type="submit" name="submit" value="Input">
</form>
<?php
	if (isset($_POST['submit'])) {
		$nama=$_POST['nama'];
		$hobi=$_POST['hobi'];
		$genre=$_POST['genre'];
		$travel=$_POST['travel'];
		$namaFile = $_FILES['berkas']['name'];
		$namaSementara = $_FILES['berkas']['tmp_name'];

		$dirUpload = "sementara/";

		$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

		echo "Nama :<br>";
		echo "$nama<br>";
		echo "<br>";
		echo "Gambar<br>";

		if ($terupload) {
		    echo "<img src='".$dirUpload.$namaFile."' width=200 height=200><br>";
		} else {
		    echo "Upload Gagal!";
		}

		echo "Hobi<br>";
		if ($hobi=='') {
			echo " ";
		}else{
			for ($i=0; $i <count($hobi) ; $i++) { 
				echo "<li>".$hobi[$i]."<br>";
			}
		}
		echo "Genre<br>";
		for ($j=0; $j <count($genre) ; $j++) { 
			echo "<li>".$genre[$j]."<br>";
		}
		echo "Tujuan Travel<br>";
		for ($k=0; $k <count($travel) ; $k++) { 
			echo "<li>".$travel[$k]."<br>";
		}
		echo " </td></tr></table></td></tr>";
		echo "</table>";
	}
?>
<form>
	<button value="<?php unset($hobi);  ?>">Delete</button>
	<button value="<?php array_replace($nama); ?>">Edit</button><br>
</form>