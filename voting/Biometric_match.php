<?php
session_start();
//$_SESSION['username']="1111";
?>







<style>
body
{
background:url(ATM.jpg);	
}


</style>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<br><br><br><br>
<div class="container">










<script>
history.pushState(null, document.title, location.href);
window.addEventListener('popstate', function (event)
{
  history.pushState(null, document.title, location.href);
});
</script>
<?php 

$conn = mysqli_connect("localhost","root","","voting_system");





$username01 = $_SESSION['user'];
//echo "<script type='text/javascript'>alert('Welcome $username01')";

//mysqli_query($conn,$sql1);

$query01 = "SELECT * FROM tbl_fingerprint WHERE  user='$username01'";
$result01 = mysqli_query($conn, $query01); 

if ($result01->num_rows >= 0)
{
  while($row01 = $result01->fetch_assoc()) 
  {
    $fp = $row01["fingerprint"];
  }
}

//include("Biometric_match.php");
	
//echo $fp;
//echo "<br><br>";
//echo json_encode($fp);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>user-login</title>

<script src="jquery-1.8.2.js"></script>
<script src="mfs100-9.0.2.6.js"></script>

<script language="javascript" type="text/javascript">


        var quality = 60; //(1 to 100) (recommanded minimum 55)
        var timeout = 10; // seconds (minimum=10(recommanded), maximum=60, unlimited=0 )
        var flag = 0;

// Function used to match fingerprint using jason object 

   function Match() {
            try {
				
			
                var isotemplate = document.getElementById('txtIsoTemplate').value;
                var res = MatchFinger(quality, timeout, isotemplate);

                if (res.httpStaus) {
				//	alert("aaa");
                    if (res.data.Status) {
					
                       // alert("Finger matched");
						window.location.assign("step3.php"); 
							
                    }
                    else {
                        if (res.data.ErrorCode != "0") {
                            alert(res.data.ErrorDescription);
                        }
                        else {
                            alert("Finger not matched");
                        }
                    }
                }
                else {
                    //alert(res.err);
                }
            }
            catch (e) {
              //  alert(e);
            }
            return false;

        }


//function to redirect to next page upon fingerprint matching

function redirect(){

    
    if(flag){ 
    window.location.assign("url"); 
    }
    else{
      alert("Scan Your Finger");
    }

  return false;
}

</script>

</head>


<style>
.hide
{
display:none;	
}


</style>

                <form method = "post" name="myForm" action="#">
                    
                    <div class="hide">
                      <table>
                        <tr>
                          <td>
                              Base64Encoded ISO Image
                          </td>
                          <td>
                            <textarea id="txtIsoTemplate" style="width: 100%; height:50px;" class="form-control"><?php echo $fp; ?></textarea>
                          </td>
                        </tr>
                      </table>
                    </div>
                   
                  
                    
                    
                      <button type="input" onclick="return Match()" class="btn btn-default padd" >start scanning</button>
                  
                    

                    
                   
                    

                    </div>
                    </div>
               </form>
          </div>
       </div>
    </div>
</body>
</html>