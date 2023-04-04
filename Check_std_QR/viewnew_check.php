<?php
require_once "config.php";

$_SESSION['state_id'] = $_GET['statment_id'];
$state_id = $_SESSION['state_id'];

function checked_table($condb,$state_id){
    $sql="SELECT check_in_statement.std_id,check_in_statement.display_name,
    student.std_name
    FROM `check_in_statement` 
    LEFT JOIN `student`
    ON check_in_statement.std_id = student.std_id
    WHERE state_codename='$state_id'";
    $sql_fecth_name=mysqli_query($condb,$sql);
    $displayname_array=[];
    while($sql_fecth_name_array=mysqli_fetch_array($sql_fecth_name)){
        //print_r($sql_fecth_name_array);
        array_push($displayname_array,array($sql_fecth_name_array['display_name'],$sql_fecth_name_array['std_name']));
    }
?>
<div class="page-content p-5 mx-auto align-middle">

    <div class="card ">
        <div class="table-responsive p-3">
            <table class="table table-bordered mb-5 ">
                <thead class="text-md-center ">
                    <h1 class="m-3 text-xl-center">ห้องเรียน 445</h1>
                    <th colspan="3">ปีกซ้าย</th>
                    <th colspan="4">กองกลางค้าบ</th>
                    <th colspan="3">ปีกขวานะ</th>
                </thead>
                <tbody style="text-align: center;">
                    <?php
                    $i = 1;
                    $l = 0;
                    while ($i <= 5) { ?>
                    <tr>
                        <?php
                            for ($j = 1; $j <= 10; $j++) {
                            ?>
                                <td>
                                    <?php
                                    if(isset($displayname_array[$l])){
                                        echo $displayname_array[$l][0]."<br>";
                                        echo "( ".$displayname_array[$l][1]." )";
                                        $l++;
                                    }
                                    else  {
                                        echo "-";}
                                    ?>  
                                </td>
                        <?php }
                            ?>
                    </tr>
                    <?php $i++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<?php 
}
function qr_generate($state_id) {
    ?>
<div class="text-center">
    <iframe height="300" width="300"
        src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=https://damp-tundra-19089.herokuapp.com/check_in_std.php?state_codename=<?php echo $state_id; ?>"></iframe>
    <br>
    <a href="https://damp-tundra-19089.herokuapp.com/check_in_std.php?state_codename=<?php echo $state_id; ?>" target="_blank" ><h3><?php echo $state_id; ?></h3></a>
                    </div>
<?php
}
?>