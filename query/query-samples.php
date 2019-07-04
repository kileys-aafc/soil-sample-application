<?php 

if(isset($_POST['submit-query'])){

$proj_id = $_POST['proj_id'];
$province =  $_POST['province'];
$loc_id = $_POST['loc_id'];
$sample_id = $_POST['sample_id_value'];
$year= $_POST['year_value'];

//-- AND clauses for filtering

//-- Project ID Filter

if($proj_id == ""){
    $proj_id_clause = "";
}
else{
    $proj_id_clause = "AND projects.proj_id = $proj_id";
}

//-- Province Filter

if($province == ""){
    $province_clause = "";
}
else{
    $province_clause = "AND sample_info.province = '$province'";
}

//-- Location Filter

if($loc_id == ""){
    $loc_id_clause = "";
}
else{
    $loc_id_clause = "AND location_info.loc_id = $loc_id";
}    

//-- Sample ID Filter

if($sample_id == ""){
    $sample_id_clause = "";
}
else{
    $sample_id_clause = "AND sample_info.sample_id = $sample_id";
} 

//-- Year Filter

if($year == ""){
    $year_clause = "";
}
else{
    $year_clause = "AND sample_info.year = $year";
} 

//-- SQL statements
$query_samples = "SELECT *
                        FROM sample_info 
                            LEFT JOIN projects 
                                ON sample_info.proj_id = projects.proj_id
                            LEFT JOIN physical 
                                ON sample_info.sample_id = physical.sample_id
                            LEFT JOIN chemical
                                ON sample_info.sample_id = chemical.sample_id
                            LEFT JOIN location_info
                                ON sample_info.loc_id = location_info.loc_id
                            WHERE
                                1=1
                            $proj_id_clause
                            $province_clause
                            $loc_id_clause
                            $sample_id_clause
                            $year_clause
                            ";

$response_samples = @mysqli_query($dbc,$query_samples);

//-- Separate Query because 1:M relationship
$query_locations = "SELECT *
                        FROM sample_info 
                            LEFT JOIN projects 
                                ON sample_info.proj_id = projects.proj_id
                            LEFT JOIN physical 
                                ON sample_info.sample_id = physical.sample_id
                            LEFT JOIN chemical
                                ON sample_info.sample_id = chemical.sample_id
                            LEFT JOIN location_info
                                ON sample_info.loc_id = location_info.loc_id
                            WHERE
                                1=1
                            $proj_id_clause
                            $province_clause
                            $loc_id_clause
                            $sample_id_clause
                            $year_clause
                            GROUP BY location_info.loc_id
                            ";
$response_locations = @mysqli_query($dbc,$query_locations);

//-- Separate Query because 1:M relationship
$query_projects = "SELECT *
                        FROM sample_info 
                            LEFT JOIN projects 
                                ON sample_info.proj_id = projects.proj_id
                            LEFT JOIN physical 
                                ON sample_info.sample_id = physical.sample_id
                            LEFT JOIN chemical
                                ON sample_info.sample_id = chemical.sample_id
                            LEFT JOIN location_info
                                ON sample_info.loc_id = location_info.loc_id
                            WHERE
                                1=1
                            $proj_id_clause
                            $province_clause
                            $loc_id_clause
                            $sample_id_clause
                            $year_clause
                            GROUP BY projects.proj_id
                            ";
$response_projects = @mysqli_query($dbc,$query_projects);

//--- call function to build table ---
include("build-query-table.php");
build_query_table($response_samples, $response_locations, $response_projects);
include("download-xlsx.php");
mysqli_close($dbc);
}?>