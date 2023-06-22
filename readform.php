<html>
  <body>


  <?php 
  $PostID = $_POST["postID"]; 
  $UserID = $_POST["userID"];
  $Type = $_POST["type"];
  
  $Typeearr = implode(", ", $Type);
  
  $Desc = $_POST["desc"];
  
  
  $currentDateTime = date('Y-m-d H:i:s');

 $link = mysqli_connect("localhost", "root", "");
if (!$link) {
    die('Could not connect: ' . mysqli_connect_error());
}
mysqli_select_db($link, "fkedu") or die(mysqli_error($link));

$query = "insert into complaint values
            ('','$PostID','$UserID','$currentDateTime','$Typeearr','$Desc', 'InProgress')"
	or die(mysqli_connect_error());

    $result = mysqli_query($link, $query);

    if($result) 
	        {
		        
                    echo("Data insert");
					echo"<a href='StudentComplaintMainPage.php'>Kembali</a>";
		}
		else 
	        {
			        
	            die("Insert failed".mysqli_error($link));
	        }

			mysqli_close($link);
	?>
  </body>
  </html>