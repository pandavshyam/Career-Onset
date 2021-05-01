<?php
    if (isset($autoFill1['SSC'])){
        $SSC = $autoFill1['SSC'];
        $SSC = explode(",",$SSC);
    }
    if (isset($autoFill1['HSC'])){
        $HSC = $autoFill1['HSC'];
        $HSC = explode(",",$HSC);
    }
    if (isset($autoFill1['diploma'])){
        $diploma = $autoFill1['diploma'];
        $diploma = explode(",",$diploma);
    }
    if (isset($autoFill1['engg_1st_sem'])){
        $engg_1st_sem = $autoFill1['engg_1st_sem'];
        $engg_1st_sem = explode(",",$engg_1st_sem);
    }
    if (isset($autoFill1['engg_2nd_sem'])){
        $engg_2nd_sem = $autoFill1['engg_2nd_sem'];
        $engg_2nd_sem = explode(",",$engg_2nd_sem);
    }
    if (isset($autoFill1['engg_3rd_sem'])){
        $engg_3rd_sem = $autoFill1['engg_3rd_sem'];
        $engg_3rd_sem = explode(",",$engg_3rd_sem);
    }
    if (isset($autoFill1['engg_4th_sem'])){
        $engg_4th_sem = $autoFill1['engg_4th_sem'];
        $engg_4th_sem = explode(",",$engg_4th_sem);
    }
    if (isset($autoFill1['engg_5th_sem'])){
        $engg_5th_sem = $autoFill1['engg_5th_sem'];
        $engg_5th_sem = explode(",",$engg_5th_sem);
    }
    if (isset($autoFill1['engg_6th_sem'])){
        $engg_6th_sem = $autoFill1['engg_6th_sem'];
        $engg_6th_sem = explode(",",$engg_6th_sem);
    }
    if (isset($autoFill1['engg_7th_sem'])){
        $engg_7th_sem = $autoFill1['engg_7th_sem'];
        $engg_7th_sem = explode(",",$engg_7th_sem);
    }
    if (isset($autoFill1['engg_8th_sem'])){
        $engg_8th_sem = $autoFill1['engg_8th_sem'];
        $engg_8th_sem = explode(",",$engg_8th_sem);
    }
?>
<div class="card">
    <div class="card-body">
        <h3 id="eduu" title="Click here to Fill the Educational Detail" style="color: blue;"><b>Educational Detail</b></h3>
        <div class="row" id="edu">
            <div class="col s12">
                <h5 style="color: blue;">&nbsp;Details of Examination Passed</h5>
                <div class="row">
                    <table class="responsive-table">
                        <thead>
                            <tr class="heading">
                                <th scope="col" style="text-align: center;">Examination</th>
                                <th scope="col" style="text-align: center;">Institution</th>
                                <th scope="col" style="text-align: center;">Year of Commencement</th>
                                <th scope="col" style="text-align: center;">Year of Passing</th>
                                <th scope="col" style="text-align: center;">Class/Division</th>
                                <th scope="col" style="text-align: center;">%Marks</th>
                            </tr>

                        </thead>
                        <tbody>
                            <tr class="">
                                <th style="text-align: center;" scope="col">S.S.C.(X)</th>
                                <td><input type="text" id="" name="institutionssc" placeholder="Institution" value="<?= htmlentities($SSC[0] ?? '') ?>"></td>
                                <td><input type="text" id="" name="yocssc" placeholder="Year" maxlength="4" value="<?= htmlentities($SSC[1] ?? '') ?>"></td>
                                <td><input type="text" id="" name="yopssc" placeholder="Year" maxlength="4" value="<?= htmlentities($SSC[2] ?? '') ?>"></td>
                                <td><input type="text" id="" name="classssc" placeholder="Class/Division" value="<?= htmlentities($SSC[3] ?? '') ?>"></td>
                                <td><input type="text" id="" name="perssc" placeholder="%Marks" maxlength="8" value="<?= htmlentities($SSC[4] ?? '') ?>"></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;"><b>H.S.C.(XII)</b></td>
                                <td><input type="text" id="" name="institutionhsc" placeholder="Institution" value="<?= htmlentities($HSC[0] ?? '') ?>"></td>
                                <td><input type="text" id="" name="yochsc" placeholder="Year" maxlength="4" value="<?= htmlentities($HSC[1] ?? '') ?>"></td>
                                <td><input type="text" id="" name="yophsc" placeholder="Year" maxlength="4" value="<?= htmlentities($HSC[2] ?? '') ?>"></td>
                                <td><input type="text" id="" name="classhsc" placeholder="Class/Division" value="<?= htmlentities($HSC[3] ?? '') ?>"></td>
                                <td><input type="text" id="" name="perhsc" placeholder="%Marks" maxlength="8" value="<?= htmlentities($HSC[4] ?? '') ?>"></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;"><b>Diploma</b></td>
                                <td><input type="text" id="" name="institutiondip" placeholder="Institution" value="<?= htmlentities($diploma[0] ?? '') ?>"></td>
                                <td><input type="text" id="" name="yocdip" placeholder="Year" maxlength="4" value="<?= htmlentities($diploma[1] ?? '') ?>"></td>
                                <td><input type="text" id="" name="yopdip" placeholder="Year" maxlength="4" value="<?= htmlentities($diploma[2] ?? '') ?>"></td>
                                <td><input type="text" id="" name="classdip" placeholder="Class/Division" value="<?= htmlentities($diploma[3] ?? '') ?>"></td>
                                <td><input type="text" id="" name="perdip" placeholder="%Marks" maxlength="8" value="<?= htmlentities($diploma[4] ?? '') ?>"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <h4 style="color: blue;">&nbsp;&nbsp;&nbsp;Details of Engineering</h4>
                    <table class="responsive-table">
                        <thead>
                            <tr class="heading">
                                <th colspan="2" scope="col" style="text-align: center;">Year</th>
                                <th scope="col" style="text-align: center;">Institution</th>
                                <th scope="col" style="text-align: center;">Year of Commencement</th>
                                <th scope="col" style="text-align: center;">Year of Passing</th>
                                <th scope="col" style="text-align: center;">Class/Division</th>
                                <th scope="col" style="text-align: center;">%Marks</th>
                            </tr>

                        </thead>
                        <tbody>
                            <tr class="">
                                <td rowspan="2"><b>FY</b></td>
                                <td>I Semester</td>
                                <td><input type="text" id="" name="institutionfysem1" placeholder="Institution" value="<?= htmlentities($engg_1st_sem[0] ?? '') ?>"></td>
                                <td><input type="text" id="" name="yocfysem1" placeholder="Year" maxlength="4" value="<?= htmlentities($engg_1st_sem[1] ?? '') ?>"></td>
                                <td><input type="text" id="" name="yopfysem1" placeholder="Year" maxlength="4" value="<?= htmlentities($engg_1st_sem[2] ?? '') ?>"></td>
                                <td><input type="text" id="" name="classfysem1" placeholder="Class/Division" value="<?= htmlentities($engg_1st_sem[3] ?? '') ?>"></td>
                                <td><input type="text" id="" name="perfysem1" placeholder="%Marks" maxlength="8" value="<?= htmlentities($engg_1st_sem[4] ?? '') ?>"></td>
                            </tr>
                            <tr class="">

                                <td>II Semester</td>
                                <td><input type="text" id="" name="institutionfysem2" placeholder="Institution" value="<?= htmlentities($engg_2nd_sem[0] ?? '') ?>"></td>
                                <td><input type="text" id="" name="yocfysem2" placeholder="Year" maxlength="4" value="<?= htmlentities($engg_2nd_sem[1] ?? '') ?>"></td>
                                <td><input type="text" id="" name="yopfysem2" placeholder="Year" maxlength="4" value="<?= htmlentities($engg_2nd_sem[2] ?? '') ?>"></td>
                                <td><input type="text" id="" name="classfysem2" placeholder="Class/Division" value="<?= htmlentities($engg_2nd_sem[3] ?? '') ?>"></td>
                                <td><input type="text" id="" name="perfysem2" placeholder="%Marks" maxlength="8" value="<?= htmlentities($engg_2nd_sem[4] ?? '') ?>"></td>
                            </tr>

                            <tr class="">
                                <td rowspan="2"><b>SY</b></td>
                                <td>I Semester</td>
                                <td><input type="text" id="" name="institutionsysem1" placeholder="Institution" value="<?= htmlentities($engg_3rd_sem[0] ?? '') ?>"></td>
                                <td><input type="text" id="" name="yocsysem1" placeholder="Year" maxlength="4" value="<?= htmlentities($engg_3rd_sem[1] ?? '') ?>"></td>
                                <td><input type="text" id="" name="yopsysem1" placeholder="Year" maxlength="4" value="<?= htmlentities($engg_3rd_sem[2] ?? '') ?>"></td>
                                <td><input type="text" id="" name="classsysem1" placeholder="Class/Division" value="<?= htmlentities($engg_3rd_sem[3] ?? '') ?>"></td>
                                <td><input type="text" id="" name="persysem1" placeholder="%Marks" maxlength="8" value="<?= htmlentities($engg_3rd_sem[4] ?? '') ?>"></td>
                            </tr>
                            <tr class="">

                                <td>II Semester</td>
                                <td><input type="text" id="" name="institutionsysem2" placeholder="Institution" value="<?= htmlentities($engg_4th_sem[0] ?? '') ?>"></td>
                                <td><input type="text" id="" name="yocsysem2" placeholder="Year" maxlength="4" value="<?= htmlentities($engg_4th_sem[1] ?? '') ?>"></td>
                                <td><input type="text" id="" name="yopsysem2" placeholder="Year" maxlength="4" value="<?= htmlentities($engg_4th_sem[2] ?? '') ?>"></td>
                                <td><input type="text" id="" name="classsysem2" placeholder="Class/Division" value="<?= htmlentities($engg_4th_sem[3] ?? '') ?>"></td>
                                <td><input type="text" id="" name="persysem2" placeholder="%Marks" maxlength="8" value="<?= htmlentities($engg_4th_sem[4] ?? '') ?>"></td>
                            </tr>

                            <tr class="">
                                <td rowspan="2"><b>TY</b></td>
                                <td>I Semester</td>
                                <td><input type="text" id="" name="institutiontysem1" placeholder="Institution" value="<?= htmlentities($engg_5th_sem[0] ?? '') ?>"></td>
                                <td><input type="text" id="" name="yoctysem1" placeholder="Year" maxlength="4" value="<?= htmlentities($engg_5th_sem[1] ?? '') ?>"></td>
                                <td><input type="text" id="" name="yoptysem1" placeholder="Year" maxlength="4" value="<?= htmlentities($engg_5th_sem[2] ?? '') ?>"></td>
                                <td><input type="text" id="" name="classtysem1" placeholder="Class/Division" value="<?= htmlentities($engg_5th_sem[3] ?? '') ?>"></td>
                                <td><input type="text" id="" name="pertysem1" placeholder="%Marks" maxlength="8" value="<?= htmlentities($engg_5th_sem[4] ?? '') ?>"></td>
                            </tr>
                            <tr class="">

                                <td>II Semester</td>
                                <td><input type="text" id="" name="institutiontysem2" placeholder="Institution" value="<?= htmlentities($engg_6th_sem[0] ?? '') ?>"></td>
                                <td><input type="text" id="" name="yoctysem2" placeholder="Year" maxlength="4" value="<?= htmlentities($engg_6th_sem[1] ?? '') ?>"></td>
                                <td><input type="text" id="" name="yoptysem2" placeholder="Year" maxlength="4" value="<?= htmlentities($engg_6th_sem[2] ?? '') ?>"></td>
                                <td><input type="text" id="" name="classtysem2" placeholder="Class/Division" value="<?= htmlentities($engg_6th_sem[3] ?? '') ?>"></td>
                                <td><input type="text" id="" name="pertysem2" placeholder="%Marks" maxlength="8" value="<?= htmlentities($engg_6th_sem[4] ?? '') ?>"></td>
                            </tr>

                            <tr class="">
                                <td rowspan="2"><b>B.Tech</b></td>
                                <td>I Semester</td>
                                <td><input type="text" id="" name="institutionfinalsem1" placeholder="Institution" value="<?= htmlentities($engg_7th_sem[0] ?? '') ?>"></td>
                                <td><input type="text" id="" name="yocfinalsem1" placeholder="Year" maxlength="4" value="<?= htmlentities($engg_7th_sem[1] ?? '') ?>"></td>
                                <td><input type="text" id="" name="yopfinalsem1" placeholder="Year" maxlength="4" value="<?= htmlentities($engg_7th_sem[2] ?? '') ?>"></td>
                                <td><input type="text" id="" name="classfinalsem1" placeholder="Class/Division" value="<?= htmlentities($engg_7th_sem[3] ?? '') ?>"></td>
                                <td><input type="text" id="" name="perfinalsem1" placeholder="%Marks" maxlength="8" value="<?= htmlentities($engg_7th_sem[4] ?? '') ?>"></td>
                            </tr>
                            <tr class="">

                                <td>II Semester</td>
                                <td><input type="text" id="" name="institutionfinalsem2" placeholder="Institution" value="<?= htmlentities($engg_8th_sem[0] ?? '') ?>"></td>
                                <td><input type="text" id="" name="yocfinalsem2" placeholder="Year" maxlength="4" value="<?= htmlentities($engg_8th_sem[1] ?? '') ?>"></td>
                                <td><input type="text" id="" name="yopfinalsem2" placeholder="Year" maxlength="4" value="<?= htmlentities($engg_8th_sem[2] ?? '') ?>"></td>
                                <td><input type="text" id="" name="classfinalsem2" placeholder="Class/Division" value="<?= htmlentities($engg_8th_sem[3] ?? '') ?>"></td>
                                <td><input type="text" id="" name="perfinalsem2" placeholder="%Marks" maxlength="8" value="<?= htmlentities($engg_8th_sem[4] ?? '') ?>"></td>
                            </tr><br>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <h4 style="color: blue;">&nbsp;&nbsp;&nbsp;No of Backlogs</h4>
                </div>
                <div class="row">
                    <div class="input-field col s2">
                        <select id='noOfBacklog' class="btn blue darken-1" name="noOfBacklog" style="color: white;">
                            <option value="" disabled selected style="color: black">No of Backlog</option>
                            <option value="0" <?php if($autoFill1['backlog']=="0") echo 'selected="selected"'; ?>>0</option>
                            <option value="1" <?php if($autoFill1['backlog']=="1") echo 'selected="selected"'; ?>>1</option>
                            <option value="2" <?php if($autoFill1['backlog']=="2") echo 'selected="selected"'; ?>>2</option>
                            <option value="3" <?php if($autoFill1['backlog']=="3") echo 'selected="selected"'; ?>>3</option>
                            <option value="4" <?php if($autoFill1['backlog']=="4") echo 'selected="selected"'; ?>>4</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>