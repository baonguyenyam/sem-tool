<?php 
/*// HEADER */
$title = "QR Code generator";
$active='qr'; 
/*// LAYOUT */
require_once 'includes/header.php';
?>

<body>


<?php require 'includes/nav.php'; ?>


    <div class="container-fluid">
        <div class="row">
        <?php require 'includes/sidebar.php'; ?>
            <form action="" method="post" id="frmchange" class="form-signin">
                <main class="col-md-9 ms-sm col-lg-10 col-xl px-md-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2">
                        <div class="pe-md-4">
                            <h1 class="h2">QR Code generator</h1>
                            <p>You may choose from URL, vCard, Plain Text, Email, Tel, WiFi, and Bitcoin.</p>
                        </div>
                        <div class="btn-toolbar align-items-center flex-nowrap text-nowrap mb-2 mb-md-0">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-primary" id="qrgenbtn">Generator</button>
                            </div>
                        </div>
                    </div>


                    <div class="shadow p-4 p-xxl-5 mb-5 bg-body rounded border">
                        <div class="row gx-5">
                            <div class="col-xxl">
                                <ul class="nav nav-tabs nav-sm" id="qrtab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a href="javascript:void(0)" class="nav-link active" id="iURL-tab" data-bs-toggle="tab" data-bs-target="#iURL">Text</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a href="javascript:void(0)" class="nav-link" id="iVcard-tab" data-bs-toggle="tab" data-bs-target="#iVcard">vCard</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a href="javascript:void(0)" class="nav-link" id="iBitcoin-tab" data-bs-toggle="tab" data-bs-target="#iBitcoin">Bitcoin</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a href="javascript:void(0)" class="nav-link" id="iTel-tab" data-bs-toggle="tab" data-bs-target="#iTel">Call</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a href="javascript:void(0)" class="nav-link" id="iWiFi-tab" data-bs-toggle="tab" data-bs-target="#iWiFi">WiFi</a>
                                    </li>
                                </ul>

                                <div class="tab-content pt-4" id="myTabContent">
                                    <div class="tab-pane fade show active" id="iURL">
                                        <div class="form-floating mb-3 mb-xxl-0">
                                            <textarea id="inputText" class="form-control" rows="5" style="min-height: 100px"></textarea>
                                            <label for="inputText">Enter your text</label>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="iVcard">
                                        <div class="form-floating mb-3">
                                            <input type="text" value="" id="inputFullname" class="form-control" placeholder="">
                                            <label for="inputFullname">Enter Fullname</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="email" value="" id="inputEmail" class="form-control" placeholder="">
                                            <label for="inputEmail">Enter Email</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" value="" id="inputAddress" class="form-control" placeholder="">
                                            <label for="inputAddress">Enter Address</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" value="" id="inputWebsite" class="form-control" placeholder="">
                                            <label for="inputWebsite">Enter Website</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="tel" value="" id="inputMobile" class="form-control" placeholder="">
                                            <label for="inputMobile">Enter Mobile</label>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="iBitcoin">
                                        <div class="mb-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="bitcoin" checked>
                                                <label class="form-check-label" for="inlineRadio1">Bitcoin</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="bitcoincash">
                                                <label class="form-check-label" for="inlineRadio2">Bitcoin Cash</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="ethereum">
                                                <label class="form-check-label" for="inlineRadio3">Ether</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="litecoin">
                                                <label class="form-check-label" for="inlineRadio4">Litecoin</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio5" value="dash">
                                                <label class="form-check-label" for="inlineRadio5">Dash</label>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" value="" id="inputAmount" class="form-control" placeholder="">
                                            <label for="inputAmount">Enter Amount</label>
                                        </div>
                                        <div class="form-floating mb-3 mb-xxl-0">
                                            <input type="text" value="" id="inputReceiver" class="form-control" placeholder="">
                                            <label for="inputReceiver">Enter Receiver</label>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="iTel">
                                        <div class="form-floating mb-3 mb-xxl-0">
                                            <input type="tel" value="" id="inputCall" class="form-control" placeholder="">
                                            <label for="inputCall">Enter number</label>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="iWiFi">
                                        <div class="form-floating mb-3">
                                            <input type="text" value="" id="inputNetwork" class="form-control" placeholder="">
                                            <label for="inputNetwork">Network Name (SSID)</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" value="" id="inputPassword" class="form-control" placeholder="">
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioNWOptionsNW" id="inlineRadioNW1" value="nopass">
                                                <label class="form-check-label" for="inlineRadioNW1">No Pass</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioNWOptionsNW" id="inlineRadioNW2" value="WPA" checked>
                                                <label class="form-check-label" for="inlineRadioNW2">WPA/WPA2</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioNWOptionsNW" id="inlineRadioNW3" value="WEP">
                                                <label class="form-check-label" for="inlineRadioNW3">WEP</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="col-xxl-6">
                                <h5 class="mb-3 mt-3 mt-xxl-0">Results</h5>
                                <div class="row">
                                    <div class="col-sm-12 mb-4">
                                        <h6>QR Code</h6>
                                        <img id="imgqr-1" src="/qrcode.php?s=qr&sf=40&sy=40&wq=0&pl=0&pr=0&pt=0&ts=15&th=15&pb=0&d=lift" class="img-thumbnail clicktosave" style="max-width:100px">
                                    </div>
                                    <div class="col-sm-12 mb-4">
                                        <h6>Code</h6>
                                        <img id="imgqr-2" src="/barcode.php?s=dmtx&sf=70&sy=70&wq=0&pl=0&pr=0&pt=0&ts=15&th=15&pb=0&d=lift" class="img-thumbnail clicktosave" style="max-width:100px">
                                    </div>
                                    <div class="col-sm-12 mb-4">
                                        <h6>Bar Code</h6>
                                        <img id="imgqr-3" src="/barcode.php?s=code-128&sf=12&sy=6&wq=0&pl=0&pr=0&pt=0&pb=0&ts=0&th=10&d=lift" class="img-thumbnail clicktosave" style="max-width:200px">
                                    </div>
                                    <div class="col-sm-12">
                                        <h6>EAN Code</h6>
                                        <img id="imgqr-4" src="/barcode.php?s=code-39&sf=4&sy=1&wq=0&pl=0&pr=0&pt=0&ts=5&th=16&pb=18&d=lift" class="img-thumbnail clicktosave" style="max-width:100%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </main>
            </form>
        </div>
    </div>

    <?php require 'includes/footer.php';?>

</body>

</html>