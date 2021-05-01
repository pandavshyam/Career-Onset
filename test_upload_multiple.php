<?php
$mysql_db_hostname = "localhost";
$mysql_db_user = "root";
$mysql_db_password = "";
$mysql_db_database = "placement_cell";

$dbc = mysqli_connect($mysql_db_hostname, $mysql_db_user, $mysql_db_password,$mysql_db_database) or die("Could not connect database");
?>


<?
if (isset($_POST['add_account'])) { 
    if ($_POST['fields']) {
        foreach( $_POST['fields'] as $key=>$fieldArray ) {                          

           if (!empty($_FILES)) {

                $uploaddir = 'upload/';  // Upload directory 

                if (!is_dir($uploaddir)) // Check if upload directory exist
                {
                    mkdir($uploaddir);  // If no upload directory exist, create it
                }

                $newname = time(); // Returns the current time measured in the number of seconds since the Unix Epoch (January 1 1970 00:00:00 GMT),  to use it as part of the name
                $random = rand(100,999); // Getting some random numbers to add in the file names, to avoid files with the same name         

                $name =  $newname.'-'.$random.'-'.$_FILES['fields']['name'][$key]['file_uploaded'][0];  // File Name Construction 

                $tempFile = $_FILES['fields']['tmp_name'][$key]['file_uploaded'][0];  // Getting temporary file location and temporary name ( e.g. /tmp/random_string__here )

                $uploadfile = $uploaddir . $name; // Concatenating upload dir name with the file name               

                if (move_uploaded_file($tempFile, $uploadfile)) {  // If file moved from temp to upload location with the name we constructed above
                    echo 'File uploaded to '.$uploadfile.'.<br />';
                } else {
                    echo 'File not uploaded!<br />';
                }               

            }

            $keys = array_keys($fieldArray);
            $values = array_map("mysql_real_escape_string",$fieldArray);                
            $q = "INSERT INTO accounts (".implode(',',$keys).", file_uploaded) VALUES ('".implode('\',\'',$values)."', ".$uploadfile." )";
            $r = mysqli_query($q, $dbc );                                            

        }
    }
    echo "<i><h2><strong>" . count($_POST['fields']) . "</strong> Account(s) Added</h2></i>";       
}
?>

<?php if (!isset($_POST['add_account'])) { ?> 

<form method="post" action="" enctype="multipart/form-data">

<p id="add_field"><a class="btn btn-default" href="#">Add Rows</a></p>
<table id="myTable">
<thead>
    <tr>
        <th>#</th>
        <th>First Name:</th>
        <th>Last Name:</th>
        <th>E-mail:</th>
        <th>Upload file</th>            
        <th></th>           
    </tr>
</thead>
<tbody id="container">
</tbody>
</table>

<input class="btn btn-default" type="submit" name="add_account"  value="Submit"  />
</form>
<?php } ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript">

    $(function(){
        var counter = 0;
        $('p#add_field').click(function(){
            counter += 1;
            $('#container').append(
            '<tr><td>' + counter + '</td><td><input name="fields['+counter+'][first]" type="text"  placeholder="First Name" required/></td><td><input name="fields['+counter+'][last]" type="text"  placeholder="Last Name" required/></td><td><input name="fields['+counter+'][email]" type="email"  placeholder="email" required/></td><td><input id="userfile" name="fields['+counter+'][file_uploaded][]" type="file" /></td><td><input type="button" value="Remove" onclick="delRow(this)"></td></tr>');

        });
    });

    function delRow(currElement) {
         var parentRowIndex = currElement.parentNode.parentNode.rowIndex;
         document.getElementById("myTable").deleteRow(parentRowIndex);
    }

</script>