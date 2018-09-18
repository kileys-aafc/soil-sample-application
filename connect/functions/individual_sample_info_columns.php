<?php
/*---------------------------------------------------------------------------------------------------
this file is used to illustrate the informations of a single sample 
after it is updated or after that sample is added
---------------------------------------------------------------------------------------------------
files include this php file are:
    ../update/update3.php
    ../add/sample_added.php
-----------------------------------------------------------------------------------------------------*/
    echo"
        <div class='sub-col left01'>
        <b>General Info</b></br>
        <p class='align-left'>Sample ID: </p>      <p class='align-right'>".$sample_id."</p></br>
        <p class='align-left'>Site Number: </p>    <p class='align-right'>".$site_num."</p></br>
        <p class='align-left'>Field ID:    </p>    <p class='align-right'>".$field_id."</p></br>
        <p class='align-left'>Site Type:   </p>    <p class='align-right'>".$site_type."</p></br>
        <p class='align-left'>Year:        </p>    <p class='align-right'>".$year."</p></br>
        <p class='align-left'>Sample Number: </p>  <p class='align-right'>".$sample_num."</p></br>
        <p class='align-left'>Zone number: </p>    <p class='align-right'>".$zone."</p></br>
        <p class='align-left'>Shelf Number; </p>   <p class='align-right'>".$shelf."</p></br>
        <p class='align-left'>Level in Shelf: </p> <p class='align-right'>".$level."</p></br>
        <p class='align-left'>Row in Level: </p>   <p class='align-right'>".$rowrow."</p></br>
        <p class='align-left'>Box in the Row: </p> <p class='align-right'>".$box."</p></br>
        </div>"; 

    echo "
        <div class='sub-col left02'>
        <b>Physical Info</b></br>
        <p class='align-left'>LAB: </p>  <p class='align-right'>".$LAB."</p></br>
        <p class='align-left'>SMPL ID:  </p>  <p class='align-right'>".$SMPL_ID."</p></br>
        <p class='align-left'>Location: </p>  <p class='align-right'>".$LOCATION."</p></br>
        <p class='align-left'>Depth:    </p>  <p class='align-right'>".$DEPTH."</p></br>
        <p class='align-left'>Sand:     </p>  <p class='align-right'>".$SAND."</p></br>
        <p class='align-left'>Clay:     </p>  <p class='align-right'>".$CLAY."</p></br>
        <p class='align-left'>Silt:     </p>  <p class='align-right'>".$SILT."</p></br>
        <p class='align-left'>Sand_VC:  </p>  <p class='align-right'>".$SAND_VC."</p></br>
        <p class='align-left'>Sand_C:   </p>  <p class='align-right'>".$SAND_C."</p></br>
        <p class='align-left'>Sand_M:   </p>  <p class='align-right'>".$SAND_M."</p></br>
        <p class='align-left'>Sand_F:   </p>  <p class='align-right'>".$SAND_F."</p></br>
        <p class='align-left'>Sand_VF:  </p>  <p class='align-right'>".$SAND_VF."</p></br>
        </div>";

    echo "
        <div class='sub-col left03'>
        <b>Chemical Info</b></br>
        <p class='align-left'>ORG_MTR:   </p>  <p class='align-right'>".$ORG_MTR."</p></br>
        <p class='align-left'>CEC:       </p>  <p class='align-right'>".$CEC."</p></br>
        <p class='align-left'>BUFFER_PH: </p>  <p class='align-right'>".$BUFFER_PH."</p></br>
        <p class='align-left'>PER_K:     </p>  <p class='align-right'>".$PER_K."</p></br>
        <p class='align-left'>PER_MG:    </p>  <p class='align-right'>".$PER_MG."</p></br>
        <p class='align-left'>PER_CA:    </p>  <p class='align-right'>".$PER_CA."</p></br>
        <p class='align-left'>PER_NA:    </p>  <p class='align-right'>".$PER_NA."</p></br>
        </div>";  

    echo "
        <div class='sub-col left04'>
        <b>Biome Info</b></br>
        <p class='align-left'>Biome-01: </p>  <p class='align-right'>".$biome01."</p></br>                
        <p class='align-left'>Biome-02: </p>  <p class='align-right'>".$biome02."</p></br>                
        <p class='align-left'>Biome-03: </p>  <p class='align-right'>".$biome03."</p></br>                
        <p class='align-left'>Biome-04: </p>  <p class='align-right'>".$biome04."</p></br>                
        <p class='align-left'>Biome-05: </p>  <p class='align-right'>".$biome05."</p></br>                
        <p class='align-left'>Biome-06: </p>  <p class='align-right'>".$biome06."</p></br>                
        </div>";  

    echo "
        <div class='sub-col left04'>
        <b>Spectral Info</b></br>
        <p class='align-left'>Spectral-01: </p>  <p class='align-right'>".$spectral01."</p></br>                
        <p class='align-left'>Spectral-02: </p>  <p class='align-right'>".$spectral02."</p></br>                
        <p class='align-left'>Spectral-03: </p>  <p class='align-right'>".$spectral03."</p></br>              
        </div>"; 


?>