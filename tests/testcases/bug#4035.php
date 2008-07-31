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
      0 => 
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
        'sets' => 
        array (
          0 => 
          array (
            'column' => 
            array (
              'args' => 
              array (
                0 => 
                array (
                  'database' => '',
                  'table' => 'ptc',
                  'column' => 'path_diagnosis_codes',
                  'alias' => '',
                ),
              ),
            ),
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
                'args' => 
                array (
                  0 => 
                  array (
                    'database' => '',
                    'table' => 'tblTicklerPatientData',
                    'column' => 'PatientTest_key',
                    'alias' => '',
                  ),
                  1 => 
                  array (
                    'database' => '',
                    'table' => 'ptc',
                    'column' => 'PatientTest_key',
                    'alias' => '',
                  ),
                ),
                'ops' => 
                array (
                  0 => '=',
                ),
              ),
            ),
          ),
        ),
        'where_clause' => 
        array (
          'args' => 
          array (
            0 => 
            array (
              'database' => '',
              'table' => 'ptc',
              'column' => 'path_diagnosis_codes',
              'alias' => '',
            ),
            1 => 
            array (
              'value' => 'Null',
              'type' => 'null',
            ),
            2 => 
            array (
              'database' => '',
              'table' => 'tblTicklerPatientData',
              'column' => 'final_diagnosis',
              'alias' => '',
            ),
            3 => 
            array (
              'value' => 'null',
              'type' => 'null',
            ),
          ),
          'ops' => 
          array (
            0 => 'is not',
            1 => 'and',
            2 => 'is',
          ),
        ),
      ),
      1 => ';',
    ),
    'fail' => false,
    'dialect' => 'MySQL',
  ),
);
?>
