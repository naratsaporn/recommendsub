<?php
    include 'model/connection.php';
?>
<?php
    include 'header.php';
?>
<?php
    include 'menu.php';
?>
<?php
    include 'topbar_header.php';
?>


<div class="clearfix"></div>

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
                <h4 class="page-title">ฐานข้อมูลกฏความสัมพันธ์</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javaScript:void();">ฐานข้อมูลกฏความสัมพันธ์</a></li>

                    <li class="breadcrumb-item active" aria-current="page">แสดงผล</li>
                </ol>
            </div>

        </div>
        <!-- End Breadcrumb-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><i class="fa fa-table"></i> Data Exporting</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>Item set a</th>
                                        <th>Item set b</th>
                                        <th>conf</th>
                                        <th>lift</th>
                                        <th>วันที่อัพเดท</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                         
                                    $item = "
                                    SELECT *
                                    FROM association_rules
                                    ";
                                    $numbrt = 1;
                                    // echo $item;
                                    $show_item = $mysqli -> query($item);
                                    while($rows_item = $show_item->fetch_assoc()){ ?>
                                    <tr>
                                        <th><?=$numbrt?></th>
                                        <th><?=$rows_item['association_rules_a']?></th>
                                        <th><?=$rows_item['association_rules_b']?></th>
                                        <th><?=$rows_item['conf']?></th>
                                        <th><?=$rows_item['lift']?></th>
                                        <th><?=$rows_item['data_date']?></th>
                                    </tr>
                                    <?php     $numbrt++;} ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Row-->
        <!--start overlay-->
        <div class="overlay toggle-menu"></div>
        <!--end overlay-->
    </div>
    <!-- End container-fluid-->

</div>
<!--End content-wrapper-->
<!--Start Back To Top Button-->
<a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
<!--End Back To Top Button-->

<!--Start footer-->
<?php
    include 'copyright.php';
?>

<!--End footer-->

<!--start color switcher-->
<?php
    // include 'switcher.php';
?>
<!--end color switcher-->

</div>
<!--End wrapper-->

<?php
    include 'footer.php';
?>
<script>
    $(document).ready(function () {
        //Default data table
        $('#default-datatable').DataTable();


        var table = $('#example').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
        });

        table.buttons().container()
            .appendTo('#example_wrapper .col-md-6:eq(0)');


    });
</script>