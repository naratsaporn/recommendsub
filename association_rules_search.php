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
                    <div class="card-header text-uppercase">เลือกรายวิชาที่เคยเรียน</div>
                    <div class="card-body">
                        <form class="form-add-extented" method="post">
                            <table class="table" id="xTable">
                                <hader>
                                    <tr>
                                        <th>รายวิชา</th>
                                        <th>ผลการเรียน</th>
                                    </tr>
                                </hader>
                                <tbody>
                                    <tr class="ori-row">
                                        <td>
                                            <select class="form-control" name="sub[]">
                                                <!-- <option value=null>เลือกวิชา</option> -->
                                                <option value="JP414">JP414</option>
                                                <option value="ST330">ST330</option>
                                                <option value="WT497">WT497</option>
                                                <option value="ST011">ST011</option>
                                                <option value="ST180">ST180</option>
                                                <option value="WT498">WT498</option>
                                                <option value="ST031">ST031</option>
                                                <option value="JP413">JP413</option>
                                                <option value="ST331">ST331</option>
                                                <option value="JP314">JP314</option>
                                                <option value="CHP241">CHP241</option>
                                                <option value="KNG304">KNG304</option>
                                                <option value="ST013">ST013</option>
                                                <option value="ST021">ST021</option>
                                                <option value="WT102">WT102</option>
                                                <option value="ST304">ST304</option>
                                                <option value="PS101">PS101</option>
                                                <option value="ST241">ST241</option>
                                                <option value="ST302">ST302</option>
                                                <option value="ST022">ST022</option>
                                                <option value="ST142">ST142</option>
                                                <option value="KM100">KM100</option>
                                                <option value="ST012">ST012</option>
                                                <option value="SD301">SD301</option>
                                                <option value="ST141">ST141</option>
                                                <option value="KS(M)102">KS(M)102</option>
                                                <option value="KS(M)205">KS(M)205</option>
                                                <option value="SP241">SP241</option>
                                                <option value="KS(M)101">KS(M)101</option>
                                                <option value="KS(M)206">KS(M)206</option>
                                                <option value="CHW100">CHW100</option>
                                                <option value="SP242">SP242</option>
                                                <option value="SP243">SP243</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control" name="sum[]">
                                                <!-- <option>เลือกผลการเรียน</option> -->
                                                <option value="=high">มากกว่า B</option>
                                                <option value="=Low">น้อยกว่า B</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <button onclick="addSelect()" type="button" class="btn btn-outline-success m-1 add"> <i
                                    class="fa fa-plus"></i>
                                <span>เพิ่มรายวิชา</span> </button>
                            <button onclick="delSelect()" type="button" class="btn btn-outline-danger m-1"> <i
                                    class="fa fa fa-trash-o"></i>
                                <span>ลบรายการล่าสุด</span> </button>
                            <button type="submit" class="btn btn-gradient-secondary m-1">ค้าหาข้อมูล</button>
                        </form>

                    </div>
                </div>
            </div>
        </div><!-- End Row-->
        <?php
        if(!empty($_POST["sub"])){
            ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header text-uppercase">การค้นหา</div>
                    <div class="card-body">
                        <?php
                                echo "ค้นหา : ";
                                $input = array();
                                $search_item = array();
                                $ch_search = array();    
                                // $chk_text_out = in_array($text[0], $input_cut);
                                // if($chk_text_out != 1){  

                                // }
                                

                                // print_r($_POST["sum"] );
                                // print_r($result);
                                foreach ($_POST["sub"] as $key => $value) {
                                 
                                    $chk_text_out_1 = in_array($value, $ch_search);
                                    
                                     if($chk_text_out_1 != 1){  
                                        array_push($input, $value.$_POST["sum"][$key]);
                                        array_push($ch_search, $value);
                                    }
                                  }
                                
                                  $input_b = array_unique($input);
                                  foreach ( $input_b as $value){
                                    echo $value."  ";
                                  }
                                  echo "<br>";
                                //   print_r($text_pun);
                                //   echo "<br>";
                                //   count($input_b);
                                    for( $i=0 ; $i < count($input_b) ; $i++){
                                        $k = $i+1;
                                        // echo $input_b[$i]."<br>";
                                        array_push($search_item, $input_b[$i] );
                                        if( $k < count($input_b) ){
                                            // echo $input_b[$i]." ".$input_b[$k]."<br>";
                                            array_push( $search_item, $input_b[$i]." ".$input_b[$k] );
                                            array_push( $search_item, $input_b[$k]." ".$input_b[$i] );
                                        }
                                        if( $i+2 < count($input_b) ){
                                            // echo $input_b[$i]." ".$input_b[$i+2]."<br>";
                                            array_push( $search_item, $input_b[$i]." ".$input_b[$i+2] );
                                            array_push( $search_item, $input_b[$i+2]." ".$input_b[$i] );
                                        }
                                        if( $i+3 < count($input_b) ){
                                            // echo $input_b[$i]." ".$input_b[$i+3]."<br>";
                                            array_push( $search_item, $input_b[$i]." ".$input_b[$i+3] );
                                            array_push( $search_item, $input_b[$i+3]." ".$input_b[$i] );
                                        }
                                    }

                                    if(count($input_b) > 2){
                                        for( $i=0 ; $i < count($input_b) ; $i++ ){
                                            $k = $i+1;
                                            $j = $i+2;
                                            if( $j < count($input_b) ){
                                                // echo $input_b[$i]." ".$input_b[$k]." ".$input_b[$j]."<br>";
                                                if($j+1 < count($input_b)){
                                                    array_push( $search_item, $input_b[$i]." ".$input_b[$k]." ".$input_b[$j+1] );
                                                    // echo $input_b[$i]." ".$input_b[$k]." ".$input_b[$j+1]."<br>";
                                                }
                                                if($j+2 < count($input_b)){
                                                    array_push( $search_item, $input_b[$i]." ".$input_b[$k]." ".$input_b[$j+2] );
                                                    // echo $input_b[$i]." ".$input_b[$k]." ".$input_b[$j+2]."<br>";
                                                }
                                                if($k+1 < count($input_b) && $j+1 < count($input_b)){
                                                    array_push( $search_item, $input_b[$i]." ".$input_b[$k+1]." ".$input_b[$j+1] );
                                                    // echo $input_b[$i]." ".$input_b[$k+1]." ".$input_b[$j+1]."<br>";
                                                }
                                                
                                                if($k+1 < count($input_b) && $j+2 < count($input_b)){
                                                    array_push( $search_item, $input_b[$i]." ".$input_b[$k+1]." ".$input_b[$j+2] );
                                                    // echo $input_b[$i]." ".$input_b[$k+1]." ".$input_b[$j+2]."<br>";
                                                }
                                          
                                            }
                                            
                                        }
                                    
                                    }
                                    // 


                            }
                           
                        ?>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- End Row-->
    <?php if(!empty($search_item)){
        $result = 1;
        $result_sum = array();
        $result_conf = array();
        $result_lift = array();

        foreach($search_item as $val){
            // echo $val;
            // echo "<br>";
            $item2 = "
            SELECT *
            FROM association_rules
            WHERE association_rules_a = '$val'
            ";
       
            // echo $item;
            $show_item2 = $mysqli -> query($item2);
  
            while ($rows_item2 = $show_item2->fetch_assoc()) {
                if($rows_item2){
                    // echo $rows_item2["association_rules_b"]."<br>";
                    array_push($result_sum , $rows_item2["association_rules_b"]);
                    array_push($result_conf , $rows_item2["conf"]);
                    array_push($result_lift , $rows_item2["lift"]);
                }
            }
        }  
       
    ?>
    <?php 

   

        // print_r ($result_sum);    
        // echo "<br>";
        $sum_sum = array();
        $sum_conf = array();
        $sum_lift = array();

        for($a = 0 ; $a < count($result_sum) ; $a++ ){

            $kwd = explode(' ', $result_sum[$a] );
          
            // echo $kwd[0]." C ".$result_conf[$a]." L ".$result_lift[$a];
            if (!in_array($kwd[0], $sum_sum)) {

                array_push($sum_sum , $kwd[0]);
                array_push($sum_conf , $result_conf[$a]);
                array_push($sum_lift , $result_lift[$a]);  

            }else{
                
                $text = in_array($kwd[0], $sum_sum);
              
                if($text == 1){

                    $key = array_search($kwd[0], $sum_sum);
                    
                    if( $sum_conf[$key] < $result_conf[$a]){
                        $sum_conf[$key] = $result_conf[$a];
                    }
                    if($sum_lift[$key] <  $result_lift[$a] ){
                        $sum_lift[$key] = $result_lift[$a];
                    }
                }
                

            }

            if(isset( $kwd[2] ) ){
                // echo $kwd[1]." C ".$result_conf[$a]." L ".$result_lift[$a];  
                // echo "<br>";
                // echo $kwd[2]." C ".$result_conf[$a]." L ".$result_lift[$a];  
                // echo "<br>";   

                if (!in_array($kwd[1], $sum_sum)) {

                    array_push($sum_sum , $kwd[1]);
                    array_push($sum_conf , $result_conf[$a]);
                    array_push($sum_lift , $result_lift[$a]);  

                }else{

                    $text = in_array($kwd[1], $sum_sum);
                    $key = array_search($kwd[1], $sum_sum);
                   
                    if( $sum_conf[$key] < $result_conf[$a]){
                        $sum_conf[$key] = $result_conf[$a];
                    }
                    if($sum_lift[$key] <  $result_lift[$a] ){
                        $sum_lift[$key] = $result_lift[$a];
                    }
                   
                }

                if (!in_array($kwd[2], $sum_sum)) {

                    array_push($sum_sum , $kwd[2]);
                    array_push($sum_conf , $result_conf[$a]);
                    array_push($sum_lift , $result_lift[$a]); 
                      
                }else{
                    $text = in_array($kwd[2], $sum_sum);
                   

                    $key = array_search($kwd[2], $sum_sum);
                   
                    if( $sum_conf[$key] < $result_conf[$a]){
                        $sum_conf[$key] = $result_conf[$a];
                    }
                    if($sum_lift[$key] <  $result_lift[$a] ){
                        $sum_lift[$key] = $result_lift[$a];
                    }
                   
                }
            }

            if(isset( $kwd[3] ) ){
                if (!in_array($kwd[3], $sum_sum)) {
                    array_push($sum_sum , $kwd[3]);
                    array_push($sum_conf , $result_conf[$a]);
                    array_push($sum_lift , $result_lift[$a]);   
                }else{
                    $text = in_array($kwd[3], $sum_sum);
                    $key = array_search($kwd[3], $sum_sum);
                    if( $sum_conf[$key] < $result_conf[$a]){
                        $sum_conf[$key] = $result_conf[$a];
                    }
                    if($sum_lift[$key] <  $result_lift[$a] ){
                        $sum_lift[$key] = $result_lift[$a];
                    }
                  
                }
                // echo $kwd[3]." C ".$result_conf[$a]." L ".$result_lift[$a]; ; 
            }
        }
        // echo "<br>";
       
        $input_cut = array();
        for( $Q = 0 ; $Q < count( $input ); $Q++  ){
            
            $text_input = explode("=", $input[$Q]);
            array_push($input_cut , $text_input[0]);

        }
         
    ?>
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
                                    <th>วิชา</th>
                                    <th>ผลการวิเคราะห์</th>
                                    <th>รูปแบบการแนะนำ</th>
                                    <th>conf</th>
                                    <th>lift</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                               
                                for( $Y = 0 ; $Y < count( $sum_sum ); $Y++  ){
                                   $text = explode("=", $sum_sum[$Y]);
                                   $chk_text_out = in_array($text[0], $input_cut);
                                   if($chk_text_out != 1){  ?>
                                    <tr>
                                        <th><?=$Y+1?></th>
                                        <th><?=$text[0]?></th>
                                        <th>
                                            <?php 
                                                if( $text[1] == "Low" ){
                                            ?>    
                                                <button type="button" class="btn-danger m-1">
                                                    <i class="fa fa-thumbs-o-down "></i> <span>ไม่แนะนำ</span>
                                                </button>
                                            <?php 
                                                }else{
                                            ?>
                                                <button type="button" class="btn-success m-1">
                                                    <i class="fa fa-thumbs-o-up"></i> <span>แนะนำ</span>
                                                </button>
                                            <?php        
                                                }
                                            ?>
                                            
                                        </th>
                                        <th>กฏความสัมพันธ์</th>
                                        <th><?=$sum_conf[$Y]?></th>
                                        <th><?=$sum_lift[$Y]?></th>
                                    </tr>            
                            <?php      }
                              }
                            ?>
                            <?php 
                                  $item = "
                                    SELECT *
                                    FROM static_sub
                                    ";
                                    $numbrt = $Y+1;
                                    // echo $item;
                                    $show_item = $mysqli -> query($item);
                                    while($rows_item = $show_item->fetch_assoc()){ 
                                        $chk_text_out = in_array($rows_item['ssub_eng'], $input_cut);
                                     if($chk_text_out != 1){  ?>
                                    <tr>
                                        <th><?=$numbrt?></th>
                                        <th><?=$rows_item['ssub_eng']?></th>
                                        <th>
                                            <?php 
                                                if( $rows_item['spasspercentage'] >= 70){
                                             ?>
                                            <button type="button" class="btn-success m-1">
                                                <i class="fa fa-thumbs-o-up"></i> <span>แนะนำ</span>
                                                <?="ที่ร้อยละ ".$rows_item['spasspercentage']?>
                                            </button>
                                            <?php        
                                                }else{
                                            ?>
                                            <button type="button" class="btn-danger m-1">
                                                <i class="fa fa-thumbs-o-down "></i> <span>ไม่แนะนำ </span>
                                                <?="ที่ร้อยละ ".$rows_item['spasspercentage']?>
                                            </button>
                                            <?php        
                                                }
                                            ?>
                                        </th>
                                        <th>สถิติ</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    <?php     $numbrt++; ?>
                                    <?php    }
                                 } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End Row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-uppercase">ผลการค้นหากฏความสัมพันธ์</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-bordered">
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
                                <?php $number = 1 ;
                                 foreach($search_item as $val){
            
                                    $item = "
                                    SELECT *
                                    FROM association_rules
                                    WHERE association_rules_a = '$val'
                                    ";
                               
                                    // echo $item;
                                    $show_item = $mysqli -> query($item);
                                    while ($rows_item = $show_item->fetch_assoc()) { ?>
                                <tr>
                                    <th><?=$number++?></th>
                                    <th><?=$rows_item["association_rules_a"]?></th>
                                    <th><?=$rows_item["association_rules_b"]?></th>
                                    <th><?=$rows_item["conf"]?></th>
                                    <th><?=$rows_item["lift"]?></th>
                                    <th><?=$rows_item["data_date"]?></th>
                                </tr>
                          
                                <?php }
                                }
                                 ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row-->

        <?php } ?>


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
    function addSelect() {
        var T = document.getElementById('xTable');

        var R = document.querySelectorAll('tbody .ori-row')[0];

        var C = R.cloneNode(true);

        T.appendChild(C);

    }

    function delSelect() {
        obj = document.getElementById('xTable');
        rws = obj.getElementsByTagName('TR');
        obj.removeChild(rws[rws.length - 1]);
    }
</script>
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

        var table2 = $('#example2').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
        });
        table2.buttons().container()
            .appendTo('#example2_wrapper .col-md-6:eq(0)');
    });
</script>