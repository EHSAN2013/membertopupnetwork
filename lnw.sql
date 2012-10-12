SELECT lm.*, sr.sr_target, sr.sr_direct FROM (
	SELECT sm.sm_id,sm.sm_code,sm.sm_email,sm.sm_name,sm.sm_date_regist 
	FROM system_member AS sm LEFT JOIN system_liner AS sl
 	ON sl.sli_sr_reply=sm.sm_id
 	WHERE sl.sli_sr_reply IS NULL
) AS lm LEFT JOIN system_reply AS sr
ON sr.sr_sm_id=lm.sm_id WHERE lm.sm_id!=1
ORDER BY lm.sm_id DESC