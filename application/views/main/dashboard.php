<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/vendor/fontawesome-free/css/all.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/datatables.min.css">

    <link rel="stylesheet" href="assets/css/main1.css" type="text/css">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">LOGOMU</a>
            <h1 class="text-white text-center nav-text" style="width: 100%;">MANAGEMENT APPLICATION (RUD)</h1>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle" style="color: #ffffff; font-size: 28px"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Register</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
                    </li>
                </div>
            </div>
        </div>
    </nav>

    <main>
        <div class="container">
            <div class="content-table mt-5">
            <table class="table table-striped table-user" id="tableUser">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </main>

    <!-- Edit/Add Modal -->
    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">USER DETAILS</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="userForm">
                        <input type="hidden" id="userId">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="age" class="form-label">Age</label>
                            <input type="number" class="form-control" id="age" required>
                        </div>
                        <button type="submit" class="btn btn-primary" id="submitButton">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/datatables.min.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('#tableUser').DataTable({
                "ajax": {
                    "url": "<?php echo base_url('main/mainTable') ?>",
                    "type": "GET",
                    "dataSrc": ""
                },
                "columns": [
                    {
                        "data": null,
                        "render": function(data, row, type, meta) {
                            return meta.row + 1;
                        }
                    },
                    {"data": "fname"},
                    {"data": "femail"},
                    {"data": "fage"},
                    {
                        "data": "fid",
                        "render": function(data, type, row) {
                            return `
                                <button class="btn btn-primary btn-sm btn-edit" data-id="${data}">Edit</button>
                                <button class="btn btn-danger btn-sm btn-delete" data-id="${data}">Delete</button>
                            `;
                        }
                    }
                ]
            });

            // edit
            $('#tableUser').on('click', '.btn-edit', function() {
                var userId = $(this).data('id');
                $.ajax({
                    url: "<?php echo base_url('main/getUserTable') ?>",
                    type: "GET",
                    data: {fid: userId},
                    success: function(data) {
                        var user = JSON.parse(data);
                        console.log(user);
                        if (user) {
                            $('#userId').val(user.fid);
                            $('#name').val(user.fname);
                            $('#email').val(user.femail);
                            $('#age').val(user.fage);
                            $('#userModal').modal('show');
                        } else {
                            alert('User not found');
                        }
                    }
                });
            });

            $('#userForm').on('submit', function(e) {
                e.preventDefault();
                var userId = $('#userId').val();
                var userData = {
                    fid: userId,
                    fname: $('#name').val(),
                    femail: $('#email').val(),
                    fage: $('#age').val()
                };
                $.ajax({
                    url: "<?php echo base_url('main/editUserTable') ?>",
                    type: "POST",
                    data: userData,
                    success: function() {
                        $('#userModal').modal('hide');
                        table.ajax.reload();
                    }
                });
            });

            // delete
            $('#tableUser').on('click', '.btn-delete', function() {
                if (confirm('Are you sure you want to delete this record?')) {
                    var userId = $(this).data('id');
                    $.ajax({
                        url: "<?php echo base_url('main/deleteUserTable') ?>",
                        type: "POST",
                        data: {fid: userId},
                        success: function() {
                            table.ajax.reload();
                        }
                    });
                }
            });
        });

    </script>

</body>
</html>