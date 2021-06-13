<?php 
    require('../scripts/petrol-station-assets.php');
     ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="style.css">
        <link rel="shortcut icon" href="../images/icon/logo 16x16.png" />   
        <title>Petrol Station - Token History</title>
        <style type="text/css">
            * {
            font-size: 12px;
            font-family: 'Times New Roman';
            }
            td,
            th,
            tr,
            table {
            border-top: 1px solid black;
            border-collapse: collapse;
            }
            td.description,
            th.description {
            width: 75px;
            max-width: 75px;
            text-align: center;
            }
            td.quantity,
            th.quantity {
            width: 40px;
            max-width: 40px;
            word-break: break-all;
            text-align: center;
            }
            td.price,
            th.price {
            width: 40px;
            max-width: 40px;
            word-break: break-all;
            text-align: center;
            }
            .centered {
            text-align: center;
            align-content: center;
            }
            .ticket {
            width: 155px;
            max-width: 155px;
            }
            img {
            max-width: inherit;
            width: inherit;
            }
            @media print {
            .hidden-print,
            .hidden-print * {
            display: none !important;
            }
            }
        </style>
    </head>
    <body>
        <div class="ticket">
            <img src="../images/icon/logo.png" alt="Logo">
            <?php foreach($result_tokendetailsforprint as $tdss) { ?>

            <p class="centered"><b>Petrol Station - Token History</b>
                <hr><center>
                <b style="font-size: 18px;">Token # <?php echo $tdss['Token']; ?></b><br>
                <hr>
                <b>Date :</b> <?php echo $tdss['Token_Date']; ?>
                <br><b>Token Generator :</b> <?php echo $tdss['Token_User']; ?>
                <br><b>Token Approval User :</b> <?php echo $tdss['Token_App_User']; ?>
                <br><b>PetrolStation : </b><?php echo $tdss['P_Name']; ?>
                <br><b>Address :</b> <?php echo $tdss['P_Address']; ?>
                <!-- <br><b>Fuel Rate :</b> <?php echo $tdss['P_Fuel_Selling_Price']; ?> -->
                <hr>
                <b>Driver : </b><?php echo $tdss['Driver_Name']; ?>
                <br><b>Plate No :</b> <?php echo $tdss['Driver_Plate_No']; ?>
                <br><b>Mobile :</b> <?php echo $tdss['Driver_Contact']; ?>
                <br><b>Email :</b> <?php echo $tdss['Driver_Email']; ?>
                <br><b>Address :</b> <?php echo $tdss['Driver_Address']; ?>
            </center>
            </p>
            <table>
                <thead>
                    <tr>
                        <th class="quantity">No</th>
                        <th class="description">Description</th>
                        <th class="price">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="quantity">1</td>
                        <td class="description">Cash</td>
                        <td class="price"><?php echo $tdss['Token_Approved_Cash']; ?></td>
                    </tr>
                    <tr>
                        <td class="quantity">2</td>
                        <td class="description">Litre</td>
                        <td class="price"><?php echo $tdss['Token_Approved_Litres']; ?></td>
                    </tr>
                </tbody>
            </table>
            <?php } ?>
            <p class="centered">Thanks for choosing us!
                <br>Etruck & Forex
            </p>
        </div>
        <button id="btnPrint" class="hidden-print">Print</button>
        <script src="script.js"></script>
    </body>
    <script type="text/javascript">
        window.print();
        const $btnPrint = document.querySelector("#btnPrint");
        $btnPrint.addEventListener("click", () => {
        window.print();
        });
    </script>
</html>