<?php

    require('cookie-lib.php');

    isset($_POST['action'])? $action = $_POST['action'] : $action = "";

    if($action == "createCookie") {

        isset($_POST['cookieName'])? $cookieName = $_POST['cookieName'] : $cookieName = "";
        isset($_POST['cookieValue'])? $cookieValue = $_POST['cookieValue'] : $cookieValue = "";
        isset($_POST['expirationTime'])? $expirationTime = $_POST['expirationTime'] : $expirationTime = "";

        createCookie($cookieName, $cookieValue, $expirationTime);

    } else if($action == "deleteCookie") {

        isset($_POST['cookieName'])? $cookieName = $_POST['cookieName'] : $cookieName = "";

        createCookie($cookieName, "", -100);
    }  
?>

<html>
<body>
    <form name="formCookies" id="formCookies" method="post" action="<?PHP echo $_SERVER['PHP_SELF']; ?>">   
        <table> 
            <tr>
                <td>Cookie Name:<input type="text" name="cookieName" id="cookieName" maxlength="60"></td>
                <td>Cookie Value:<input type="text" name="cookieValue" id="cookieValue" maxlength="60"></td>
                <td>Expiration Time:<input type="text" name="expirationTime" id="expirationTime" maxlength="60"></td>
                <td><button type="button" onclick="createCookie();">Create Cookie</button></td>
                <td><button type="button" onclick="deleteCookie();">Delete Cookie</button></td>
            </tr>
        </table>
        <input type="hidden" id="action" name="action" value="nothing">
    </form>
<script>
    function createCookie(){
        document.getElementById("action").value = "createCookie";
        document.getElementById("formCookies").submit();
    };

    function deleteCookie(){
        document.getElementById("action").value = "deleteCookie";
        document.getElementById("formCookies").submit();
    };
</script>
</body>
</html>
