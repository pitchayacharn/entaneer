<?php 
//require('connect/connect_db.php'); 
$arr1 = array('','จานรองแก้ว','แผ่นรองจาน','กระเป๋าถือสตรี','กระเป๋าใส่เหรียญ','ตะกร้าใส่ของมีหูหิ้ว','ตะกร้าใส่ผลไม้','ตะกร้าใส่ของขนาดเล็ก','พวงกุญแจ');
$arr2 = array('','20-35','50-65','300-500','35-50','400-500','200-300','50-100','50-100');
if($_POST){
	$i = 1;
	$order = array();
	asort($_POST['p_order']);
	
	foreach($_POST['p_order'] as $k => $val){
		if($val==$i){
			$order[$i] = $k;
			$i++;
		}
	} 
	
	foreach($order as $v){
		if(isset($_POST['p_price'][$v])){
			$p_price = $_POST['p_price'][$v];
		}else{
			$p_price = 0;
		}
		echo " INSERT INTO req_product(id,basic_data_id,product,no,reason,price_per_unit,properly,not_properly) VALUES ('','','{$arr1[$v]}','{$_POST['p_order'][$v]}','{$_POST['p_choice'][$v]}','{$arr2[$v]}','{$_POST['p_app'][$v]}','{$p_price}');<br><br>
		";
	}
}
?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>แบบสำรวจความต้องการ</title>

<!--
<script type="text/javascript" src="jQuery/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="jQuery/jquery-1.7.1.min.js"></script>
-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>

<body>



<form <?php /*action="insert_qtn.php"*/ ?> method="post">
  <table align="center" >
  <tr>
    <td colspan="4" align="center"><h3>แบบสำรวจความต้องการตลาดผลิตภัณฑ์แปรรูปจากใยกล้วย</h3></td>
  </tr>
  <tr><td colspan="4" >ขอความอนุเคราะห์ในการตอบแบบสอบถามเพื่อใช้ในการพฒันาผลิตภัณฑ์แปรรูปจากใยกล้วยซึ่งเป็นสินค้าหัตถกรรมให้ตรงกับความต้องการของผู้บริโภค</td></tr><br>
  <tr><td colspan="4" ><br><b><u>ข้อมูลเบื้องต้น</u></b></td></tr>
  <tr> <td colspan="4" > เพศ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  	<input type='radio' name='gender' value='ชาย' checked > ชาย
  	<input type='radio' name='gender' value='หญิง' > หญิง </td>
  </tr>
  <tr> <td colspan="4" > อายุ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  		<input type='radio' name='age' value="21-30">21-30ปี &nbsp;&nbsp;&nbsp;
  		<input type='radio' name='age' value="31-40">31-40ปี &nbsp;&nbsp;&nbsp;
  		<input type='radio' name='age' value="41-50">41-50ปี &nbsp;&nbsp;&nbsp;
  		<input type='radio' name='age' value="51-60">51-60ปี ขึ้นไป</td>
  </tr>

  <tr> <td colspan="4" > อาชีพ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  		<input type='radio' name='job' value="รับราชการ" onclick="on_hide()">รับราชการ</option>
  		<input type='radio' name='job' value="ทำงานบริษัท" onclick="on_hide()">ทำงานบริษัท</option>
  		<input type='radio' name='job' value="นักศึกษา" onclick="on_hide()">นักศึกษา</option>
  		<input type='radio' name='job' value="อื่น" onclick="on_chang()" id="estatus">อื่น
      </td>

  </tr>
  <tr  id='div_other' style="display: none; " ><td style="margin-right:20em;">ระบุ 
  <input type="text" name="divi" size="20" style="border-bottom:dotted 1px; border-left:none; 
    border-right:none; border-top:none; text-align: center;  " value="">
  	</td></tr>

<tr> <td colspan="4" > รายได้ต่อเดือน &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  	 <input type='radio' name='income' value="10,000 - 15,000บาท"> 10,000 - 15,000บาท <br>
  	 &nbsp;&nbsp;&nbsp;<input type='radio' name='income' value="15,001 - 20,000บาท" style="margin-left:10em;">15,001 - 20,000บาท <br>
  		&nbsp;&nbsp;&nbsp;<input type='radio' name='income' value="20,001 - 25,000บาท" style="margin-left:10em;">20,001 - 25,000บาท <br>
  		&nbsp;&nbsp;&nbsp;<input type='radio' name='income' value="25,001 - 30,000บาท" style="margin-left:10em;">25,001 - 30,000บาท <br>
  		&nbsp;&nbsp;&nbsp;<input type='radio' name='income' value="30,001 - 35,000บาท" style="margin-left:10em;">30,001 - 35,000บาท <br>
  		&nbsp;&nbsp;&nbsp;<input type='radio' name='income' value="35,001 - 40,000บาท" style="margin-left:10em;">35,001 - 40,000บาท ขึ้นไป
  	</td>
  </tr>

  <tr><td><br><b><u>ข้อมูลด้านความต้องการการซื้อผลิตภัณฑ์</u></b></td></tr>
  <tr><td colspan="4" >หากท่านต้องเลือกซื้อผลิตภัณฑ์ที่แปรรูปจากใยกล้วย ท่านจะเลือกซื้อผลิตภัณฑ์ประเภทใด โดยมีวัตถุเพื่อนำไปใช้ประโยชน์อะไร และราคาที่ตั้งไว้ท่านคิดว่าเหมาะสมหรือใหม่
  <p>ท่านสามารถเลือกได้ 3 ผลิตภัณฑ์ โดยลำดับตามผลิตภัณฑ์การเลือกซื้อมากที่สุดเป็นลำดับที่ 1</p></td></tr>
</table>

<table align="center" style="border: solid 1px;">
  <tr>
    <th  align="center" style="border: solid 1px;" rowspan = "2">ผลิตภัณฑ์</th>
    <th  align="center" style="border: solid 1px;" rowspan = "2" >ลำดับที่เลือก</th>
    <th  align="center" style="border: solid 1px;" colspan = "4" width="35%">วัตถุประสงค์การซื้อ</th>
    <th  align="center" style="border: solid 1px;" rowspan = "2" >ราคาต่อหน่วย(บาท)</th>
    <th  align="center" style="border: solid 1px;" rowspan = "2" >เหมาะสม</th>
    <th  align="center" style="border: solid 1px;" rowspan = "2" width="20%">ไม่เหมาะสม(  กรุณาระบุราคาที่เหมาะสมในความคิดของท่าน)</th>
  </tr>
  <tr>
    
    <td style="border: solid 1px;" align="center">เก็บโชว์ </td>
    <td style="border: solid 1px;" align="center">ใช้ส่วนตัว </td>
    <td style="border: solid 1px;" align="center">ของขวัญ</td>
    <td style="border: solid 1px;" align="center">อื่นๆระบุ</td>

  </tr>
  
  <style>
	.c1 { border: solid 1px; padding-bottom: 0.25em; padding-top: 0.25em; text-align: left; }
	.c2 { border: solid 1px; text-align: center; }
	
	.i1 { border-bottom:dotted 1px; border-left:none; border-right:none; border-top:none; text-align: center; }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script>
	$(document).ready(function(){
		$('.pronumber').on('change',function(){
			var tmp = $(this).val();
			if(tmp == ''){
				$(this).parent().parent().children().children().attr('disabled','disabled');
				$(this).removeAttr('disabled');
			}else{
				$(this).parent().parent().children().children().removeAttr('disabled');
			}
		});
		
		$('.check2').on('click',function(){
			if($(this).is(':checked')){
				$(this).closest('td').next().find('.p_price').attr('disabled','disabled');
			}else{
				$(this).closest('td').next().find('.p_price').removeAttr('disabled');
			}
		});
	});
  </script>
  <?php
$arr1 = array('จานรองแก้ว','แผ่นรองจาน','กระเป๋าถือสตรี','กระเป๋าใส่เหรียญ','ตะกร้าใส่ของมีหูหิ้ว','ตะกร้าใส่ผลไม้','ตะกร้าใส่ของขนาดเล็ก','พวงกุญแจ');
$arr2 = array('20-35','50-65','300-500','35-50','400-500','200-300','50-100','50-100');
  $i = 0;
  $n = 1;
  foreach($arr1 as $val){
  ?>
  <tr>
    <td class='c1'> <?php echo $val; ?> <input type="checkbox" name="product[<?php echo $n; ?>]" value="<?php echo $val; ?>" style="display: none;"></td>
    <td class='c2'>
		<input type="text" class='i1 pronumber' name="p_order[<?php echo $n; ?>]" size="5"  value="" onKeyPress="return chkNumber(this)" maxlength="1">
    </td>
    <td class='c2'>
      <input type="radio" name="p_choice[<?php echo $n; ?>]" value="เก็บโชว์" onclick="demoVisibility<?php echo $n; ?>()" disabled>
    </td>
    <td class='c2'>
      <input type="radio" name="p_choice[<?php echo $n; ?>]" value="ใช้ส่วนตัว" onclick="demoVisibility<?php echo $n; ?>()" disabled>
    </td>
    <td class='c2'>
      <input type="radio" name="p_choice[<?php echo $n; ?>]" value="ของขวัญ" onclick="demoVisibility<?php echo $n; ?>()" disabled>
    </td>
    <td class='c2'>
      <input type="text" class='i1' name="p_choice_other[<?php echo $n; ?>]" id="myP<?php echo $n;?>" size="7" value="" disabled>
    </td>
    <td class='c2'>
		<?php echo $arr2[$i]; ?> บาท
	</td>
    <td class='c2'>
      <input type="checkbox" name="p_app[<?php echo $n; ?>]" value="ไม่เหมาะสม" checked disabled style="display: none">
      <input type="checkbox" name="p_app[<?php echo $n; ?>]" value="เหมาะสม" class="check2" disabled>
    </td>
    <td class='c2'>
      <input type="text" class='i1 p_price' name="p_price[<?php echo $n; ?>]" size="10" value="" disabled> บาท
    </td>
  </tr>
  <?php $i++; $n++; } ?>
  
  <tr>
    <td class='c1'>
		อื่นๆระบุ<input type="text" name="other_product" size="5" class='i1' value="">
		<input type="checkbox" name="product[9]" value="อื่นๆระบุ" style="display: none;">
	</td>
    <td class='c2'>
      <input type="text" name="p_order[9]" size="5" class="i1 pronumber" value="" onKeyPress="return chkNumber(this)"  maxlength="1">
    </td>
    <td class='c2'>
      <input type="radio" name="choice[9]" onclick="demoVisibility9()" value="เก็บโชว์" disabled>
    </td>
    <td class='c2'>
      <input type="radio" name="choice[9]" onclick="demoVisibility9()" value="ใช้ส่วนตัว" disabled>
    </td>
    <td class='c2'>
      <input type="radio" name="choice[9]" onclick="demoVisibility9()" value="ของขวัญ" disabled>
    </td>
    <td class='c2'>
      <input type="text" name="p_choice_other[9]" id="myP9" size="7" class='i1' value="" disabled>
    </td>
    <td class='c2'></td>
    <td class='c2'></td>
    <td class='c2'>
      <input type="text" name="p_price[9]" size="10" class='i1' value="" disabled> บาท
    </td>
  </tr>
</table>
  
<?php
  
?>


<table>
  <tr >
    <td align="center" style="table-layout: fixed; border-collapse:collapse; 
      padding-left:35em ; padding-bottom: 5em; "></td>
    <td><input type="submit"  name="submit" value="submit "/></td>
    <td align="center" style="table-layout: fixed; border-collapse:collapse; 
      padding-right:3em ; padding-bottom: 5em; "></td>
    <td><input type="reset" name="Clear" value="Clear " /></td>
  </tr>
</table>

</form>

</body>
</html>

<script language="javascript">
  function on_chang() {

      document.getElementById('div_other').style.display="";
  }

  function on_hide() {
    
    document.getElementById('div_other').style.display="none";
  }
</script>

<!-- กรอกตัวเลข -->
<script language="JavaScript">
function chkNumber(ele){
  // console.log('keypress')
var vchar = String.fromCharCode(event.keyCode);
if ((vchar<'1' || vchar>'3') || $.inArray(vchar,valid) != -1 ) return false;
// if() return false;
ele.onKeyPress=vchar;
}
var valid = [];
var last_value;

$('.pronumber').focus(function(){
    if($(this).val() != ''){
      last_value = $(this).val();
    }
})
</script>

<!--วัถตุประสงค์การซื้อ-->
<script>
function demoVisibility1() {
    document.getElementById("myP1").style.visibility = "hidden";
}
</script>
<script>
function demoVisibility2() {
    document.getElementById("myP2").style.visibility = "hidden";
}
</script>
<script>
function demoVisibility3() {
    document.getElementById("myP3").style.visibility = "hidden";
}
</script>
<script>
function demoVisibility4() {
    document.getElementById("myP4").style.visibility = "hidden";
}
</script>
<script>
function demoVisibility5() {
    document.getElementById("myP5").style.visibility = "hidden";
}
</script>
<script>
function demoVisibility6() {
    document.getElementById("myP6").style.visibility = "hidden";
}
</script>
<script>
function demoVisibility7() {
    document.getElementById("myP7").style.visibility = "hidden";
}
</script>
<script>
function demoVisibility8() {
    document.getElementById("myP8").style.visibility = "hidden";
}
</script>
<script>
function demoVisibility9() {
    document.getElementById("myP9").style.visibility = "hidden";
}
</script>