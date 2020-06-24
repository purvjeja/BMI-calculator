<?php
  $host = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "bmii";
  $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
  $result = mysqli_query($conn,"SELECT * from bmicheckers");
  $num=mysqli_num_rows($result);
?>
  <table align="center" width="1000" border="3" cellspacing="3" cellpadding="10">
    <tbody>
      <tr bgcolor="#2A2A2A">
      <th scope="col"><thd>Name</thd></th>
        <th scope="col"><thd>Age</thd></th>
        <th scope="col"><thd>Gender</thd></th>
        <th scope="col"><thd>Weight</thd></th>
        <th scope="col"><thd>Height</thd></th>
        <th scope="col"><thd>BMI</thd></th>
        <th scope="col"><thd>Category</thd></th>
        <th scope="col"><thd>Goal</thd></th>
      </tr>
    <?php
      while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
      {
    ?>
      <tr bgcolor="#EBEBEB">
         <td> <?php echo $row['name']?> </td>
         <td> <?php echo $row['age']?> </td>
         <td> <?php echo $row['gender']?> </td>
         <td> <?php echo $row['weight']?> </td>
         <td> <?php echo $row['height']?> </td>
         <td> <?php echo $row['BMI']?> </td>
         <td> <?php echo $row['category']?> </td>
         <td> <?php echo $row['goal']?> </td>
      </tr>
    <?php
      }
   ?>
     </tbody>
  </table>
<style>
    th{
      color:white;
      background-color: black;
    }
    td{
      color:white;
      background-color: black;
    }
    body{
      background-color: black;
    }
</style>
<script type="text/javascript">
            var x=0;
  pagetimeout();
  function pagetimeout(){
    x++;
    console.log(x);
    if(x==120) {
      window.close();
    }
  }
setInterval(pagetimeout, 1000);
</script>
