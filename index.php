<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./public/css/bootstrap.min.css">
    <link rel="stylesheet" href="./public/css/all.min.css">
    <script src="./public/js/jquery-3.4.1.min.js"></script>
    <script src="./public/js/bootstrap.min.js"></script>
    <script src="./public/js/myscript.js"></script>
    <title>CRUD - Ajax</title>
</head>

<body class="bg-dark">
    <div class="container-fluid">

        <h4 class="text-white">Thực hành CRUD - Ajax</h4>
        <div class="card">
            <div class="card-title mt-2 pl-2">
                <button class="btn btn-primary" data-toggle="modal" id="btn_Register" data-target="#Register">Add New User</button>
            </div>
            <div class="card-body">
                <div id="table">

                </div>
            </div>
        </div>

        <div class="modal fade" id="Register">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New User</h5>
                    </div>
                    <div class="modal-body">
                        <p class="text-danger" id="add_message"></p>
                        <form class="form" id="form_add">
                            <label for="txt_name">User name</label>
                            <input class="form-control" id="txt_name" type="text" placeholder="User name">
                            <label for="txt_email">User email</label>
                            <input class="form-control" id="txt_email" type="text" placeholder="User email">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" id="btn_add_user">Submit</button>
                        <button class="btn btn-danger" id="btn_add_close" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="Edit">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit User</h5>
                    </div>
                    <div class="modal-body">
                        <p class="text-danger" id="edit_message"></p>
                        <form class="form" id="form_edit">
                            <label for="txt_name">User name</label>
                            <input class="form-control" id="txt_edit_name" type="text">
                            <label for="txt_email">User email</label>
                            <input class="form-control" id="txt_edit_email" type="text">
                            <input type="hidden" id="txt_edit_id">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" id="btn_edit_user">Edit</button>
                        <button class="btn btn-danger" id="btn_edit_close" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>