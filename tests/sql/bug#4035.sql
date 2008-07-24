-- SQL_PARSER_FLAG_MYSQL
UPDATE tblTicklerPatientData
  SET tblTicklerPatientData.final_diagnosis = ptc.path_diagnosis_codes
FROM
  tblTicklerPatientData
    INNER JOIN `PatientTest(Case)` as ptc
      ON tblTicklerPatientData.PatientTest_key = ptc.PatientTest_key
WHERE
  ptc.path_diagnosis_codes Is Not Null
    and tblTicklerPatientData.final_diagnosis is null;
