<?php include '../nav-template.php'; ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="display-4 text-center">Database Definitions</h1>
            <hr class="mb-4">
        </div>
    </div>
</div>
<div class="container">
    <div class="row my-4">
        <div class="col">
            <ul class="list-inline text-center">
                <li class="list-inline-item h4 col-md-auto"><a href="#sample_info">Sample Info</a></li>
                <li class="list-inline-item h4 ">|</li>
                <li class="list-inline-item h4 col-md-auto"><a href="#location_info">Location Info</a></li>
                <li class="list-inline-item h4 ">|</li>
                <li class="list-inline-item h4 col-md-auto"><a href="#physical">Physical</a></li>
                <li class="list-inline-item h4 ">|</li>
                <li class="list-inline-item h4 col-md-auto"><a href="#chemical">Chemical</a></li>
                <li class="list-inline-item h4 ">|</li>
                <li class="list-inline-item h4 col-md-auto"><a href="#archive">Archive</a></li>
                <li class="list-inline-item h4 ">|</li>
                <li class="list-inline-item h4 col-md-auto"><a href="#projects">Projects</a></li>
            </ul>
        </div>
    </div>
    <div id="sample_info" class="row my-4">
        <div class="col">
            <h3 class="mb-4">Sample Info</h3>
            <dl class="row">
                <dt class="col-sm-2">sample_id</dt>
                <dd class="col-sm-10">Sample identification number</dd>

                <dt class="col-sm-2">loc_id</dt>
                <dd class="col-sm-10">Location identification number</dd>

                <dt class="col-sm-2">proj_id</dt>
                <dd class="col-sm-10">Project identfication number</dd>
        
                <dt class="col-sm-2">year</dt>
                <dd class="col-sm-10">Year of sampling</dd>
        
                <dt class="col-sm-2">date</dt>
                <dd class="col-sm-10">Date of sampling</dd>
        
                <dt class="col-sm-2">province</dt>
                <dd class="col-sm-10">Province</dd>
        
                <dt class="col-sm-2">u_depth</dt>
                <dd class="col-sm-10">Upper depth of sample (cm)</dd>
        
                <dt class="col-sm-2">l_depth</dt>
                <dd class="col-sm-10">Lower depth of sample (cm)</dd>
                
                <dt class="col-sm-2">horizon</dt>
                <dd class="col-sm-10">Soil horizon</dd>

                <dt class="col-sm-2">orig_id</dt>
                <dd class="col-sm-10">Original sample identification value</dd>

                <dt class="col-sm-2">notes</dt>
                <dd class="col-sm-10">Sample notes</dd>
            </dl>
        </div>
    </div>
    <div id="location_info" class="row my-4">
        <div class="col">
            <h3 class="mb-4">Location Info</h3>
            <dl class="row">
                <dt class="col-sm-2">loc_id</dt>
                <dd class="col-sm-10">Location identification number</dd>

                <dt class="col-sm-2">lat_dd</dt>
                <dd class="col-sm-10">Latitude (decimal degrees, WGS84)</dd>

                <dt class="col-sm-2">long_dd</dt>
                <dd class="col-sm-10">Longitude (decimal degrees, WGS84)</dd>

                <dt class="col-sm-2">loc_acc</dt>
                <dd class="col-sm-10">Location accuracy (m)</dd>

                <dt class="col-sm-2">map_unit</dt>
                <dd class="col-sm-10">Map unit as designated on soil map of site</dd>

                <dt class="col-sm-2">subgroup</dt>
                <dd class="col-sm-10">Soil classification subgroup</dd>

                <dt class="col-sm-2">series</dt>
                <dd class="col-sm-10">Soil series code</dd>
            </dl>
        </div>
    </div>
    <div id="physical" class="row my-4">
        <div class="col">
            <h3 class="mb-4">Physical</h3>
            <dl class="row">
                <dt class="col-sm-2">sample_id</dt>
                <dd class="col-sm-10">Sample identification number</dd>

                <dt class="col-sm-2">t_gravel</dt>
                <dd class="col-sm-10">Total percent gravel  (0.2 - 7.5 cm)</dd>

                <dt class="col-sm-2">t_clay</dt>
                <dd class="col-sm-10">Total percent clay (< 2 μm)</dd>

                <dt class="col-sm-2">t_silt</dt>
                <dd class="col-sm-10">Total percent silt (0.002 - 0.05 mm)</dd>

                <dt class="col-sm-2">t_sand</dt>
                <dd class="col-sm-10">Total percent sand (0.05 - 2.0 mm)</dd>

                <dt class="col-sm-2">vc_sand</dt>
                <dd class="col-sm-10">Percentage of very coarse sand (1.0 - 2.0 mm)</dd>

                <dt class="col-sm-2">c_sand</dt>
                <dd class="col-sm-10">Percentage of coarse sand (0.5 - 1.0 mm)</dd>

                <dt class="col-sm-2">m_sand</dt>
                <dd class="col-sm-10">Percentage of medium sand (0.25 - 0.5 mm)</dd>

                <dt class="col-sm-2">f_sand</dt>
                <dd class="col-sm-10">Percentage of fine sand (0.10 - 0.25 mm)</dd>

                <dt class="col-sm-2">vf_sand</dt>
                <dd class="col-sm-10">Percentage of very fine sand (0.05 - 0.10 mm)</dd>

                <dt class="col-sm-2">u_depth_bd</dt>
                <dd class="col-sm-10">Upper depth of bulk density measurement (cm)</dd>

                <dt class="col-sm-2">l_depth_bd</dt>
                <dd class="col-sm-10">Lower depth of bulk density measurement (cm)</dd>

                <dt class="col-sm-2">bulkd</dt>
                <dd class="col-sm-10">Bulk density (g/cm³)</dd>

                <dt class="col-sm-2">texture</dt>
                <dd class="col-sm-10">Soil texture</dd>

                <dt class="col-sm-2">field_txt</dt>
                <dd class="col-sm-10">Field Texture</dd>
            </dl>
        </div>
    </div>
    <div id="chemical" class="row my-4">
        <div class="col">
            <h3 class="mb-4">Chemical</h3>
            <dl class="row">
                <dt class="col-sm-2">ph_calcl2</dt>
                <dd class="col-sm-10">pH in CaCl<sub>2</sub> using 1:2 soil:0.01 M CaCl<sub>2</sub> solution ratio as per procedure 84-002 in Sheldrick (1984)</dd>

                <dt class="col-sm-2">ph_h2o</dt>
                <dd class="col-sm-10">pH in H<sub>2</sub>O using 1:1 soil:water ratio as per procedure 84-001 in Sheldrick (1984)</dd>
                
                <dt class="col-sm-2">ttl_c</dt>
                <dd class="col-sm-10">Total percent carbon using LECO induction furnace, as per procedure 84-013 in Sheldrick (1984)</dd>
                
                <dt class="col-sm-2">ttl_n</dt>
                <dd class="col-sm-10">Total nitrogen percent using LECO CHN600 induction furnace as per procedure provided by the LECO CHN600 Manual</dd>

                <dt class="col-sm-2">caco3</dt>
                <dd class="col-sm-10">Percent CaCO<sub>3</sub>, gravimetric method using HCl-FeCl<sub>2</sub> solution as per procedure 84-008 in Sheldrick (1984)</dd>

                <dt class="col-sm-2">org_c</dt>
                <dd class="col-sm-10">Total Organic Carbon %</dd>

                <dt class="col-sm-2">org_c_n</dt>
                <dd class="col-sm-10">Organic Carbon (Non-Calcareous). For non-calcareous samples, same as total carbon; for calcareous samples, by modified Walkley-Black method, as per procedure 84-014 in Sheldrick (1984)</dd>

                <dt class="col-sm-2">tec</dt>
                <dd class="col-sm-10">Total exchangable cations (meq/100g soil)</dd>

                <dt class="col-sm-2">cec</dt>
                <dd class="col-sm-10">Cation exchange capacity (meq/100g soil); pH7 (Ca(OAc)<sub>2</sub> + CaCl<sub>2</sub>) – soils were first saturated with Ca, Ca ions were then replaced by Na ions, Ca ions in solution were determined by atomic absorption as per procedure 84-006 in Sheldrick (1984)</dd>

                <dt class="col-sm-2">al_exch</dt>
                <dd class="col-sm-10">Exchangeable Al (meq/100g); 2M NaCl - extractants determined by atomic absorption as per procedure 84-004 in Sheldrick (1984)</dd>

                <dt class="col-sm-2">ca_exch</dt>
                <dd class="col-sm-10">Exchangable Ca (meq/100g); 2M NaCl - extractants determined by atomic absorption as per procedure 84-004 in Sheldrick (1984)</dd>

                <dt class="col-sm-2">k_exch</dt>
                <dd class="col-sm-10">Exchangable K (meq/100g); 2M NaCl - extractants determined by atomic absorption as per procedure 84-004 in Sheldrick (1984)</dd>

                <dt class="col-sm-2">mg_exch</dt>
                <dd class="col-sm-10">Exchangable Mg (meq/100g); 2M NaCl - extractants determined by atomic absorption as per procedure 84-004 in Sheldrick (1984)</dd>

                <dt class="col-sm-2">na_exch</dt>
                <dd class="col-sm-10">Exchangable Na (meq/100g); 2M NaCl - extractants determined by atomic absorption as per procedure 84-004 in Sheldrick (1984)</dd>

                <dt class="col-sm-2">avail_k</dt>
                <dd class="col-sm-10">Available K (μg/g K in soil); pH7 1M NH<sub>4</sub>OAc extraction – for calcareous or neutral soils, K was deterimined in extractants by atomic absorption as per procedure 84-005 in Sheldrick (1984)</dd>

                <dt class="col-sm-2">avail_pbi</dt>
                <dd class="col-sm-10">Available P (μg/g P in soil); sodium bicarbonate extractable – for calcareous or neutral soils, extractable P determined by using ammonium molybdate solution as per procedure 84-017 in heldrick (1984)</dd>

                <dt class="col-sm-2">avail_pbr</dt>
                <dd class="col-sm-10">Available P (μg/g P in soil); Bray method (0.03 NH<sub>4</sub>F + 0.025 M HCl) – for acid or neutral soils extractable P determined by using ammonium molybdate solution as per procedure 84-017 in Sheldrick (1984)</dd>
            </dl>
        </div>
    </div>
    <div id="archive" class="row my-4">
        <div class="col">
            <h3 class="mb-4">Archive</h3>
            <dl class="row">
                <dt class="col-sm-2">sample_id</dt>
                <dd class="col-sm-10">Sample identification number</dd>

                <dt class="col-sm-2">jar</dt>
                <dd class="col-sm-10">Jar number in archive</dd>

                <dt class="col-sm-2">arch_year</dt>
                <dd class="col-sm-10">Year sample was archived</dd>

                <dt class="col-sm-2">section</dt>
                <dd class="col-sm-10">Section in archive</dd>

                <dt class="col-sm-2">arch_col</dt>
                <dd class="col-sm-10">Shelf column in archive</dd>

                <dt class="col-sm-2">arch_row</dt>
                <dd class="col-sm-10">Shelf row in archive</dd>

                <dt class="col-sm-2">box_id</dt>
                <dd class="col-sm-10">Box identification number in archive</dd>

                <dt class="col-sm-2">weight</dt>
                <dd class="col-sm-10">Weight of sample material (g)</dd>
            </dl>
        </div>
    </div>
    <div id="projects" class="row my-4">
        <div class="col">
            <h3 class="mb-4">Projects</h3>
            <dl class="row">
                <dt class="col-sm-2">project_id</dt>
                <dd class="col-sm-10">Project ID</dd>

                <dt class="col-sm-2">proj_name</dt>
                <dd class="col-sm-10">Project name</dd>
            </dl>
        </div>
    </div>
