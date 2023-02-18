<?php

    session_start();

    if($_SESSION['status']) {
        echo "<script>
        window.history.back();
        </script>";
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/x-icon" href="img/logoo1.ico">
    <title>Alegario Cure Login page</title>
	
	<style>
	
	*{
    margin:0;
    padding:0;
    box-sizing: border-box;
    font-family:'Courier New', Courier, monospace;
}
body{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background:white
}
body::before{
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, rgba(59,255,68,1) 36%, rgba(0,212,255,1) 92%);
    clip-path: circle(30% at right 70%);
}
body::after{
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, rgba(59,255,199,1) 29%, rgba(0,212,255,1) 97%);
    clip-path: circle(20% at 10% 10%);
}
.container{
    position: relative;
    display: flex;
    flex-direction:row;
    justify-content: center;
    align-items: center;
    max-width: 1200px;
    flex-wrap: wrap;
    z-index: 1;
}
.container .card{
    display: flex;
    justify-content: center;
    align-items: center;
    width: 400px;
    height: 500px;
    margin:auto;
    box-shadow: 20px 20px 50px rgba(0,0,0,0.5);
    border-radius: 35px;
    background:rgba(225,225,225,0.1);
    border-top:1px solid rgba(225,225,225,0.5);
    border-left: 1px solid rgba(225,225,225,0.5);
    backdrop-filter: blur(10px);
}
.container .card .content{
    color: black;
    text-align: center;
    padding: 5px;
}
.form{
    margin-top:20px;
}
input{
    margin: auto;
    padding: 5px;
    border-radius: 10px;
    width: 200px;
}
button{
    margin: 4px;
    padding: 6px;
    width: 50%;
    border: none;
    border-radius: 30px;
}
button:hover{
    background-color: aquamarine;
}
/*responsive state*/
@media only screen and (max-width: 600px) {
    .container .card{
        width: 300px;
        height: 500px;
        
    }
  }
  
  
    .shadow-bg {
    background-color: rgb(3 152 158);
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
    padding: 1px;
    display: inline-block;
	border-radius: 40px;
  }
  
	
	</style>
	
	
</head>
<body>
    <!--@kirzin-Codepen.io-->
    <div class="container">
        <div class="card">
            <div class="content">
                <div class="shadow-bg">
  <img src="img/logoo1.png" alt="" style="width: 60px;">
</div>
                <br><br><h2>Alegario Cure Login</h2>
                <h3>Login</h3>
                <div class="form">
				
    <form action="controllers/LoginController.php" method="post">
        <input type="text" name="email" placeholder="email"><br>
        <input type="text" name="password" placeholder="password"><br><br>
        <button type="submit" name="submit">login</button>
    </form><br>
                    <a href="#">forgot Password</a>
                </div>
                </div>
               
        </div>
       
      
    </div>
</body>
</html>
