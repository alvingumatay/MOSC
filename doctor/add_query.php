<?php
	if(ISSET($_POST['save_f'])){
		$q = $conn->query("SELECT * FROM `complaints` WHERE `com_id` = '$_GET[comp_id]'") or die(mysqli_error());
		$f = $q->fetch_array();
		$requested_by = $_POST['requested_by'];
		$date_of_request = date("Y-m-d", strtotime($f['date']));
		$color = $_POST['color'];
		$consistency = $_POST['consistency'];
		$occult_blood = $_POST['occult_blood'];
		$others_chem = $_POST['others_chem'];
		$pus_cells = $_POST['pus_cells'];
		$rbc = $_POST['rbc'];
		$fat_globules = $_POST['fat_globules'];
		$ova = $_POST['ova'];
		$larva = $_POST['larva'];
		$adult_forms = $_POST['adult_forms'];
		$cyst = $_POST['cyst'];
		$trophozoites = $_POST['trophozoites'];
		$others_pro = $_POST['others_pro'];
		$remarks = $_POST['remarks'];
		$date_reported = date("Y-m-d", strtotime("+8 HOURS"));
		$pathologist = $_POST['pathologist'];
		$itr_no = $_POST['itr_no'];
		$user_id = $_POST['user_id'];
		$month = date("M", strtotime("+8 HOURS"));
		$year = date("Y", strtotime("+8 HOURS"));
		$medical_technologist = $_POST['medical_technologist'];
		$conn = new mysqli("localhost","root","","hcpms") or die(mysqli_error());
		$conn->query("INSERT INTO `fecalisys` VALUES('', '$date_of_request', '50', '$requested_by', '$color', '$consistency', '$pus_cells', '$rbc', '$fat_globules', '$occult_blood', '$others_chem', '$ova', '$larva', '$adult_forms', '$cyst', '$trophozoites', '$others_pro', '$remarks', '$date_reported', '$pathologist', '$medical_technologist', '$itr_no', '$user_id', '$month', '$year')") or die(mysqli_error());
		$conn->query("UPDATE `complaints` SET `status` = 'Done' WHERE `itr_no` = '$_GET[itr_no]' && `section` = 'Fecalysis' && `com_id` = '$_GET[comp_id]'") or die(mysqli_error());
		header("location:view_fecalysis_record.php");
		$conn->close();
	}
	
	if(ISSET($_POST['save_h'])){
		$date_requested = date("Y-m-d", strtotime($_POST['date_requested']));
		$requested_by = $_POST['requested_by'];
		$hemoglobin = $_POST['hemoglobin'];
		$hematocrit = $_POST['hematocrit'];
		$rbc_count = $_POST['rbc_count'];
		$wbc_count = $_POST['wbc_count'];
		$neutrophil = $_POST['neutrophil'];
		$segmenters = $_POST['segmenters'];
		$stabs = $_POST['stabs'];
		$lymphocytes = $_POST['lymphocytes'];
		$monocyte = $_POST['monocyte'];
		$eosinophil = $_POST['eosinophil'];
		$basophil = $_POST['basophil'];
		$total = $_POST['total'];
		$platelet = $_POST['platelet'];
		$bleeding_time = $_POST['bleeding_time'];
		$clotting_time = $_POST['clotting_time'];
		$abo_group = $_POST['abo_group'];
		$rh_group = $_POST['rh_group'];
		$remarks = $_POST['remarks'];
		$pathologist = $_POST['pathologist'];
		$medical_technologist = $_POST['medical_technologist'];
		$itr_no = $_POST['itr_no'];
		$user_id = $_POST['user_id'];
		$month = date("M", strtotime("+8 HOURS"));
		$year = date("Y", strtotime("+8 HOURS"));
		$conn = new mysqli("localhost","root","","hcpms") or die(mysqli_error());
		$conn->query("INSERT INTO `hematology` VALUES('', '$date_requested', '175', '$requested_by', '$hemoglobin', '$hematocrit', '$rbc_count', '$wbc_count', '$platelet', '$bleeding_time', '$clotting_time', '$neutrophil', '$segmenters', '$stabs', '$lymphocytes', '$monocyte', '$eosinophil', '$basophil', '$total', '$abo_group', '$rh_group', '$remarks', '$pathologist', '$medical_technologist', '$itr_no', '$user_id', '$month',  '$year')") or die(mysqli_error());
		$conn->query("UPDATE `complaints` SET `status` = 'Done' WHERE `itr_no` = '$_GET[itr_no]' && `section` = 'Hematology' && `com_id` = '$_GET[comp_id]'") or die(mysqli_error());
		header("location:view_hematology_record.php");
		$conn->close();
	}
	
	if(ISSET($_POST['save_u'])){
		$date_of_request = $_POST['date_of_request'];
		$color = $_POST['color'];
		$transparency = $_POST['transparency'];
		$specific_gravity = $_POST['specific_gravity'];
		$ph = $_POST['ph'];
		$sugar = $_POST['sugar'];
		$protein = $_POST['protein'];
		$pregnacy_test = $_POST['pregnancy_test'];
		$pus_cells = $_POST['pus_cells'];
		$rbc = $_POST['rbc'];
		$cast = $_POST['cast'];
		$urates = $_POST['urates'];
		$uric_acid = $_POST['uric_acid'];
		$cal_ox = $_POST['cal_ox'];
		$epith_cells = $_POST['epith_cells'];
		$mucus_threads = $_POST['mucus_threads'];
		$others = $_POST['others'];
		$pathologist = $_POST['pathologist'];
		$medical_technologist = $_POST['medical_technologist'];
		$itr_no = $_POST['itr_no'];
		$user_id = $_POST['user_id'];
		$month = date("M", strtotime("+8 HOURS"));
		$year = date("Y", strtotime("+8 HOURS"));
		$conn = new mysqli("localhost","root","","hcpms") or die(mysqli_error());
		$conn->query("INSERT INTO `urinalysis` VALUES('', '$date_of_request', '60', '$color', '$transparency', '$specific_gravity', '$ph', '$sugar', '$protein', '$pregnacy_test', '$pus_cells', '$rbc', '$cast', '$urates', '$uric_acid', '$cal_ox', '$epith_cells', '$mucus_threads', '$others', '$pathologist', '$medical_technologist', '$itr_no', '$user_id', '$month', '$year')") or die(mysqli_error());
		$conn->query("UPDATE `complaints` SET `status` = 'Done' WHERE `itr_no` = '$_GET[itr_no]' && `section` = 'Urinalysis' && `com_id` = '$_GET[comp_id]'") or die(mysqli_error());
		header("location:view_urinalysis_record.php");
		$conn->close();
	}
if(ISSET($_POST['save_r'])){
		$diagnosis = $_POST['diagnosis'];
		$type_of_disability = $_POST['type_of_disability'];
	    $assessment = $_POST['assessment'];
		$plan = $_POST['plan'];
        $medical_doctor = $_POST['medical_doctor'];
		$date = date('m/d/Y', strtotime('+8 HOURS'));
		$itr_no = $_POST['itr_no'];
		$user_id = $_POST['user_id'];
		$month = date("M", strtotime("+8 HOURS"));
		$year = date("Y", strtotime("+8 HOURS"));
		$conn = new mysqli("localhost","root","","hcpms") or die(mysqli_error());
		$conn->query("INSERT INTO `rehabilitation` VALUES('', '300','$diagnosis', '$type_of_disability',  '$assessment', '$plan', '$medical_doctor',  '$date', '$itr_no', '$user_id', '$month','$year')") or die(mysqli_error());
		$conn->query("UPDATE `complaints` SET `status` = 'Done' WHERE `itr_no` = '$_GET[itr_no]' && `section` = 'Rehabilitation' && `com_id` = '$_GET[comp_id]'") or die(mysqli_error());
		header("location: view_rehabilitation_record.php");
		$conn->close();
	}

    if(ISSET($_POST['save_m'])){
		$diagnosis = $_POST['diagnosis'];
		$type_of_disability = $_POST['type_of_disability'];
		$subjective = $_POST['subjective'];
		$objective = $_POST['objective'];
		$assessment = $_POST['assessment'];
		$plan = $_POST['plan'];
        $medical_doctor = $_POST['medical_doctor'];
		$date = date('m/d/Y', strtotime('+8 HOURS'));
		$itr_no = $_POST['itr_no'];
		$user_id = $_POST['user_id'];
		$month = date("M", strtotime("+8 HOURS"));
		$year = date("Y", strtotime("+8 HOURS"));
		$conn = new mysqli("localhost","root","","hcpms") or die(mysqli_error());
		$conn->query("INSERT INTO `minor_surgery` VALUES('', '300','$diagnosis', '$type_of_disability', '$assessment', '$plan','$medical_doctor', '$date', '$itr_no', '$user_id', '$month','$year')") or die(mysqli_error());
		$conn->query("UPDATE `complaints` SET `status` = 'Done' WHERE `itr_no` = '$_GET[itr_no]' && `section` = 'MinorSurgery' && `com_id` = '$_GET[comp_id]'") or die(mysqli_error());
		header("location: view_minor_surgery_record.php");
		$conn->close();
	}

    if(ISSET($_POST['save_d'])){
		$diagnosis = $_POST['diagnosis'];
		$type_of_disability = $_POST['type_of_disability'];
		$subjective = $_POST['subjective'];
		$objective = $_POST['objective'];
		$assessment = $_POST['assessment'];
		$plan = $_POST['plan'];
        $medical_doctor = $_POST['medical_doctor'];
		$date = date('m/d/Y', strtotime('+8 HOURS'));
		$itr_no = $_POST['itr_no'];
		$user_id = $_POST['user_id'];
		$month = date("M", strtotime("+8 HOURS"));
		$year = date("Y", strtotime("+8 HOURS"));
		$conn = new mysqli("localhost","root","","hcpms") or die(mysqli_error());
		$conn->query("INSERT INTO `dislocation` VALUES('', '300','$diagnosis', '$type_of_disability', '$assessment', '$plan', '$medical_doctor', '$date', '$itr_no', '$user_id', '$month','$year')") or die(mysqli_error());
		$conn->query("UPDATE `complaints` SET `status` = 'Done' WHERE `itr_no` = '$_GET[itr_no]' && `section` = 'Dislocation' && `com_id` = '$_GET[comp_id]'") or die(mysqli_error());
		header("location: view_dislocation_record.php");
		$conn->close();
	}
	
	if(ISSET($_POST['save_x'])){
		$case_no = $_POST['case_no'];
		$referred_by = $_POST['referred_by'];
		$clinical_impression = $_POST['clinical_impression'];
		$room_bed_no = $_POST['room_bed_no'];
		$type_of_examination = $_POST['type_of_examination'];
		$date_taken = date('Y-m-d', strtotime('+8 HOURS'));
		$remark = $_POST['remark'];
		$radiologist = $_POST['radiologist'];
		$itr_no = $_POST['itr_no'];
		$user_id = $_POST['user_id'];
		$month = date("M", strtotime("+8 HOURS"));
		$year = date("Y", strtotime("+8 HOURS"));
		$conn = new mysqli("localhost","root","","hcpms") or die(mysqli_error());
		$conn->query("INSERT INTO `radiological` VALUES('', '$case_no', '$referred_by', '$clinical_impression', '$room_bed_no', '$type_of_examination', '$date_taken', '$remark', '$radiologist', '$itr_no', '$user_id', '$month','350', '$year')") or die(mysqli_error());
		$conn->query("UPDATE `complaints` SET `status` = 'Done' WHERE `itr_no` = '$_GET[itr_no]' && `section` = 'Xray' && `com_id` = '$_GET[comp_id]'") or die(mysqli_error());
		header("location:view_xray_record.php");
		$conn->close();
	}
	