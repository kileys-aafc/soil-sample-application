<html>
    <?php
        include '../index.php';  
    ?>

<head><title>Data Structure</title></head>  

<body>
    <div  class="page-subtitle">
       <!--- <p class="big-1">Add a New Sample</p>--->
        <p class="big-2"><strong>Database Structure</strong></p>
    </div>
   
    <div class="page-main-content">
         <div class = "data_structure dataStrleft">   
            <img id = "dataStrImg" 
                 src = "../images/databaseStructure.png" 
                 alt="Database Structure Explanation" 
                 align="bottom"
                 width="100%"><br>
            
        </div>
        <div class = "data_structure dataStrright">   
             <p>
            In this system, all soil sample data are stored in multiple tables in a MySQL database with the name of "soiltest1".
            </p>
            <p>
            All tables are connected with the general tables by having a field that refers the same information in the general table. for example, the "site_info" table has site number field which also exist in "sample" table.
            </p>
            <br>
            <p>If more information need to be included in this database, please contact the administrator to modify the database by adding new table or new field. </p>        </div>
        
    </div>

</body>
    
</html>