<?php
    if (isset($autoFill1['internship_1'])){
        $internship_1 = $autoFill1['internship_1'];
        $internship_1 = explode(",",$internship_1);
    }
    if (isset($autoFill1['internship_2'])){
        $internship_2 = $autoFill1['internship_2'];
        $internship_2 = explode(",",$internship_2);
    }
    if (isset($autoFill1['internship_3'])){
        $internship_3 = $autoFill1['internship_3'];
        $internship_3 = explode(",",$internship_3);
    }

?>
<div class="card">
    <div class="card-body">
        <h3 id="int" title="Click here to fill the Internship Detail" style="color: blue;"><b>Internship Detail</b></h3>
        <!-- form element -->
        <div class="row" id="intern">
            <div class="col s12" id="intern1"><br>
                <h5 style="color: blue;">&nbsp;Internship 1</h5>
                <div class="row">
                    <div class="input-field col s6">
                        <input name="internship1cname" id="internship1cname" type="text" class="validate" value="<?= htmlentities($internship_1[0] ?? '') ?>">
                        <label for="internship1cname">Name of the Industry</label>
                    </div>

                </div>
                <div class="row">
                    <h5>&nbsp;&nbsp;&nbsp;Training Period</h5>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input name="internship1startdate" type="text" class="datepicker" value="<?= htmlentities($internship_1[1].$internship_1[2] ?? '') ?>">
                        <label for="internship1startdate">Starting Date</label>
                    </div>
                    <div class="input-field col s6">
                        <input name="internship1enddate" type="text" class="datepicker" value="<?= htmlentities($internship_1[3].$internship_1[4] ?? '') ?>">
                        <label for="internship1enddate">End Date</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6" id="">
                        <label class="custom-file-upload" id="" for="internship1certificate">
                            <a class="btn blue darken-1"><input style="display: none;" name="internship1certificate" id="internship1certificate" type="file" accept=".pdf, .jpg, .jpeg, .docx"><p id='internship1certificatep' style="color: white;">Upload Certificate</p></a>
                        </label>
                    </div>
                </div><br>
                <div class="row">
                    <div class="input-field col s6">
                        <a class="btn blue darken-1" id='internshipdetailsadd' style="color: white;">Add another Internship Detail</a>
                    </div>
                </div>
                <br>
                <div class="internship2div">
                    <h5 style="color: blue;">&nbsp;Internship 2</h5>
                    <div class="row">
                        <div class="input-field col s6">
                            <input name="internship2cname" id="internship2cname" type="text" class="validate" value="<?= htmlentities($internship_2[0] ?? '') ?>">
                            <label for="internship2cname">Name of the Industry</label>
                        </div>

                    </div>
                    <div class="row">
                        <h5>&nbsp;&nbsp;&nbsp;Training Period</h5>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input name="internship2startdate" type="text" class="datepicker" value="<?= htmlentities($internship_2[1].$internship_2[2] ?? '') ?>">
                            <label for="internship2startdate">Starting Date</label>
                        </div>
                        <div class="input-field col s6">
                            <input name="internship2enddate" type="text" class="datepicker" value="<?= htmlentities($internship_2[3].$internship_2[4] ?? '') ?>">
                            <label for="internship2enddate">End Date</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12" id="">
                            <label class="custom-file-upload" id="" for="internship2certificate">
                            <a class="btn blue darken-1"><input style="display: none;" id="internship2certificate" name="internship2certificate" type="file" accept=".pdf, .jpg, .jpeg, .docx"><p id='internship2certificatep' style="color: white;">Upload Certificate</p></a>
                        </label>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="input-field col s6">
                            <a class="btn blue darken-1" id='internshipdetailsadd1' style="color: white;">Add another Internship Detail</a>
                        </div>
                    </div>
                </div>

                <br>
                <div class="internship3div">
                    <h5 style="color: blue;">&nbsp;Internship 3</h5>
                    <div class="row">
                        <div class="input-field col s6">
                            <input name="internship3cname" id="internship3cname" type="text" class="validate" value="<?= htmlentities($internship_3[0] ?? '') ?>">
                            <label for="internship3cname">Name of the Industry</label>
                        </div>

                    </div>
                    <div class="row">
                        <h5>&nbsp;&nbsp;&nbsp;Training Period</h5>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input name="internship3startdate" type="text" class="datepicker" value="<?= htmlentities($internship_3[1].$internship_3[2] ?? '') ?>">
                            <label for="internship3startdate">Starting Date</label>
                        </div>
                        <div class="input-field col s6">
                            <input name="internship3enddate" type="text" class="datepicker" value="<?= htmlentities($internship_3[3].$internship_3[4] ?? '') ?>">
                            <label for="internship3enddate">End Date</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12" id="">
                            <label class="custom-file-upload" id="" for="internship3certificate">
                            <a class="btn blue darken-1"><input style="display: none;" id="internship3certificate" name="internship3certificate" type="file" accept=".pdf, .jpg, .jpeg, .docx"><p id='internship3certificatep' style="color: white;">Upload Certificate</p></a>
                        </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end form element -->
    </div>
</div>