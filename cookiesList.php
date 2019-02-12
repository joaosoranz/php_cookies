<?php

    require('cookie-lib.php');

    $cookieName = "cartItems";

    isset($_POST['action'])? $action = $_POST['action'] : $action = "";

    if($action == "createCookie") {

        isset($_POST['productId'])? $productId = $_POST['productId'] : $productId = "";
        isset($_POST['fldQTY-' . $productId])? $qty = $_POST['fldQTY-' . $productId] : $qty = "";

        $cookieValue = $productId . ":" . $qty;

        createCookieCustomized($cookieName, $cookieValue, 3600);

    } else if($action == "deleteCookie") {

        isset($_POST['cookieName'])? $cookieName = $_POST['cookieName'] : $cookieName = "";

        createCookie($cookieName, $cookieValue, -100);
    }
?>

<html>
<body>
    <form name="formCookiesList" id="formCookiesList" method="post" action="<?PHP echo $_SERVER['PHP_SELF']; ?>">   
        <table> 
            <tr>
                <td>Product Id</td>
                <td>Name</td>
                <td>Price</td>
                <td>Quantity</td>
                <td></td>
            </tr>
            <tr>
                <td>1</td>
                <td>Ipad Mini 8</td>
                <td>$1000.00</td>
                <td><input name="fldQTY-1" id="fldQTY-1" type="number" value="1"></td>
                <td><button type="button" onclick="createCookie(1);">Add Cart</button></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Iphone 8</td>
                <td>$800.00</td>
                <td><input name="fldQTY-2" id="fldQTY-2" type="number" value="1"></td>
                <td><button type="button" onclick="createCookie(2);">Add Cart</button></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Magic Mouse 2</td>
                <td>$200.00</td>
                <td><input name="fldQTY-3" id="fldQTY-3" type="number" value="1"></td>
                <td><button type="button" onclick="createCookie(3);">Add Cart</button></td>
            </tr>
            <tr>
                <td colspan="5" style="padding-top:30px;"><hr /></td>
            </tr>
            <tr>
                <td colspan="5">Cart Items</td>
            <tr>

            <?php
            if(!isset($_COOKIE[$cookieName]) || $_COOKIE[$cookieName] == "") { ?>
            <tr>
                <td colspan="5" style="text-align: center">
                    No items Found!!
                </td>
            </tr>
            <?php
            } else {
                $arr = explode('|', $_COOKIE[$cookieName]);
                $totalAmount = 0;
                foreach ($arr as $val) { 
                
                    $id = explode(':', $val)[0];
                    $qty =  explode(':', $val)[1];

                    ?>
                        <tr>
                            <td><?PHP echo $id; ?></td>
                            <td></td>
                            <td></td>
                            <td><?PHP echo $qty; ?></td>
                            <td><button type="button" onclick="createCookie(2);">Add Cart</button></td>
                        </tr>
                    <?php 
                }
            } ?>

        </table>
        <input type="hidden" id="productId" name="productId" value="">
        <input type="hidden" id="action" name="action" value="nothing">
    </form>
<script>
    function createCookie(productId){
        document.getElementById("productId").value = productId;
        document.getElementById("action").value = "createCookie";
        document.getElementById("formCookiesList").submit();
    };

    function deleteCookie(){
        document.getElementById("action").value = "deleteCookie";
        document.getElementById("formCookiesList").submit();
    };
</script>
</body>
</html>
