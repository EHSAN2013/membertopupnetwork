<?php
function addTopupPoint($stu_id, $replyId, $topupAmount)
{
	$linerId[0]=$replyId;
	$sqlInsert = "INSERT INTO system_topup_point VALUE('', '".$stu_id."', '".$linerId[0]."', '".$topupAmount*0.005."', '', '', '".date("Y-m-d H:i:s")."')";
	mysql_query($sqlInsert)or die(mysql_error());

	$i=1;
	while ($i <= 9) {
		$sqlSelect = "select sli_sr_target from system_liner where sli_sr_reply='".$linerId[$i-1]."' limit 1";
		$result = mysql_query($sqlSelect);
		$liner = mysql_fetch_assoc($result);
		if (empty($liner)) {
			break;
		} else {
			$linerId[$i] = $liner['sli_sr_target'];
			$sqlInsert = "INSERT INTO system_topup_point VALUE('', '".$stu_id."', '".$linerId[$i]."', '', '".$topupAmount*0.0025."', '', '".date("Y-m-d H:i:s")."')";
			mysql_query($sqlInsert)or die(mysql_error());
		}
		$i++;
	}
}

function clearTopupPoint($stu_id)
{
		$sqlDelete = "DELETE FROM system_topup_point WHERE stu_id='".$stu_id."'";
		mysql_query($sqlDelete);
}
?>