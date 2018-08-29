<?php
/*---------------------------------------------------------------------------------------------------
This file creates the tabs on webpage
If name or number of database tables are changed, this file need to be modifided to meet requirements.
---------------------------------------------------------------------------------------------------
files include this php file are:


---------------------------------------------------------------------------------------------------*/

?>
<div class="tab">
    <button class="tablinks" onclick="openTab(event, 'tabNum1')" id="defaultOpen">General Info</button>
    <button class="tablinks" onclick="openTab(event, 'tabNum2')">Site Info</button>
    <button class="tablinks" onclick="openTab(event, 'tabNum3')">Physical Info</button>
    <button class="tablinks" onclick="openTab(event, 'tabNum4')">Chemical Info</button>
    <button class="tablinks" onclick="openTab(event, 'tabNum5')">Soil-Biome Info</button>
    <button class="tablinks" onclick="openTab(event, 'tabNum6')">Soil-Spectral Info</button>
    </div>
<script>
    function openTab(evt,tabNumber){
        var i, tabcnotent,tablinks;
        
        tabcontent=document.getElementsByClassName("tabcontent");
        for(i=0;i<tabcontent.length;i++){
            tabcontent[i].style.display="none";
        }
        
        tablinks=document.getElementsByClassName("tablinks");
        for(i=0;i<tablinks.length;i++){
            tablinks[i].className=tablinks[i].className.replace("active","");
        }
        
        document.getElementById(tabNumber).style.display="block";
        evt.currentTarget.className+=" active";
        
    }
        document.getElementById("defaultOpen").click();

</script>
    <style>
        .tab{
        overflow: hidden;
        border: 1px solid #c8c8c0;
        border-radius: 12px 12px 0 0;
        background: #c8c8c0;
        font-weight:600;
        width:100%;
        margin:0px auto;
        color:#373d38; 
          
    }    
    
    .tab button{
        background: inherit;
        float:left;
        border:none;
        cursor:pointer;
        padding:20px 25px;
        transition:0.3s;
        font-size: 14pt;  
      text-decoration: underline;
    }
    
    .tab button:hover{
         background:#b9baaa;
    }
    
    .tab button.active{
        background: #a9a633;
    }
    
    .tabcontent{
        display: none;
                font-family: Arial;

        margin: auto;
        font-size: 13pt;
        padding-top: 15px;
        line-height: 2.5;
    }
        
    </style>
