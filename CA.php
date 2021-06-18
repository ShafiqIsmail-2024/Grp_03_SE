<?php

if(isset($_POST['tunza']))
{
$reg=$_POST['regNo'];
$test1=$_POST['TestOne'];
$test2=$_POST['TestTwo'];

$host="localhost";
$user="root";
$passwd="";
$db="udom_sr";

$conn= mysqli_connect($host,$user,$passwd);

$dbc=mysqli_select_db($conn,$db );

/*if ($conn && $dbc)
{
    echo "The connection is Okay";
} else{
    echo "There are problem in connection ";
}*/

$Query1= "INSERT INTO tbl_student(registration_no) VALUES ('$reg')";

$Query2= "INSERT INTO tbl_ca_result(test_one,test_two) VALUES ('$test1','$test2')";

if ( mysqli_query($conn,$Query1) && mysqli_query($conn,$Query2))
{
     echo " Data Inserted Successfully ";
}
else
{
    echo "Data Not Inserted, There problem";
}


}




?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 

<html>

<head>
    <title></title>
<style>

table , td, th {
    border: 2px solid black;
    border-collapse: collapse;
}

</style>
<script>
    function AddRow()
    {
        var row1= "<td>";
            row1+="<td>  <input name='regNo' type='text'></td> ";
            row1+="<td>  <input name='TestOne' type='text'></td> ";
            row1+="<td>  <input name='TestTwo' type='text'></td> ";
            row1+=" <td>  <input name='Assignment' type='text'></td> ";
            row1+=" <td>  <input name='Total' type='text'></td>";
            row1+="</td>"

            document.getElementById("tbdy").insertRow().innerHTML=row1;
    }

   function   DeleteRow()
   {
    document.getElementById("tbdy").deleteRow(0);
   }



</script>
</head>

<body >
    <form method="POST" action="CA.php">
  <table>
<tr> <th> # </th> <th> Registration # </th> <th> Test One (%) </th> <th> Test Two (%)</th>  <th> Assignment(%) </th> <th> Total </th>

</tr>

 <!--tr> 
     <td>1</td> 
    <td>  <input type="text"></td> 
    <td>  <input type="text"></td> 
    <td>  <input type="text"></td> 
    <td>  <input type="text"></td> 
    <td>  <input type="text"></td>           
</tr-->
<tbody id="tbdy"></tbody>

  </table>  
  <BR></BR> <BR></BR>
<button type="button"  onclick="AddRow()">Add Row</button>

<button type="button"  onclick="DeleteRow()">Delete Row</button>

<button type="submit"  name="tunza">Submit</button>

<button type="submit"  name="see">See Data</button>

<br> <br>
<table> 
<tr>
    <td> Reg#</td>
    <td> Test One</td>
    <td> Test Two</td>
</tr>
<tr>
   <?php
      if(isset($_POST['see']))
      {
          $host="localhost";
          $user="root";
          $passwd="";
          $db="udom_sr";
          
          $conn= mysqli_connect($host,$user,$passwd);
          
          $dbc=mysqli_select_db($conn,$db );
      
          $sql="SELECT * FROM tbl_student s INNER JOIN tbl_ca_result r ON s.student_id=r.student_id";
          $querysee=mysqli_query($conn,$sql);
          $row=mysqli_num_rows($querysee);
          if($row)
          {
              while ($rows=mysqli_fetch_array ($querysee))
              {
                  echo "<td>".$rows['registration_no']."</td>";
                  echo "<td>".$rows['test_one']."</td>";
                  echo "<td>".$rows['test_two']."</td>";
                  echo "</tr>";
      
              }
          }
          
      
      
      }
   ?>
</tr>


</table>


</form>

</body>


</html>