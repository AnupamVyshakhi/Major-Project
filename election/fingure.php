<?php
include("../header_inner.php");
include("../connection.php");
$user=$_REQUEST['id'];
?>


<html lang="en">
<head>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
</head>
<body onLoad="return Capture()">









<?php 

$conn = mysqli_connect("localhost","root","","voting_system");
session_start();
error_reporting(0);
$msg ="";


if(isset($_POST['submit']))
{
  $exampleInputEmail1 = mysqli_real_escape_string($conn , $_POST['exampleInputEmail1']);
  $exampleInputPassword1 = mysqli_real_escape_string($conn, $_POST['exampleInputPassword1']);
  $exampleInputPassword2 = mysqli_real_escape_string($conn, $_POST['exampleInputPassword2']);
    $txtIsoTemplate = mysqli_real_escape_string($conn, $_POST['txtIsoTemplate']);

 $query = "SELECT * FROM tbl_fingerprint WHERE user='$user'";
 $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
 $count = mysqli_num_rows($result);
  if($count < 1)
  {
	 // echo "sssssssssssssss $exampleInputPassword1  $exampleInputPassword2";
if ($exampleInputPassword1 == $exampleInputPassword2) 
{

$sql = "insert into tbl_fingerprint(user,fingerprint) values('$exampleInputEmail1','$txtIsoTemplate');";
mysqli_query($conn, $sql);

/*$sql1 = "insert into login(email_id, password, activation) values ('$exampleInputEmail1', '$exampleInputPassword1', '$activation');";
mysqli_query($conn, $sql1);
*/



echo "<script type='text/javascript'>alert('Succesfully Added..!!');  window.location='select.php';</script>";

}
else
{
  echo "<script type='text/javascript'>alert('password not matched..!!');  window.location='select.php';</script>"; 
  header("location:select.php");
}
}
else
{
	mysqli_query($conn, "UPDATE tbl_fingerprint SET fingerprint='$txtIsoTemplate' WHERE user='$exampleInputEmail1'");
echo "<script type='text/javascript'>alert('Successfully Updated'); window.location='select.php';</script>";
}
}
?>
<style>
.hide
{
display:none;	
}


</style>
<!DOCTYPE html>
<html>
<head>

<script src="jquery-1.8.2.js"></script>
<script src="mfs100-9.0.2.6.js"></script>


<script language="javascript" type="text/javascript">

        var flag =0;
        var quality = 60; //(1 to 100) (recommanded minimum 55)
        var timeout = 10; // seconds (minimum=10(recommanded), maximum=60, unlimited=0 )

//function to initialize the device

        function GetInfo() {
            document.getElementById('tdSerial').innerHTML = "";
            document.getElementById('tdCertification').innerHTML = "";
            document.getElementById('tdMake').innerHTML = "";
            document.getElementById('tdModel').innerHTML = "";
            document.getElementById('tdWidth').innerHTML = "";
            document.getElementById('tdHeight').innerHTML = "";
            document.getElementById('tdLocalMac').innerHTML = "";
            document.getElementById('tdLocalIP').innerHTML = "";
            document.getElementById('tdSystemID').innerHTML = "";
            document.getElementById('tdPublicIP').innerHTML = "";


            var key = document.getElementById('txtKey').value;

            var res;
            if (key.length == 0) {
                res = GetMFS100Info();
            }
            else {
                res = GetMFS100KeyInfo(key);
            }

            if (res.httpStaus) {

                document.getElementById('txtStatus').value = "ErrorCode: " + res.data.ErrorCode + " ErrorDescription: " + res.data.ErrorDescription;

                if (res.data.ErrorCode == "0") {
                    document.getElementById('tdSerial').innerHTML = res.data.DeviceInfo.SerialNo;
                    document.getElementById('tdCertification').innerHTML = res.data.DeviceInfo.Certificate;
                    document.getElementById('tdMake').innerHTML = res.data.DeviceInfo.Make;
                    document.getElementById('tdModel').innerHTML = res.data.DeviceInfo.Model;
                    document.getElementById('tdWidth').innerHTML = res.data.DeviceInfo.Width;
                    document.getElementById('tdHeight').innerHTML = res.data.DeviceInfo.Height;
                    document.getElementById('tdLocalMac').innerHTML = res.data.DeviceInfo.LocalMac;
                    document.getElementById('tdLocalIP').innerHTML = res.data.DeviceInfo.LocalIP;
                    document.getElementById('tdSystemID').innerHTML = res.data.DeviceInfo.SystemID;
                    document.getElementById('tdPublicIP').innerHTML = res.data.DeviceInfo.PublicIP;
                }
            }
            else {
                alert(res.err);
            }
            return false;
        }
//function to capture the finger prints. 

        function Capture() {
            try {
                document.getElementById('txtStatus').value = "";
                document.getElementById('imgFinger').src = "data:image/bmp;base64,";
                document.getElementById('txtImageInfo').value = "";
                document.getElementById('txtIsoTemplate').value = "";
                document.getElementById('txtAnsiTemplate').value = "";
                document.getElementById('txtIsoImage').value = "";
                document.getElementById('txtRawData').value = "";
                document.getElementById('txtWsqData').value = "";

                var res = CaptureFinger(quality, timeout);
                if (res.httpStaus) {
                      flag = 1;
                    document.getElementById('txtStatus').value = "ErrorCode: " + res.data.ErrorCode + " ErrorDescription: " + res.data.ErrorDescription;

                    if (res.data.ErrorCode == "0") {
                        document.getElementById('imgFinger').src = "data:image/bmp;base64," + res.data.BitmapData;
                        var imageinfo = "Quality: " + res.data.Quality + " Nfiq: " + res.data.Nfiq + " W(in): " + res.data.InWidth + " H(in): " + res.data.InHeight + " area(in): " + res.data.InArea + " Resolution: " + res.data.Resolution + " GrayScale: " + res.data.GrayScale + " Bpp: " + res.data.Bpp + " WSQCompressRatio: " + res.data.WSQCompressRatio + " WSQInfo: " + res.data.WSQInfo;
                        document.getElementById('txtImageInfo').value = imageinfo;
                        document.getElementById('txtIsoTemplate').value = res.data.IsoTemplate;
                        document.getElementById('txtAnsiTemplate').value = res.data.AnsiTemplate;
                        document.getElementById('txtIsoImage').value = res.data.IsoImage;
                        document.getElementById('txtRawData').value = res.data.RawData;
                        document.getElementById('txtWsqData').value = res.data.WsqImage;
                    }
                }
                else {
                    alert(res.err);
                }
            }
            catch (e) {
                alert(e);
            }
            return false;
        }

        function Verify() {
            try {
                var isotemplate = document.getElementById('txtIsoTemplate').value;
                var res = VerifyFinger(isotemplate, isotemplate);

                if (res.httpStaus) {
                    if (res.data.Status) {
                        alert("Finger matched");
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
                    alert(res.err);
                }
            }
            catch (e) {
                alert(e);
            }
            return false;

        }

        function Match() {
            try {
                var isotemplate = document.getElementById('txtIsoTemplate').value;
                var res = MatchFinger(quality, timeout, isotemplate);

                if (res.httpStaus) {
                    if (res.data.Status) {
                        alert("Finger matched");
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
                    alert(res.err);
                }
            }
            catch (e) {
                alert(e);
            }
            return false;

        }

        function GetPid() {
            try {
                var isoTemplateFMR = document.getElementById('txtIsoTemplate').value;
                var isoImageFIR = document.getElementById('txtIsoImage').value;

                var Biometrics = Array(); // You can add here multiple FMR value
                Biometrics["0"] = new Biometric("FMR", isoTemplateFMR, "UNKNOWN", "", "");

                var res = GetPidData(Biometrics);
                if (res.httpStaus) {
                    if (res.data.ErrorCode != "0") {
                        alert(res.data.ErrorDescription);
                    }
                    else {
                        document.getElementById('txtPid').value = res.data.PidData.Pid
                        document.getElementById('txtSessionKey').value = res.data.PidData.Sessionkey
                        document.getElementById('txtHmac').value = res.data.PidData.Hmac
                        document.getElementById('txtCi').value = res.data.PidData.Ci
                        document.getElementById('txtPidTs').value = res.data.PidData.PidTs
                    }
                }
                else {
                    alert(res.err);
                }

            }
            catch (e) {
                alert(e);
            }
            return false;
        }
        function GetProtoPid() {
            try {
                var isoTemplateFMR = document.getElementById('txtIsoTemplate').value;
                var isoImageFIR = document.getElementById('txtIsoImage').value;

                var Biometrics = Array(); // You can add here multiple FMR value
                Biometrics["0"] = new Biometric("FMR", isoTemplateFMR, "UNKNOWN", "", "");

                var res = GetProtoPidData(Biometrics);
                if (res.httpStaus) {
                    if (res.data.ErrorCode != "0") {
                        alert(res.data.ErrorDescription);
                    }
                    else {
                        document.getElementById('txtPid').value = res.data.PidData.Pid
                        document.getElementById('txtSessionKey').value = res.data.PidData.Sessionkey
                        document.getElementById('txtHmac').value = res.data.PidData.Hmac
                        document.getElementById('txtCi').value = res.data.PidData.Ci
                        document.getElementById('txtPidTs').value = res.data.PidData.PidTs
                    }
                }
                else {
                    alert(res.err);
                }

            }
            catch (e) {
                alert(e);
            }
            return false;
        }
        function GetRbd() {
            try {
                var isoTemplateFMR = document.getElementById('txtIsoTemplate').value;
                var isoImageFIR = document.getElementById('txtIsoImage').value;

                var Biometrics = Array();
                Biometrics["0"] = new Biometric("FMR", isoTemplateFMR, "LEFT_INDEX", 2, 1);
                Biometrics["1"] = new Biometric("FMR", isoTemplateFMR, "LEFT_MIDDLE", 2, 1);
                // Here you can pass upto 10 different-different biometric object.


                var res = GetRbdData(Biometrics);
                if (res.httpStaus) {
                    if (res.data.ErrorCode != "0") {
                        alert(res.data.ErrorDescription);
                    }
                    else {
                        document.getElementById('txtPid').value = res.data.RbdData.Rbd
                        document.getElementById('txtSessionKey').value = res.data.RbdData.Sessionkey
                        document.getElementById('txtHmac').value = res.data.RbdData.Hmac
                        document.getElementById('txtCi').value = res.data.RbdData.Ci
                        document.getElementById('txtPidTs').value = res.data.RbdData.RbdTs
                    }
                }
                else {
                    alert(res.err);
                }

            }
            catch (e) {
                alert(e);
            }
            return false;
        }

        function GetProtoRbd() {
            try {
                var isoTemplateFMR = document.getElementById('txtIsoTemplate').value;
                var isoImageFIR = document.getElementById('txtIsoImage').value;

                var Biometrics = Array();
                Biometrics["0"] = new Biometric("FMR", isoTemplateFMR, "LEFT_INDEX", 2, 1);
                Biometrics["1"] = new Biometric("FMR", isoTemplateFMR, "LEFT_MIDDLE", 2, 1);
                // Here you can pass upto 10 different-different biometric object.


                var res = GetProtoRbdData(Biometrics);
                if (res.httpStaus) {
                    if (res.data.ErrorCode != "0") {
                        alert(res.data.ErrorDescription);
                    }
                    else {
                        document.getElementById('txtPid').value = res.data.RbdData.Rbd
                        document.getElementById('txtSessionKey').value = res.data.RbdData.Sessionkey
                        document.getElementById('txtHmac').value = res.data.RbdData.Hmac
                        document.getElementById('txtCi').value = res.data.RbdData.Ci
                        document.getElementById('txtPidTs').value = res.data.RbdData.RbdTs
                    }
                }
                else {
                    alert(res.err);
                }

            }
            catch (e) {
                alert(e);
            }
            return false;
        }
       
        function validateform()
        {

      //  var password1=document.myform.exampleInputPassword1;
        var email=document.myform.exampleInputEmail1.value;
        
        if(email.length>20)
        {
            alert("username can be max 25 char");
            return false;
        }

       // if (password1.length>8) 
//        {
//          alert("password should be max 8 char");
//          return false;
//        }

        // password matching
     //   if (password1==password2) 
//        {
//          return true;
//        }
//        else
//         {
//            alert("password not matched");
//            return false;
//         } 

        }

    </script>
</head>

<body class="mainbody">

    <div class="header">

   
    </div>

    <div class="register_panel">
        <div class="panel panel-primary">
        <div class="panel-heading font"> </div>
        <div class="panel-body margin">
                <form method = "post" action="#" name="myform">
            
            <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="exampleInputEmail1">Staff ID</label>
                      <input type="text"  id="exampleInputEmail1" name="exampleInputEmail1" value="<?php echo $user; ?>" readonly class="form-control"  >
                      <input type="hidden"  id="user" name="user" value="<?php echo $user; ?>">
                      <input type="hidden"  id="type" name="type"  value="staff">
                 </div>
              </div>
            </div>



 

                    <table width="100%" style="padding-top:0px;">
                        <tr>
                           <!-- <td width="200px;">
                              
                              
                              
                                <table align="left" border="0" width="100%">
                                    <tr>
                                        <td>
                                            <input type="submit" id="btnCapture" value="Capture" class="capturebuttonpadding btn btn-primary btn-lg submit_buttom_padding" onclick="return Capture()" />
                                        </td>
                                    </tr>
                  
                                </table> 
                            </td>-->
                            <td width="150px" height="190px" align="center" class="img">
                                <img id="imgFinger" width="145px" height="188px" Falt="Finger Image" class="padd_top" />
                            </td>
                            <td>
                                <table align="left" border="0" style="width:100%;">
                    
                                </table>
                            </td>
                        </tr>
                    </table>
    <div class="panel">
        <table width="100%" >
            <tr class="hide">
                <td>
                    <input type="text" value="" id="txtStatus" class="form-control hide" />
                </td>
            </tr>
            <tr class="hide">
                <td>
                    Quality:
                </td>
                <td>
                    <input type="text" value="" id="txtImageInfo" class="form-control" />
                </td>
            </tr>
            
            <tr class="hide">
                <td>
                    Base64Encoded ISO Template
                </td>
                <td>
                    <textarea id="txtIsoTemplate" name="txtIsoTemplate" style="width: 100%; height:50px;" value="" class="form-control"> </textarea>
                </td>
            </tr>
         <tr class="hide">
                <td>
                    Base64Encoded ANSI Template
                </td>
                <td>
                    <textarea id="txtAnsiTemplate" style="width: 100%; height:50px;" class="form-control"> </textarea>
                </td>
            </tr>
            <tr class="hide">
                <td>
                    Base64Encoded ISO Image
                </td>
                <td>
                    <textarea id="txtIsoImage" style="width: 100%; height:50px;" class="form-control"> </textarea>
                </td>
            </tr>
            <tr class="hide">
                <td>
                    Base64Encoded Raw Data
                </td>
                <td>
                    <textarea id="txtRawData" style="width: 100%; height:50px;" class="form-control"> </textarea>
                </td>
            </tr>
            <tr class="hide">
                <td>
                    Base64Encoded Wsq Image Data
                </td>
                <td>
                    <textarea id="txtWsqData" style="width: 100%; height:50px;" class="form-control"> </textarea>
                </td>
            </tr>
           
        </table> 
                    <button type="submit" class="btn btn-primary btn-lg submit_buttom_padding" value="submit" onclick="return validateform()" style="margin-left:150px;" name="submit" id="sub">Add/Update</button>
               </form>
          </div>
       </div>
    </div>
</body>
</html>