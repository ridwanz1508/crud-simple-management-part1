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
<body class="bg">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">LOGOMU</a>
            <h1 class="text-white text-center nav-text" style="width: 100%;">MANAGEMENT APPLICATION (CRUD)</h1>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-product-circle" style="color: #ffffff; font-size: 28px"></i>
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
            <div class="content mt-5 mb-4">
                <button class="btn btn-success btn-sm btn-create" id="createForm">Add Product</button>
            </div>
            <div class="content-table">
            <table class="table table-striped table-product " id="tableProduct">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name Product</th>
                        <th>Image</th>
                        <th>Brand Type</th>
                        <th>Category</th> 
                        <th>Stock</th>
                        <th>Price</th>
                        <th>Note</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </main>

    <!-- Edit/Add Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">PRODUCT DETAILS</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="productForm" enctype="multipart/form-data">
                        <input type="hidden" id="productId" name="fid">

                        <!-- image preview -->
                        <div id="imagePreview" class="mt-2 mb-4 d-flex justify-content-center align-items-center">
                            <img id="productImage" src="" alt="Product Image" style="display:none; width: 20%; height: auto; max-width: 100%; object-fit: cover; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.2); transition: transform 0.3s;">
                            <div id="imagePlaceholder" style="display:none; width: 100px; height: 100px; background-color: #e0e0e0; border-radius: 10px; display: flex; justify-content: center; align-items: center; font-size: 16px; color: #7d7d7d;">
                                <i class="fas fa-image"></i> No Image
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="fmobile" class="form-label">Name Product</label>
                                <input type="text" class="form-control" id="fmobile" name="fmobile" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="fpict" class="form-label">Image</label>
                                <input type="file" class="form-control" id="fpict" name="fpict" accept="image/*">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="ftype" class="form-label">Brand Type</label>
                                <input type="text" class="form-control" id="ftype" name="ftype" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="fcategory" class="form-label">Category</label>
                                <select class="form-control" id="fcategory" name="fcategory" required>
                                    <option value="Handphone">Handphone</option>
                                    <option value="Laptop">Laptop</option>
                                    <option value="Watch">Watch</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="fstock" class="form-label">Stock</label>
                                <input type="number" class="form-control" id="fstock" name="fstock" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="fprice" class="form-label">Price</label>
                                <input type="number" class="form-control" id="fprice" name="fprice" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="fnote" class="form-label">Note</label>
                            <textarea class="form-control" id="fnote" name="fnote" rows="3"></textarea>
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
            var table = $('#tableProduct').DataTable({
                "ajax": {
                    "url": "<?php echo base_url('product/mainTable') ?>",
                    "type": "GET",
                    "dataSrc": function(json) {
                        return json;
                    }
                },
                "columns": [
                    {
                        "data": null,
                        "render": function(data, type, row, meta) {
                            return meta.row + 1;
                        }
                    },
                    {"data": "fmobile"},
                    {
                        "data": "fpict",
                        "render": function(data) {
                            return `<img src="${data}" alt="Product Image" style="width: 100px; height: auto;">`;
                        }
                    },
                    {"data": "ftype"},
                    {
                        "data": "fcategory",
                        "render": function(data) {
                            var badgeClass = '';
                            switch(data) {
                                case 'Handphone':
                                    badgeClass = 'badge bg-primary';
                                    break;
                                case 'Laptop':
                                    badgeClass = 'badge bg-success';
                                    break;
                                case 'Watch':
                                    badgeClass = 'badge bg-warning';
                                    break;
                                default:
                                    badgeClass = 'badge bg-secondary';
                            }
                            return `<span class="${badgeClass}">${data}</span>`;
                        }
                    },
                    {"data": "fstock"},
                    {"data": "fprice"},
                    {"data": "fnote"},
                    {
                        "data": "fid",
                        "render": function(data) {
                            return `
                                <button class="btn btn-primary btn-sm btn-edit" data-id="${data}">Edit</button>
                                <button class="btn btn-danger btn-sm btn-delete" data-id="${data}">Delete</button>
                            `;
                        }
                    }
                ]
            });

            // Open modal for creating product
            $('#createForm').on('click', function() {
                $('#productId').val('');
                $('#fmobile').val('');
                $('#fpict').val('');
                $('#ftype').val('');
                $('#fcategory').val('');
                $('#fstock').val('');
                $('#fprice').val('');
                $('#fnote').val('');
                $('#productModalLabel').text('Add New Product');
                $('#submitButton').text('Add Data');
                
                // Hide image preview and show placeholder
                $('#productImage').hide();
                $('#imagePlaceholder').show();

                $('#productModal').modal('show');
            });

            // Open modal for editing product
            $('#tableProduct').on('click', '.btn-edit', function() {
                var productId = $(this).data('id');
                $.ajax({
                    url: "<?php echo base_url('product/getProductTable') ?>",
                    type: "GET",
                    data: {fid: productId},
                    success: function(data) {
                        var product = JSON.parse(data);
                        if (product) {
                            $('#productId').val(product.fid);
                            $('#fmobile').val(product.fmobile);
                            $('#ftype').val(product.ftype);
                            $('#fcategory').val(product.fcategory);
                            $('#fstock').val(product.fstock);
                            $('#fprice').val(product.fprice);
                            $('#fnote').val(product.fnote);

                            // Show existing image if available
                            if (product.fpict) {
                                $('#productImage').attr('src', product.fpict).show();
                                $('#imagePlaceholder').hide();
                            } else {
                                $('#productImage').hide();
                                $('#imagePlaceholder').show();
                            }

                            $('#productModalLabel').text('Edit Product');
                            $('#submitButton').text('Save Changes');
                            $('#productModal').modal('show');
                        } else {
                            alert('Product not found!');
                        }
                    }
                });
            });

            // if image file be changed
            $('#fpict').on('change', function() {
                var file = this.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#productImage').attr('src', e.target.result).show();
                        $('#imagePlaceholder').hide();
                    }
                    reader.readAsDataURL(file);
                }
            });

            // Handle add or edit
            $('#productForm').on('submit', function(e) {
                e.preventDefault();

                var formData = new FormData(this);
                var productId = $('#productId').val();
                var url = productId ? "<?php echo base_url('product/editProductTable') ?>" : "<?php echo base_url('product/addProductTable') ?>";

                $.ajax({
                    url: url,
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        $('#productModal').modal('hide');
                        table.ajax.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            });

            // Handle deleting
            $('#tableProduct').on('click', '.btn-delete', function() {
                var productId = $(this).data('id');
                if (confirm('Are you sure you want to delete this record?')) {
                    $.ajax({
                        url: "<?php echo base_url('product/deleteProductTable') ?>",
                        type: "POST",
                        data: {fid: productId},
                        success: function(data) {
                            table.ajax.reload();
                        }
                    });
                }
            });
        });

    </script>

</body>
</html>