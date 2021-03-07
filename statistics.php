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
                <h4 class="page-title">สถิติรายวิชา</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="statistics.php">สถิติรายวิชา</a></li>
                    <li class="breadcrumb-item" aria-current="page">แสดงผล</li>
                </ol>
            </div>
        </div>
        <!-- End Breadcrumb-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header text-uppercase">ผลการแนะนำรายวิชา</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>วิชา (ENG)</th>
                                        <th>วิชา (TH)</th>
                                        <th>ผลการวิเคราะห์ (TH)</th>
                                        <th>เปอร์เซ็นต์ <br>(โอกาศที่เกรด B หรือมากกว่า)</th>
                                        <th>อัพเดทล่าสุด</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                         
                                    $item = "
                                    SELECT *
                                    FROM static_sub
                                    ";
                                    $numbrt = 1;
                                    // echo $item;
                                    $show_item = $mysqli -> query($item);
                                    while($rows_item = $show_item->fetch_assoc()){ ?>
                                    <tr>
                                        <th><?=$numbrt?></th>
                                        <th><?=$rows_item['ssub_eng']?></th>
                                        <th><?=$rows_item['ssub_th']?></th>
                                        <th>
                                            <?php 
                                                if( $rows_item['spasspercentage'] >= 70){
                                             ?>
                                            <button type="button" class="btn-success m-1">
                                                <i class="fa fa-thumbs-o-up"></i> <span>แนะนำ</span>
                                            </button>
                                            <?php        
                                                }else{
                                            ?>
                                            <button type="button" class="btn-danger m-1">
                                                <i class="fa fa-thumbs-o-down "></i> <span>ไม่แนะนำ</span>
                                            </button>
                                            <?php        
                                                }
                                            ?>
                                        </th>
                                        <th><?=$rows_item['spasspercentage']?></th>
                                        <th><?=$rows_item['sdate_update']?></th>
                                    </tr>
                                    <?php     $numbrt++;} ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- End Row-->

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