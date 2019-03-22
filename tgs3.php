<?php
// Check for the path elements
// Turn off error reporting
error_reporting(0);
// Report runtime errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);
// Report all errors
error_reporting(E_ALL);
// Same as error_reporting(E_ALL);
ini_set("error_reporting", E_ALL);
// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);
$con=mysqli_connect("localhost","id8944056_project","kedai","id8944056_kedai");
// Check connection
	if (mysqli_connect_errno())
	{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	else
	{
		
	$arr = array();

	$sql = "SELECT id_pel,nama_pel,alamat_pel,no_hp FROM pelanggan";
	$result = $con->query($sql);

	if ($result->num_rows > 0) 
		{
		// output data of each row
		while($row = $result->fetch_assoc()) {
        echo "Id: " . $row["id_pel"]. " - Nama: " . $row["nama_pel"]. " - Alamat: " . $row["alamat_pel"]. " - NO HP: " . $row["no_hp"]. "<br>";
			$temp = array(
						"id_pel" => $row["id_pel"],
						"nama_pel" =>$row["nama_pel"],
						"alamat_pel" => $row["alamat_pel"],
						"no_hp" => $row["no_hp"]);
   
					array_push($arr, $temp);
		
		}
		} else {
		echo "0 results";
		}
		$data = json_encode($arr);	
		
	
	echo "<br>{\"MENAMPILKAN DATA MAHASISWA dengan format JSON\":" . $data . "}<br><br><br>";
	}
	