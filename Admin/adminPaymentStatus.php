<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// <!-- Header Start  -->
include "../dbConnection.php";
include "./admininclude/header.php";
// <!-- Header End  -->

// following files need to be included
require_once "../PaytmKit/lib/config_paytm.php";
require_once "../PaytmKit/lib/encdec_paytm.php";

$ORDER_ID = "";
$requestParamList = [];
$responseParamList = [];

if (isset($_POST["ORDER_ID"]) && $_POST["ORDER_ID"] != "") {
    // In Test Page, we are taking parameters from POST request. In actual implementation these can be collected from session or DB.
    $ORDER_ID = $_POST["ORDER_ID"];

    // Create an array having all required parameters for status query.
    $requestParamList = ["MID" => PAYTM_MERCHANT_MID, "ORDERID" => $ORDER_ID];

    $StatusCheckSum = getChecksumFromArray(
        $requestParamList,
        PAYTM_MERCHANT_KEY
    );

    $requestParamList["CHECKSUMHASH"] = $StatusCheckSum;

    // Call the PG's getTxnStatusNew() function for verifying the transaction status.
    $responseParamList = getTxnStatusNew($requestParamList);
}
?>


<div class="container ml-0 mt-3">
    <h2 class="text-center my-4">Check Payment Status </h2>
    <form method="post" action="">
        <div class="form-group form-inline row justify-content-center">
            <label class="col-form-label">Order ID: </ label>
                <div>
                    <input class="form-control mx-3" id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" placeholder="ORDS11755578" value="<?php echo $ORDER_ID; ?>">
                </div>
                <div>
                    <input class="btn btn-primary" value="View" type="submit">
                </div>
        </div>
    </form>
    <?php if (isset($responseParamList) && count($responseParamList) > 0) { ?>

        <div class="container">
            <di class="row justify-content-center">
                <div class="col-auto">
                    <h2 class="text-center">Payment Receipt</h2>
                    <table class="table table-bordered">
                        <tbody>
                            <?php foreach (
                                $responseParamList
                                as $paramName => $paramValue
                            ) { ?>
                                <tr>
                                    <td><label><?php echo $paramName; ?></label></td>
                                    <td><?php echo $paramValue; ?></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td>
                                    <button class="btn btn-primary" onclick="javascript:window.print();">Print</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </di>
        </div>

    <?php } ?>
</div>



<!-- Start Footer  -->
<?php include "./admininclude/footer.php"; ?>
<!-- End Footer  -->