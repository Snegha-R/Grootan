<?php
$conn=mysqli_connect("localhost","root","","csv");

if(isset($_POST["import"]))
{
    $fileName=$_FILES["file"]["tmp_name"];

    if($_FILES["file"]["size"]>0)
    {
        $file=fopen($fileName,"r");

        while(($column=fgetcsv($file,100000,","))!==FALSE)
        {
            
            $sqlInsert="Insert into data (id,name,type,password) values('".$column[0]."','".$column[1]."','".$column[2]."','".$column[3]."')";
            $result=mysqli_query($conn,$sqlInsert);

            if(!empty($result))
            {
                echo "CSV Data imported into the database";
            }else
            {
                echo " ";

            }
        }
    }
}
?>

<html>
<center>
<marquee><h1><bold> GROOTAN TECHNOLOGIES</bold></h1></marquee>
<h1>Project done by Snegha R</h1>
<br><br>
<body style="background-image: url(bb2.jpg);">
<form class="form-horizontal" action="" method="post" name="uploadCsv" enctype="multipart/form-data">
    <div>
        <h1>
        <label>Choose CSV file</label>
        <br>
        <br>
        <input type="file" name="file" accept=".csv">
        <br>
        <br>
        <button type="submit" name="import">import</button></h1>
    </center>
    </div>
</form>
</body></html>