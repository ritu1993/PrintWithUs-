<?php
require_once 'db_pdo.php';

/* And just in case something goes wrong */
if (isset($_GET['itemId'])) {
    $itemId = $_GET['itemId'];
} else {
    $itemId = 0;
}
$DB = new db_pdo();
//$sql = "select * from product_item where find_in_set('$itemId',sub_product_id) <> 0";
$sql = "SELECT * FROM product_item WHERE product_item_id ='$itemId'";
$productData = $DB->querySelectParam($sql, [$itemId]);
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Products</title>
        <script src="https://kit.fontawesome.com/21208763c4.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Encode+Sans+Semi+Expanded:wght@200&display=swap"
              rel="stylesheet">
        <link rel="stylesheet" href="css/HeaderFooterStyle.css">
        <link rel="stylesheet" href="css/homeStyle.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
            $(function () {
                var $darkbox = $("<div/>", {
                    id: "darkbox"
                }).on("click", function () {
                    $(this).removeClass("on");
                }).appendTo("body");
                $('img[data-darkbox]').css({
                    cursor: "pointer"
                }).on("click", function () {
                    var o = this.getBoundingClientRect();
                    $darkbox.css({
                        transition: "0s",
                        backgroundImage: "url(" + this.src + ")",
                        left: o.left,
                        top: o.top,
                        height: this.height,
                        width: this.width
                    });
                    setTimeout(function () {
                        $darkbox.css({
                            transition: ".8s"
                        }).addClass("on");
                    }, 5);
                });

            })
        </script>

    </head>

    <body>
        <?php include './header.php'; ?>


        <div id="dataTable">
            <span>
                <div>
                    <h1 class="headingProductCart" >...Thanks for shopping with PrintWithUs...</h1>
                    <h1 class="headingProductCart" >...Hope To Serve You Again...</h1><br/>
                    <h1 class="headingProductCart" >Order Invoice</h1>
                    <h1 class="headingProductCart" >*************************************</h1>
                </div>
                <table >
                    <tr>

                    <div>
                        <h1 class="productCart">Selected Product ID :  <?php echo $productData[0]['product_item_id'] ?> <br/> Name : <?php echo $productData[0]['item_name'] ?></h1>
                    </div>
                    </tr>
                    <tr>
                    <h1 class="productCart">Entity Price : CA$ <?php echo $productData[0]['Price'] ?> <br/></h1>
                    <h1 class="productCart">Total Tax : 20% <br/></h1>
                    <h1 class="productCart">Total Price : CA$ 105 <br/></h1>
                    <h1 class="headingProductCart" >*************************************</h1>
                    </tr>
                </table>

            </span>

        </div>
        </br></br></br></br></br>
        <?php include './footer.php'; ?>
        <br /><br /><br /><br /><br /><br /><br />
    </body>

</html>