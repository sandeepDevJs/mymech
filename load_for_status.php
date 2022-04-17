
<style>

.tab{
    margin:0;
    width:100%;
}
.tab td:first-child{
    float:left;
}

.tab td:last-child{
    float:right;
}

.color-red{
    color:red;
    cursor:pointer;
}

</style>

<?php

session_start();
include "DBconfig.php";

//if session is not set then say empty.
if (!isset($_SESSION['cart'])) {
    echo "<center>I'm empty!</center>";
}
//else if session is empty then say empty.
elseif (empty($_SESSION['cart'])) {
    echo "<center>I'm empty!</center>";
} else {
    $services_id = $_SESSION['cart'];
    ?>

        <table class="tab">

            <?php

    //initializing var that will store total price.
    $TotalPrice = 0;

    //iterating through each cart element.
    foreach ($services_id as $id) {
        echo "<tr>";
        $query = "SELECT * FROM car_service WHERE id = " . $id;
        $result = $conn->query($query);

        //printing cart details.
        foreach ($result as $data) {
            echo "<td>" . $data['service'] . "</td>";
            echo "<td>&#8377;" . $data['price'] . "</td>";
            
            //adding prices
            $TotalPrice += $data['price'];
        }
        echo "</tr>";
    }
    // print total price
    echo "<tr><td><b>Total</b></td><td><b>&#8377;" . $TotalPrice . "</b></td></tr>";
    $_SESSION['TotalPrice'] = $TotalPrice;
    ?>

        </table>

        <?php

} //closing else.

?>