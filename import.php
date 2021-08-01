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
            $sqlInsert="Insert into data (id,name,type) values('".$column[0]."','".$column[1]."','".$column[2]."')";
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
<form class="form-horizontal" action="" method="post" name="uploadCsv" enctype="multipart/form-data">
    <div>
        <label>Choose CSV file</label>
        <input type="file" name="file" accept=".csv">
        <button type="submit" name="import">import</button>
    </div>
</form>