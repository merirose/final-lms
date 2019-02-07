<?php 
session_start(); 
if(!isset($_SESSION["username"])){
	header("location: login.php");
}

include "../connection.php";
// $msg="";
// $sub_category_id="";
// $sub_category_name="";
// $sub_category_order="";
// $category_id="";
// if(isset($_GET["edit_id"])){

// 	$qe = mysqli_query($con, "select * from table_sub_category where sub_category_id='".mres($con,$_GET["edit_id"])."'");
// 	while($row=mysqli_fetch_array($qe)){
// 		$sub_category_id=$row["sub_category_id"];
// 		$sub_category_name=$row["sub_category_name"];
// 		$sub_category_order=$row["sub_category_order"];
// 		$category_id=$row["category_id"];
// 	}
// }


// if(isset($_POST["btn_save"])){
// 	$text_sub_category_name=mres($con,$_POST["text_sub_category_name"]);
// 	$text_sub_category_order=mres($con,$_POST["text_sub_category_order"]);
// 	$category_id=mres($con,$_POST["category_id"]);
// $qry=mysqli_query($con, "insert into table_sub_category values('','".$text_sub_category_name."','".$text_sub_category_order."','".$category_id."')");
// if($qry){
// 	$msg='
// 		<div id="login-alert" class="alert alert-success col-sm-12">Success! Data is inserted</div>
// 	';
// }
// else {
// 	$msg='
// 		<div id="login-alert" class="alert alert-danger col-sm-12">Fail! Cannot insert data to Database</div>
// 	';
// }
// }

// if(isset($_POST["btn_edit"])){
// $sub_category_id=mres($con,$_POST["text_sub_category_id"]);
// $sub_category_name=mres($con,$_POST["text_sub_category_name"]);
// $sub_category_order=mres($con,$_POST["text_sub_category_order"]);
// $category_id=mres($con,$_POST["category_id"]);
// $qry=mysqli_query($con,"update table_sub_category set sub_category_name='".$sub_category_name."', sub_category_order='".$sub_category_order."',category_id='".$category_id."' where sub_category_id='".$sub_category_id."'");

// if($qry){
// 	header("location: manage_sub_category.php");
// 	$msg='
// 		<div id="login-alert" class="alert alert-success col-sm-12">Success! Data is edited</div>
// 	';
// }
// else {
// 	$msg='
// 		<div id="login-alert" class="alert alert-danger col-sm-12">Fail! Cannot edit data to Database</div>
// 	';
// }
// }

?>
<?php
include "header.php";

?>
	<div class="row" style="padding-left: 0px;padding-right: 0px;">
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="padding-left: 0px;padding-right: 0px;">
				<?php include "left_menu.php";?>
			</div>

			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
				<div class="panel panel-info">
					<div class="panel-heading">
						<div class="panel-title">Add New Lecture</div>
					</div>
						<div class="panel-body">
							<?php echo $msg;?>
							<form id="form_lecture" class="form-horizontal" role="form" method="post" action='<?php echo $_SERVER["PHP_SELF"];?>'>
							<input type="hidden" name="text_lecture_id" >

							<div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon">Lecture Order</span>
                                    <input type="text" class="form-control" name="text_lecture_order" id="text_lecture_order">
                                </div>

                                <div style="margin-bottom: 25px;" class="input-group">
                                	<span class="input-group-addon">Sub Category</span>
                                	<select name="sub_category_id" class="form-control" id="sub_category_id">
                                		<option value=''>-- Choose a Sub Category --</option>
                                	<?php
                                	$qtc=mysqli_query($con,"select * from table_sub_category order by sub_category_order asc");
                                	while ($row=mysqli_fetch_array($qtc)) {
                                		if($row["sub_category_id"]==$sub_category_id)
                                		echo '<option value="'.$row["sub_category_id"].'" selected>'.$row["sub_category_name"].'</option>';
                                	    else
                                		echo '<option value="'.$row["sub_category_id"].'">'.$row["sub_category_name"].'</option>';
                    
                                	}
                                	?>
                                	</select></div>
							<div style="margin-bottom: 25px" class="input-group">
                                    Lecture Content<br />
                                    <textarea class="form-control ckeditor" name="editor" id="text_lecture_content"></textarea>
                            </div>

                                <div style="margin-top:10px" class="form-group">
                                	<div class="col-sm-12 controls">
										<input type="submit" id="btn_save" name="btn_save" class="btn btn-info btn-block btn-large" value="Save">
                                    </div>
                                </div>
						</form>

						</div>
			</div>



	</div>

</div>
<script>
	$(document).ready(function(){
			$('input[class="form-control"]').focus(function(){
			$(this).removeAttr('style');
			});

	  $("#btn_save").click(function(e){
	 	if($('#text_lecture_content').val()==''){
	 		$('#text_lecture_content').css("border-color", "#DA190B");
	 		$('#text_lecture_content').css("background", "#F2DEDE");
	 		e.preventDefault();
	 	}
	 	if($('#text_lecture_order').val()==''){
	 		$('#text_lecture_order').css("border-color", "#DA190B");
	 		$('#text_lecture_order').css("background", "#F2DEDE");
	 		e.preventDefault();
	 	}
	 	if($('#sub_category_id').val()==''){
	 		$('#sub_category_id').css("border-color", "#DA190B");
	 		$('#sub_category_id').css("background", "#F2DEDE");
	 		e.preventDefault();
	 	}
	 	else{
	 		$('form_lecture').unbind('submit').submit();
	 	}
	  });
	});
</script>
<?php include "footer.php"; ?>