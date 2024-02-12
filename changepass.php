<?php
// VALIDATE NG REQUEST IF KNOWN.
if (!$_GET) {
    header('location: index.php');
}





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="src/lib/bootstrap/bs5/bs.css">
    <link rel="stylesheet" href="src/lib/fontawesome/css/all.css">

    <style>
        @media screen and (min-width: 365px) {
            #div_cp {
                padding: 2em;
            }
        }

        @media screen and (min-width: 768px) {
            #div_cp {
                width: 400px;
                margin: auto;
            }

        }
    </style>
</head>

<body>

    <div class="mt-5 " id="div_cp">

        <h4>Change Password</h4>

        <label for="">Password</label>
        <input type="text" class="form-control mb-2" id="txt_password">

        <label for="">Confirm Password</label>
        <input type="text" class="form-control" id="txt_c_password">

        <div class="text-end mt-2">
            <button class="btn btn-primary btn-sm" id="btn_cp_save" user_id="<?php echo $_GET['y']; ?>">Save</button>
        </div>
    </div>

    <!-- MODAL  -->
    <div class="modal" tabindex="-1" id="md_success">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Change Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Password updated successfully.
                </div>
            </div>
        </div>
    </div>

    <script src="src/lib/bootstrap/bs5/bs.js"></script>
    <script src="src/lib/jquery/jquery-3.7.0.js"></script>
    <script src="src/func/system.js"></script>

    <script>
        con_accounts = 'src/database/controllers/accounts_controller.php'

        // FOR VALIDATING REQUEST
        var getUrlParameter = function getUrlParameter(sParam) {
            var sPageURL = window.location.search.substring(1),
                sURLVariables = sPageURL.split('&'),
                sParameterName,
                i;

            for (i = 0; i < sURLVariables.length; i++) {
                sParameterName = sURLVariables[i].split('=');

                if (sParameterName[0] === sParam) {
                    return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
                }
            }
            return false;
        };

        $('#btn_cp_save').click(function() {

            payload = {
                "request_type": "change_password",
                "i": getUrlParameter('y'),
                "password": $('#txt_password').val()
            };

            _POST(con_accounts, payload, (cb) => {
                $('#md_success').modal('show')

                setTimeout(() => {
                    location.href = 'index.php'
                }, 1500);
            })
        })
    </script>
</body>

</html>