<?php 

require '../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
 
// Create new Spreadsheet object
$spreadsheet = new Spreadsheet();

// Set document properties
$spreadsheet->getProperties()->setCreator('CanSIS')
    ->setLastModifiedBy('CanSIS')
    ->setTitle('CanSIS Soil Sample Archive Export')
    ->setSubject('CanSIS Soil Sample Archive Export');
    
// Create sample_info sheet
$spreadsheet->setActiveSheetIndex(0);    
$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle('sample_info');

// Query sample_info
$result = mysqli_query($dbc, $query_samples);

// Set sample_info column names
$sheet->setCellValue('A1', 'sample_id');
$sheet->setCellValue('B1', 'loc_id');
$sheet->setCellValue('C1', 'proj_id');
$sheet->setCellValue('D1', 'year');
$sheet->setCellValue('E1', 'date');
$sheet->setCellValue('F1', 'province');
$sheet->setCellValue('G1', 'u_depth');
$sheet->setCellValue('H1', 'l_depth');
$sheet->setCellValue('I1', 'horizon');
$sheet->setCellValue('J1', 'orig_id');
$sheet->setCellValue('K1', 'notes');

// Insert Data
$i = 2;
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
  $sheet->setCellValue('A'.$i, $row['sample_id']);
  $sheet->setCellValue('B'.$i, $row['loc_id']);
  $sheet->setCellValue('C'.$i, $row['proj_id']);
  $sheet->setCellValue('D'.$i, $row['year']);
  $sheet->setCellValue('E'.$i, $row['date']);
  $sheet->setCellValue('F'.$i, $row['province']);
  $sheet->setCellValue('G'.$i, $row['u_depth']);
  $sheet->setCellValue('H'.$i, $row['l_depth']);
  $sheet->setCellValue('I'.$i, $row['horizon']);
  $sheet->setCellValue('J'.$i, $row['orig_id']);
  $sheet->setCellValue('K'.$i, $row['notes']);
  $i++;
}
mysqli_free_result($result);

// Create locations sheet
$spreadsheet->createSheet();
$spreadsheet->setActiveSheetIndex(1);    
$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle('locations');

// Query locations
$result = mysqli_query($dbc, $query_locations);

// Set column names
$sheet->setCellValue('A1', 'loc_id');
$sheet->setCellValue('B1', 'lat_dd');
$sheet->setCellValue('C1', 'long_dd');
$sheet->setCellValue('D1', 'loc_acc');
$sheet->setCellValue('E1', 'map_unit');
$sheet->setCellValue('F1', 'subgroup');
$sheet->setCellValue('G1', 'series');


// Insert Data
$i = 2;
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
  $sheet->setCellValue('A'.$i, $row['loc_id']);
  $sheet->setCellValue('B'.$i, $row['lat_dd']);
  $sheet->setCellValue('C'.$i, $row['long_dd']);
  $sheet->setCellValue('D'.$i, $row['loc_acc']);
  $sheet->setCellValue('E'.$i, $row['map_unit']);
  $sheet->setCellValue('F'.$i, $row['subgroup']);
  $sheet->setCellValue('G'.$i, $row['series']);
  $i++;
}
mysqli_free_result($result);

// Create physical sheet
$spreadsheet->createSheet();
$spreadsheet->setActiveSheetIndex(2);    
$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle('physical');

// Query physical
$result = mysqli_query($dbc, $query_samples);

// Set column names
$sheet->setCellValue('A1', 'sample_id');
$sheet->setCellValue('B1', 't_gravel');
$sheet->setCellValue('C1', 't_clay');
$sheet->setCellValue('D1', 't_silt');
$sheet->setCellValue('E1', 't_sand');
$sheet->setCellValue('F1', 'vc_sand');
$sheet->setCellValue('G1', 'c_sand');
$sheet->setCellValue('H1', 'm_sand');
$sheet->setCellValue('I1', 'f_sand');
$sheet->setCellValue('J1', 'vf_sand');
$sheet->setCellValue('K1', 'u_depth_bd');
$sheet->setCellValue('L1', 'l_depth_bd');
$sheet->setCellValue('M1', 'bulkd');
$sheet->setCellValue('N1', 'texture');
$sheet->setCellValue('O1', 'field_txt');


// Insert Data
$i = 2;
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
  $sheet->setCellValue('A'.$i, $row['sample_id']);
  $sheet->setCellValue('B'.$i, $row['t_gravel']);
  $sheet->setCellValue('C'.$i, $row['t_clay']);
  $sheet->setCellValue('D'.$i, $row['t_silt']);
  $sheet->setCellValue('E'.$i, $row['t_sand']);
  $sheet->setCellValue('F'.$i, $row['vc_sand']);
  $sheet->setCellValue('G'.$i, $row['c_sand']);
  $sheet->setCellValue('H'.$i, $row['m_sand']);
  $sheet->setCellValue('I'.$i, $row['f_sand']);
  $sheet->setCellValue('J'.$i, $row['vf_sand']);
  $sheet->setCellValue('K'.$i, $row['u_depth_bd']);
  $sheet->setCellValue('L'.$i, $row['l_depth_bd']);
  $sheet->setCellValue('M'.$i, $row['bulkd']);
  $sheet->setCellValue('N'.$i, $row['texture']);
  $sheet->setCellValue('O'.$i, $row['field_txt']);
  $i++;
}
mysqli_free_result($result);

// Create chemical sheet
$spreadsheet->createSheet();
$spreadsheet->setActiveSheetIndex(3);    
$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle('chemical');

// Query chemical
$result = mysqli_query($dbc, $query_samples);

// Set column names
$sheet->setCellValue('A1', 'sample_id');
$sheet->setCellValue('B1', 'ph_cacl2');
$sheet->setCellValue('C1', 'ph_h2o');
$sheet->setCellValue('D1', 'ttl_c');
$sheet->setCellValue('E1', 'ttl_n');
$sheet->setCellValue('F1', 'caco3');
$sheet->setCellValue('G1', 'org_c');
$sheet->setCellValue('H1', 'org_c_n');
$sheet->setCellValue('I1', 'tec');
$sheet->setCellValue('J1', 'cec');
$sheet->setCellValue('K1', 'al_exch');
$sheet->setCellValue('L1', 'ca_exch');
$sheet->setCellValue('M1', 'k_exch');
$sheet->setCellValue('N1', 'mg_exch');
$sheet->setCellValue('O1', 'na_exch');
$sheet->setCellValue('P1', 'avail_k');
$sheet->setCellValue('Q1', 'avail_pbi');
$sheet->setCellValue('R1', 'avail_pbr');


// Insert Data
$i = 2;
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
  $sheet->setCellValue('A'.$i, $row['sample_id']);
  $sheet->setCellValue('B'.$i, $row['ph_cacl2']);
  $sheet->setCellValue('C'.$i, $row['ph_h2o']);
  $sheet->setCellValue('D'.$i, $row['ttl_c']);
  $sheet->setCellValue('E'.$i, $row['ttl_n']);
  $sheet->setCellValue('F'.$i, $row['caco3']);
  $sheet->setCellValue('G'.$i, $row['org_c']);
  $sheet->setCellValue('H'.$i, $row['org_c_n']);
  $sheet->setCellValue('I'.$i, $row['tec']);
  $sheet->setCellValue('J'.$i, $row['cec']);
  $sheet->setCellValue('K'.$i, $row['al_exch']);
  $sheet->setCellValue('L'.$i, $row['ca_exch']);
  $sheet->setCellValue('M'.$i, $row['k_exch']);
  $sheet->setCellValue('N'.$i, $row['mg_exch']);
  $sheet->setCellValue('O'.$i, $row['na_exch']);
  $sheet->setCellValue('P'.$i, $row['avail_k']);
  $sheet->setCellValue('Q'.$i, $row['avail_pbi']);
  $sheet->setCellValue('R'.$i, $row['avail_pbr']);
  $i++;
}
mysqli_free_result($result);

// Create projects sheet
$spreadsheet->createSheet();
$spreadsheet->setActiveSheetIndex(4);    
$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle('projects');

// Query projects
$result = mysqli_query($dbc, $query_projects);

// Set column names
$sheet->setCellValue('A1', 'proj_id');
$sheet->setCellValue('B1', 'proj_name');

// Insert Data
$i = 2;
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
  $sheet->setCellValue('A'.$i, $row['proj_id']);
  $sheet->setCellValue('B'.$i, $row['proj_name']);
  $i++;
}
mysqli_free_result($result);

/*  Archive Query not created

// Create archive sheet
$spreadsheet->createSheet();
$spreadsheet->setActiveSheetIndex(5);    
$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle('archive');

// Query archive
$result = mysqli_query($dbc, $query_samples);

// Set column names
$sheet->setCellValue('A1', 'sample_id');
$sheet->setCellValue('B1', 'jar');
$sheet->setCellValue('C1', 'arch_year');
$sheet->setCellValue('D1', 'section');
$sheet->setCellValue('E1', 'arch_col');
$sheet->setCellValue('F1', 'arch_row');
$sheet->setCellValue('G1', 'box_id');
$sheet->setCellValue('H1', 'weight');

// Insert Data
$i = 2;
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
  $sheet->setCellValue('A'.$i, $row['sample_id']);
  $sheet->setCellValue('B'.$i, $row['jar']);
  $sheet->setCellValue('C'.$i, $row['arch_year']);
  $sheet->setCellValue('D'.$i, $row['section']);
  $sheet->setCellValue('E'.$i, $row['arch_col']);
  $sheet->setCellValue('F'.$i, $row['arch_row']);
  $sheet->setCellValue('G'.$i, $row['box_id']);
  $sheet->setCellValue('H'.$i, $row['weight']);
  $i++;
}
mysqli_free_result($result);

*/

// OUTPUT
$spreadsheet->setActiveSheetIndex(0);
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('..\download\sample-query.xlsx');
exit;
?>


