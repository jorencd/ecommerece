<?php include '../partials/admin-header.php'; ?>

    <main class="p-2 px-4">
        <section id="edit-details">
            <div class="content p-4">
                <h1 class="fw-bold mb-0">Edit Product Details</h1>

                <form action="" method="post">
                    <div class="row mt-4">
                        <div class="col-md-3">
                            <label for="product-name" class="form-label fw-bold">Product Name</label>
                            <input type="text" class="form-control" id="product-name" name="product-name" placeholder="Enter product name">
                        </div>
                        <div class="col-md-3">
                            <label for="brand-name" class="form-label fw-bold">Brand Name</label>
                            <input type="text" class="form-control" id="brand-name" name="brand-name" placeholder="Enter brand name">
                        </div>
                        <div class="col-md-3">
                            <label for="sku" class="form-label fw-bold">SKU</label>
                            <input type="text" class="form-control" id="sku" name="sku" placeholder="Enter SKU">
                        </div>
                        <div class="col-md-3">
                            <label for="upc" class="form-label fw-bold">UPC</label>
                            <input type="text" class="form-control" id="upc" name="upc" placeholder="Enter UPC">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-3">
                            <label for="category" class="form-label fw-bold">Category</label>
                            <input type="text" class="form-control" id="category" name="category" placeholder="Enter bag type">
                        </div>
                        <div class="col-md-3">
                            <label for="color" class="form-label fw-bold">Color</label>
                            <input type="text" class="form-control" id="color" name="color" placeholder="Enter color">
                        </div>
                        <div class="col-md-3">
                            <label for="condition" class="form-label fw-bold">Condition</label>
                            <input type="text" class="form-control" id="condition" name="condition" placeholder="Enter condition">
                        </div>
                        <div class="col-md-3">
                            <label for="material" class="form-label fw-bold">Material</label>
                            <input type="number" class="form-control" id="material" name="material" placeholder="Enter material">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12">
                            <label for="description" class="form-label fw-bold">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter product description"></textarea>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-3">
                            <label for="inventory-qty" class="form-label fw-bold">Inventory Qty</label>
                            <input type="number" class="form-control" id="inventory-qty" name="inventory-qty" placeholder="Enter inventory qty" oninput="updateStatus()">
                        </div>
                        <div class="col-md-3">
                            <label for="normal-threshold" class="form-label fw-bold">Normal Threshold Qty</label>
                            <input type="number" class="form-control" id="normal-threshold" name="normal-threshold" placeholder="Enter normal threshold qty" oninput="updateStatus()">
                        </div>
                        <div class="col-md-3">
                            <label for="low-threshold" class="form-label fw-bold">Low Threshold Qty</label>
                            <input type="number" class="form-control" id="low-threshold" name="low-threshold" placeholder="Enter low threshold qty" oninput="updateStatus()">
                        </div>
                        <div class="col-md-3">
                            <label for="status" class="form-label fw-bold">Status</label>
                            <input type="text" class="form-control" id="status" name="status" placeholder="Status" readonly>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="image-url" class="form-label fw-bold">Image URL</label>
                            <input type="url" class="form-control" id="image-url" name="image-url" placeholder="Enter Google Drive image URL">
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col text-start">
                            <input type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-modal" value="Delete">
                        </div>
                        <div class="col-md col-12 text-end">
                            <button type="button" class="btn btn-light me-2" data-bs-toggle="modal"
                                data-bs-target="#cancelConfirmModal">Cancel</button>
                            <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                                data-bs-target="#confirm-modal">Save</button>
                        </div>
                    </div>
                </form>
            </div>


            <!-- Delete Confirmation Modal -->
            <div class="custom-modal modal fade" id="delete-modal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="false">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content p-3">
                        <div class="modal-header justify-content-center pb-1" style="border-bottom: none;">
                            <h5 class="modal-title text-danger text-center fs-3 fw-light" id="deleteModalLabel">CONFIRM PRODUCT DELETION?</h5>
                        </div>
                        <div class="modal-body text-center">
                            Are you sure you want to delete this product?
                        </div>
                        <div class="modal-footer justify-content-center text-center pt-1" style="border-top: none;">
                            <form action=" " method="post">
                                <input type="hidden" name="product-id" value="">
                                <button type="button" class="btn btn-dark me-3" data-bs-dismiss="modal">Cancel</button>
                                <!-- NOTE: Change "type=button" to "type=submit" -->
                                <button type="button" class="btn btn-danger ms-3" id="confirmDelete" data-bs-toggle="modal" data-bs-target="#delete-success">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Delete Successful Modal -->
            <div class="custom-modal modal fade" id="delete-success" tabindex="-1" aria-labelledby="deleteSuccessfulModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content p-3">
                        <div class="modal-header justify-content-center pb-1" style="border-bottom: none;">
                            <h5 class="modal-title text-success text-center fs-3 fw-light" id="deleteSuccessfulModalLabel">PRODUCT DELETED</h5>
                        </div>
                        <div class="modal-body text-center">
                            The product has been deleted successfully!
                        </div>
                        <div class="modal-footer justify-content-center text center pt-1" style="border-top: none;">
                            <a href="./inventory-overview.php" class="btn btn-dark">Go to Inventory</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Confirmation Modal -->
            <div class="custom-modal modal fade" id="confirm-modal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="false">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content p-3">
                        <div class="modal-header justify-content-center pb-1" style="border-bottom: none;">
                            <h5 class="modal-title text-success text-center fs-3 fw-light" id="confirmModalLabel">CONFIRM PRODUCT DETAILS?</h5>
                        </div>
                        <div class="modal-body text-center">
                            Are these details correct?
                        </div>
                        <div class="modal-footer justify-content-center text-center pt-1" style="border-top: none;">
                            <form action=" " method="post">
                                <input type="hidden" name="product-id" value="">
                                <!-- NOTE: Change "type=button" to "type=submit" -->
                                <button type="button" class="btn btn-success me-3" id="confirmEdit" data-bs-toggle="modal" data-bs-target="#edit-success">Save</button>
                                <button type="button" class="btn btn-danger ms-3" data-bs-dismiss="modal">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Successful Modal -->
            <div class="custom-modal modal fade" id="edit-success" tabindex="-1" aria-labelledby="editSuccessfulModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content p-3">
                        <div class="modal-header justify-content-center pb-1" style="border-bottom: none;">
                            <h5 class="modal-title text-success text-center fs-3 fw-light" id="editSuccessfulModalLabel">CHANGES SAVED</h5>
                        </div>
                        <div class="modal-body text-center">
                            The product has been edited successfully!
                        </div>
                        <div class="modal-footer justify-content-center text center pt-1" style="border-top: none;">
                            <a href="./inventory-overview.php" class="btn btn-dark">Go to Inventory</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cancel Confirmation Modal -->
            <div class="modal fade" id="cancelConfirmModal" tabindex="-1" aria-labelledby="cancelConfirmModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header justify-content-center pb-1" style="border-bottom: none;">
                            <h5 class="modal-title text-danger text-center fs-3 fw-light" id="confirmModalLabel">CANCEL CHANGES?</h5>
                        </div>
                        <div class="modal-body text-center">
                            Are you sure you want to cancel? Any unsaved changes will be lost.
                        </div>
                        <div class="modal-footer justify-content-center text center pt-1" style="border-top: none;">
                            <button type="button" class="btn btn-dark me-3" data-bs-dismiss="modal">Stay</button>
                            <a href="./product-details.php" class="btn btn-danger ms-3">Leave</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php include '../partials/admin-footer.php'; ?>