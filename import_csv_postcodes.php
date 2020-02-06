<?php
//
// Terrible Import Script: S. Monro 2020

// Import CSV of postcode data
// Original data source: https://github.com/matthewproctor/australianpostcodes

// Data format.
// otherid,pcode,locality,state,long,lat,deliveryoffice,type

// INSTRUCTIONS:
// MAKE SURE YOU ADD A FOLDER CALLED 'upload' TO PATH THIS FILE LIVES IN.
//
// You notice that there is also an extra 'dateofupdate' column. 
// This is so that you can use multiple data sets later in life and just select via the that field name.

// Configure this first.

$hostname='localhost';      // specify host
$user='root';               // specify username
$pass='root';               // specify password
$dbase='database';          // specify database name	
$tablename='auspostcodes';  // name of table

// Should be good from here down.

$dbc = mysqli_connect ($hostname, $user, $pass, $dbase) OR die ('Problem\n<br>' . mysqli_connect_error() . "\n<br>Server: " . $hostname); 
 

// This is a drop in replacement of mysqli_result for mysqli (Yes, it's old-school, it just makes like easier for the moment and gives error reports.)
// https://stackoverflow.com/questions/2089590/mysqli-equivalent-of-mysql-result/20961496#20961496

if(!function_exists(mysqli_result))
{
    function mysqli_result($res, $row = 0, $col = 0)
    { 
        if(mysqli_num_rows($res))
        {
            $numrows = mysqli_num_rows($res);
        }
        else
        {
            print "<br><br>Problem:<br><br>";
            $backtrace = debug_backtrace();
            if(isset($backtrace[1]['line']))
            {
                $line=$backtrace[1]['line'];
            }
            else
            { 
                echo "<pre>";
                var_dump ($backtrace);
                echo "</pre>";
                $line = "unknown";
            }
            echo "<br><br>This function was called from line $line of index.php<br />";
            var_dump ($backtrace); 
            var_dump($res);
            $numrows = 0;
            echo $row . "<br>";
            echo $col . "<br>";
            return false;
        }        

        if ($numrows && $row <= ($numrows - 1) && $row >= 0) {
            mysqli_data_seek($res, $row);
            $resrow = (is_numeric($col)) ? mysqli_fetch_row($res) : mysqli_fetch_assoc($res);
            if (isset($resrow[$col])) {
                return $resrow[$col];
            }
        }
        return false;
    } 
}


// Load the Files

if ( isset($_FILES["file"])) 
{ 
        //if there was an error uploading the file
    if ($_FILES["file"]["error"] > 0) 
    {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
    else 
    {
        //Print file details
        echo "Upload: " . $_FILES["file"]["name"] . "<br />";
        echo "Type: " . $_FILES["file"]["type"] . "<br />";
        echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
        echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
        $filedate = date("YmdHis"); 

        //if file already exists
        if (file_exists("upload/" .$filedate . "_" . $_FILES["file"]["name"])) 
        {
            echo $filedate . "_" . $_FILES["file"]["name"] . " already exists. ";
        }
        else 
        {
            //Store file in directory "upload"
            $storagename = $filedate. "_" .$_FILES["file"]["name"];
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $storagename);
            echo "Stored in: " . "upload/" . $filedate . "_" . $_FILES["file"]["name"] . "<br />";

            
        if (!file_exists("upload/"  .$filedate . "_" . $_FILES["file"]["name"]))
        {
            echo "File Did not copy";
            die();
        }

            $dateofupdate = date("Y-m-d H:i");  

            $handle = fopen("upload/".$storagename,"r"); 
            $a = 0;
            while(($fileop = fgetcsv($handle,",")) !== false) 
            {  
                $otherid =  addslashes($fileop[0]);
                $pcode = addslashes($fileop[1]);
                $locality = addslashes($fileop[2]);
                $state = addslashes($fileop[3]);
                $long = addslashes($fileop[4]);
                $lat = addslashes($fileop[5]);
                $deliveryoffice = addslashes($fileop[6]);
                $type = addslashes($fileop[7]); 

                if($a>0)
                {
                    $query = "INSERT INTO `" . $tablename . "` (otherid, pcode,locality,state,auspostcodes.long,lat,deliveryoffice,auspostcodes.type,dateofupdate) VALUES ('$otherid','$pcode','$locality','$state','$long','$lat','$deliveryoffice','$type','$dateofupdate');";
                    echo $query . "<br>\n";

                    $sq1 = mysqli_query($dbc,$query);
                    if($sq1)
                    {
                        //echo 'Data loaded<br><br>'; 
                    }
                    else 
                    {
                        echo "There was a problem.";
                        die();
                    }
                }       
                $a++;
            }

            fclose($handle);
            if($sq1)
            {
                echo 'Postcode data as been loaded.<br><br>'; 
            }
        }        
    }
} 
else
{
    echo "No file current selected <br />";
}
?>

<h1> Load Postcode Data</h1>

<p>The file format should be:</p>
<pre>otherid,pcode,locality,state,long,lat,deliveryoffice,type</pre>

<p>You can get a new set of data from here: <br>
<a href="https://github.com/matthewproctor/australianpostcodes">https://github.com/matthewproctor/australianpostcodes</a><br>
</p>
<p>File: australian_postcodes.csv</p>	
<p>There may be some data cleansing that needs to happen though before importing this data.</p>

<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
<table border="1">
<tr >
<td colspan="2" align="center"><strong>Import CSV file</strong></td>
</tr>
<tr>
<td align="center">CSV File:</td>
<td><input type="file" name="file" id="file"></td></tr>
<tr >
<td colspan="2" align="center"><input type="submit" value="submit"></td>
</tr>
</table>
</form>