<?php
$tests = array (
  0 => 
  array (
    'sql' => '-- SQL_PARSER_FLAG_MYSQL
UPDATE tblTicklerPatientData
  SET tblTicklerPatientData.final_diagnosis = ptc.path_diagnosis_codes
FROM
  tblTicklerPatientData
    INNER JOIN `PatientTest(Case)` as ptc
      ON tblTicklerPatientData.PatientTest_key = ptc.PatientTest_key
WHERE
  ptc.path_diagnosis_codes Is Not Null
    and tblTicklerPatientData.final_diagnosis is null;
',
    'expect' => 
    array (
      'command' => 'update',
      'tables' => 
      array (
        0 => 
        array (
          'database' => '',
          'table' => 'tblTicklerPatientData',
          'alias' => '',
        ),
      ),
      'columns' => 
      array (
        0 => 
        array (
          'database' => '',
          'table' => 'tblTicklerPatientData',
          'column' => 'final_diagnosis',
          'alias' => '',
        ),
      ),
      'values' => 
      array (
        0 => 
        array (
          'value' => 
          array (
            'database' => '',
            'table' => 'ptc',
            'column' => 'path_diagnosis_codes',
            'alias' => '',
          ),
          'type' => 'ident',
        ),
      ),
      'from' => 
      array (
        'table_references' => 
        array (
          'table_factors' => 
          array (
            0 => 
            array (
              'database' => '',
              'table' => 'tblTicklerPatientData',
              'alias' => '',
            ),
            1 => 
            array (
              'database' => '',
              'table' => 'PatientTest(Case)',
              'alias' => 'ptc',
            ),
          ),
          'table_join' => 
          array (
            0 => 'inner join',
          ),
          'table_join_clause' => 
          array (
            0 => 
            array (
              'arg_1' => 
              array (
                'value' => 'tblTicklerPatientData.PatientTest_key',
                'type' => 'ident',
              ),
              'op' => '=',
              'arg_2' => 
              array (
                'value' => 'ptc.PatientTest_key',
                'type' => 'ident',
              ),
            ),
          ),
        ),
      ),
      'where_clause' => 
      array (
        'arg_1' => 
        array (
          'arg_1' => 
          array (
            'value' => 'ptc.path_diagnosis_codes',
            'type' => 'ident',
          ),
          'op' => 'is',
          'neg' => true,
          'arg_2' => 
          array (
            'value' => '',
            'type' => 'null',
          ),
        ),
        'op' => 'and',
        'arg_2' => 
        array (
          'arg_1' => 
          array (
            'value' => 'tblTicklerPatientData.final_diagnosis',
            'type' => 'ident',
          ),
          'op' => 'is',
          'arg_2' => 
          array (
            'value' => '',
            'type' => 'null',
          ),
        ),
      ),
    ),
    'fail' => false,
    'dialect' => 'MySQL',
  ),
);
?>
