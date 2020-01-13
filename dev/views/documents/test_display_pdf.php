<?php
include "../core/semi-header.php";

?>

<div class="row">
    <div class="col-xs-0 col-sm-0 col-md-0 col-lg-3" ></div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6" >
<!--        --><?php
        $filename = 'Toshiba_Satellite_Pro_C850-14C_Spec_sheet.pdf';
//        $file = 'Toshiba_Satellite_Pro_C850-14C_Spec_sheet.pdf';
        ?>
        <object data="<?php echo $filename; ?>" type="application/pdf" class="pdfviewsize">
            alt : <a href="<?php echo $filename; ?>">test.pdf</a>
        </object>
    </div>
    <div class="col-xs-0 col-sm-0 col-md-0 col-lg-3" ></div>
</div>