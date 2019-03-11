<?php 

if(isset($_POST['submit-query'])){

$proj_id = $_POST['proj_id'];
$province =  $_POST['province'];
$loc_id = $_POST['loc_id'];
$sample_id = $_POST['sample_id_value'];
$year= $_POST['year_value'];

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
                            ";
$response_samples = @mysqli_query($dbc,$query_samples);

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
                            GROUP BY location_info.loc_id
                            ";
$response_locations = @mysqli_query($dbc,$query_locations);

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
                            GROUP BY projects.proj_id
                            ";
$response_projects = @mysqli_query($dbc,$query_projects);

//--- call function to build table ---
include("build-query-table.php");
build_query_table($response_samples, $response_locations, $response_projects);
mysqli_close($dbc);
}?>