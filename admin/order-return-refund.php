<?php include '../partials/admin-header.php'; ?>

<main class="p-2 px-4">
    <section id="order-return-refund">
        <div class="content p-4">
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <h1 class="fw-bold mb-0">Return/Refund</h1>
                </div>
            </div>
            
            <div class="row align-items-center mt-3">
                <div class="search-bar col-auto">
                    <form action="" method="get" class="d-flex">
                        <input type="text" name="search" class="form-control me-2" placeholder="Type your search here" value="" style="width: 280px;">
                        <button type="submit" class="btn btn-dark"> <i class="fa-solid fa-magnifying-glass"> </i></button>
                    </form>
                </div>
            </div>
        </div>

        <div class="content table-responsive p-4 pt-2">
            <table class="table table-hover fs-6">
                <thead>
                    <tr>
                        <th scope="col">Transaction No.</th>
                        <th scope="col">Order No.</th>
                        <th scope="col">Type</th>
                        <th scope="col">Total</th>
                        <th scope="col">Date </th>
                        <th scope="col">Reason</th>
                        <th scope="col">Tracking No.</th>
                    </tr>
                <tbody class="fw-light">
                    <tr>
                        <td> TX0010</td>
                        <td> ORD010</td>
                        <td> 1</td>
                        <td> 350,150</td>
                        <td> 2024-11-03</td>
                        <td>NULL </td>
                        <td> TRK778899001PH</td>
                    </tr>
                </tbody>
                <tfoot class="fw-light">
                    <tr>
                        <td colspan="7">
                            <div class="d-flex justify-content-between small">
                                <span>Showing 1 to 1 of 1 results</span>
                                <span> Next <i class="fa-solid fa-chevron-right fa-2xs" style="color: #000000;"></i></span>
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>


            <?php include '../partials/admin-footer.php'; ?>