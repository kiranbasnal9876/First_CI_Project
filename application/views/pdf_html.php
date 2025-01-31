

<?php include("header.php"); 
$data=json_decode($invoice_details);
$clients=$data->client_details;
$items=$data->item_details;



?>

    <style>
        .header {
            text-align: center;
            padding-bottom: 50px;
        }

        .items_table {
            width: 700px;
            margin-top: 20px;
            text-align: center;
            border: 2px solid black;
            border-collapse: collapse;
        }

        .th {
            background-color: gray;
            border: 1px solid black;
        }

        .amount_details {
            margin-left: 500px;
            margin-top: 30px;
        }

        p {
            text-align: center;
        }

        small {
           
            margin: 5px;
        }

        img {
           
            width: 200px;
        }
    </style>
</head>

<body>

    <table>
        <tbody>
            <tr>
                <td colspan="2" class="header">
                    <img src="<?php echo base_url();?>assets/images/sansoftwares_logo.png"><br>
                    <b>SAN Software Pvt Ltd</b><br>
                    <span>419, 4th Floor, M3M Urbana, Sector 67,</span><br>
                    <span>Gurugram, Haryana 122018</span>
                </td>
            </tr>

            <tr>
                <td style="width: 550px;">
                    <div>
                        <span><b>Customer:</b></span><br>
                        <span>Name:</span><small><?php echo $clients[0]->name; ?></small><br>
                        <span>Email:</span><small><?php echo $clients[0]->email; ?></small><br>
                        <span>Mobile Number:</span><small><?php echo $clients[0]->phone; ?></small><br>
                        <span>Address:</span><small><?php echo $clients[0]->address; ?></small>
                    </div>
                </td>
                <td>
                    <div>
                        <h2>INVOICE</h2>
                        <span>Invoice No:</span><span><?php echo $clients[0]->invoice_no; ?></span><br>
                        <span>Date:</span><small><?php echo $clients[0]->invoice_date?></small>
                    </div>
                </td>
            </tr>

        </tbody>
    </table>

    <table class="items_table">
        <tbody>
            <tr class="th">
                <td>Item</td>
                <td>Price</td>
                <td>Quantity</td>
                <td>SubTotal</td>
            </tr>
            <?php 
foreach($items as $item) {
    echo "<tr>
            <td>{$item->itemName}</td>
            <td>{$item->itemPrice}</td>
            <td>{$item->quantity}</td>
            <td>{$item->amount}</td>
          </tr>";
}
?>


        </tbody>
    </table>

    <div class="amount_details">
        <span><b class="Total-amount">Subtotal amount:</b><small><?php echo $clients[0]->total_amount; ?></small></span><br>
        <span><b class="Total-amount">Total amount:</b><small><?php echo $clients[0]->total_amount; ?></small></span>
    </div>

    <p>THANK YOU</p>

    <?php include("footer.php"); ?>
