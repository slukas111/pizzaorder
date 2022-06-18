<html>

<style>
    body {
        background-color: grey;
    }
    #receipt {
        position: relative;
        margin: 2% auto;
        min-height: 60%;
        width: 20%;
        box-shadow: 0 2px 16px rgba(0, 0, 0, 0.6);
        background: rgb(221, 216, 216);
        padding: 0em 0em .5em .5em;
        box-sizing: border-box;
        border-radius: 8px;
    }
</style>
<body>

    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

//Use POST action to get data
    if(isset($_POST["size"])) { $size = $_POST["size"]; } else { $size = ""; }
    
    if(isset($_POST["peppr"])) { $peppr = $_POST["peppr"]; } else { $peppr = ""; }
    if(isset($_POST["mushr"])) { $mushr = $_POST["mushr"]; } else { $mushr = ""; }
    if(isset($_POST["rstom"])) { $rstom = $_POST["rstom"]; } else { $rstom = ""; }
    if(isset($_POST["pinea"])) { $pinea = $_POST["pinea"]; } else { $pinea = ""; }



    // Set variables for receipt calculations
    $total = 0; 
    $taxes = 0;
    $subtotal = 0;
    $seattletax = .1025;
    $grandtotal = 0;

    print "
    <div id='receipt'>
        <h1>Here is a copy of receipt </h1>
        
        <p id='items'><pre><u>Items</u>               <u>Price</u></pre>";

        
        // Print PIZZA SIZE and price if checked
        if($size == "Small") {
            print "<p>Size: Small $6.00</p>";
            $total = $total + 6.00;
        }

        if($size == "Medium") {
            print "<p>Size: Medium $10.50</p>";
            $total = $total + 10.00;
        } 

        if($size == "Large") {
            print "<p>Size: Large $12.50</p>";
            $total = $total + 15.00;
        }

        // Print TOPPINGS and prices
        if($peppr) {
            print "<p>Pepperoni $1.00</p>";
            $total = $total + 1.00;
        }

        if($mushr) {
            print "<p>Mushrooms $1.00</p>";
            $total = $total + 1.00;
        }

        if($rstom) {
            print "<p>Roasted Tomatoes $1.00</p>";
            $total = $total + 1.00;
        }

        if($pinea) {
            print "<p>Pineapple $1.00</p>";
            $total = $total + 1.00;
        }



        //format the currency
        $subtotal = number_format($total, 2);
        $taxes = $subtotal * $seattletax;
        $taxes= number_format($taxes,2);
        $grandtotal = $subtotal + $taxes;

        
        //Prints total price of order
        print "<br/>
                <p>Subtotal: $$subtotal</p>
                <p>Taxes: $ $taxes</p>
                <p>Grand Toal: $ $grandtotal</p>
        </p>
        <button onclick='history.go(-1);'>Back </button>
    </div>

</body>
"

?>
</html>