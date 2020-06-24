<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Area</title>
  </head>
  <body>
    <div class="main-box">
      <div id="box" class="box">
          <br></br>
          <h1>USERNAME &nbsp; :  &nbsp; <input type="text" id="username" required> <h1>

          PASSWORD &nbsp; : &nbsp;   <input type="password" id="password" required>
          <br></br>
          <input type="button" onclick="passwordcheck()" value="SUBMIT">

      </div>
      <div id="result" class="result">

      </div>
    </div>

  </body>
  <script type="text/javascript">
    function passwordcheck(){
      var username = document.getElementById("username").value;
      var password = document.getElementById("password").value;

      if(username === "purvjeja" || username === "pragyasingh"){

       if(username === "pragyasingh"){
          if(password === "purvlok@4321"){
            window.location.reload();
             window.open("data.php?value=purvlok@4321pragyasingh", "blank");
          }
         else{
           setInterval(pagetimeout, 1000);
           document.getElementById("result").innerHTML="<h1><em><b>INCORRECT PASSWORD Pragya </b></em>&#128543</h1> <input style=\" color:red;  animation-name: example; animation-duration: 2s;  border-color: red;  \"type=\"button\" onclick=\"window.location.reload()\" value=\"RETRY\">";
         }
       }

       if(username === "purvjeja"){
        if(password === "juceaserlias1234" ){
                    window.location.reload();
                    window.open("data.php?value=juceaserlias1234purvjeja", "blank");
               }
            else{

                    document.getElementById("result").innerHTML="<h1><em><b>INCORRECT PASSWORD Purv </b></em>&#128543</h1> <input style=\" color:red;  animation-name: example; animation-duration: 2s;  border-color: red;  \"type=\"button\" onclick=\"window.location.reload()\" value=\"RETRY\">";
                }
            }
      }
      else{
        document.getElementById("result").innerHTML="<h1><b><em>Incorrect USERNAME</b></em></h1> <input style=\" color:red;   animation-name: example; animation-duration: 2s; border-color: red;  \"type=\"button\" onclick=\"window.location.reload()\" value=\"RETRY\">";
      }
    }
      var x=0;
      pagetimeout();
      function pagetimeout(){
        x++;
        if(x==10) {
          window.history.back();
        }
      }

  </script>
  <style media="screen">
  @keyframes example {
    from  {background-color: white; color:black;}
    to {background-color: black; color:white;}
    }
    .result{
      padding-top: 5px;
      color: red;
      padding-left: 20px;
      font-size: 25px;
    }
    input{
      border-radius: 10px;
      background-color: black;
      color: white;
      font-size: 30px;
    }
    body{
      background-color: black;
    }
    .box{
      font-size: 20px;
      background-color: black;
      padding-top: 20px;
      margin: 20px;
      color: white;
    }
    .main-box{
      border-radius: 20px;
      position:relative;
      margin-top: 200px;
      left: 30%;
      width: 800px;
      height: 500px;
    }
  </style>
</html>
