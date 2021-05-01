<?php
    if (isset($autoFill1['student_name'])){
        $name = $autoFill1['student_name'];
        $name = explode(" ",$name);
    }
?>
<div class="card">
    <div class="card-body">
        <h3 style="color: blue;"><b>Basic Detail</b></h3>
        <div class="row">
            <div class="col s12">
                <div class="row">
                    <div class="input-field col s6">
                        <input name="prn" id="prn" type="text" class="validate" maxlength="10" value="<?= htmlentities($autoFill1['prn'] ?? '') ?>">
                        <label for="prn">PRN</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <select id='salutation' class="btn blue darken-1" name="salutation" style="color: white;">
                            <option value="" disabled selected style="color: white">Salutation</option>
                            <option value="Mr" <?php if($name[0]=="Mr") echo 'selected="selected"'; ?>>Mr.</option>
                            <option value="Ms" <?php if($name[0]=="Ms") echo 'selected="selected"'; ?>>Ms.</option>
                            <option value="Mrs" <?php if($name[0]=="Mrs") echo 'selected="selected"'; ?>>Mrs.</option>
                            <option value="Miss" <?php if($name[0]=="Miss") echo 'selected="selected"'; ?>>Miss.</option>
                        </select>
                    </div>
                    <div class="input-field col s6">
                        <select id='branch' class="btn blue darken-1" name="branch" style="color: white;">
                            <option value="" disabled selected style="color: white">School</option>
                            <option value="SCET" <?php if($autoFill1['student_branch']=="SCET") echo 'selected="selected"'; ?>>SCHOOL OF COMPUTER ENGINEERING</option>
                            <option value="SEE" <?php if($autoFill1['student_branch']=="SEE") echo 'selected="selected"'; ?>>SCHOOL OF ELECTRICAL ENGINEERING</option>
                            <option value="SMCE" <?php if($autoFill1['student_branch']=="SMCE") echo 'selected="selected"'; ?>>SCHOOL OF MECH & CIVIL ENGINEERING</option>
                            <option value="SCE" <?php if($autoFill1['student_branch']=="SCE") echo 'selected="selected"'; ?>>SCHOOL OF CHEMICAL ENGINEERING</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <input id="firstname" name="firstname" type="text" class="" value="<?= htmlentities($name[1] ?? '') ?>">
                        <label for="firstname">First Name</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="lastname" name="lastname" type="text" class="" value="<?= htmlentities($name[2] ?? '') ?>">
                        <label for="lastname">Last Name</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <input id="fathername" name="fathername" type="text" class="" value="<?= htmlentities($autoFill1['father_name'] ?? '') ?>">
                        <label for="fathername">Father Name</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="mothername" name="mothername" type="text" class="" value="<?= htmlentities($autoFill1['mother_name'] ?? '') ?>">
                        <label for="mothername">Mother Name</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <select id='gender' class="btn blue darken-1" name="gender" style="color: white;">
                            <option value="" disabled selected style="color: black">Gender</option>
                            <option value="Male" <?php if($autoFill1['gender']=="Male") echo 'selected="selected"'; ?>>Male</option>
                            <option value="Female" <?php if($autoFill1['gender']=="Female") echo 'selected="selected"'; ?>>Female</option>
                            <option value="Other" <?php if($autoFill1['gender']=="Other") echo 'selected="selected"'; ?>>Other</option>
                        </select>
                    </div>
                    <div class="input-field col s6">
                        <input id="dob" type="text" class="datepicker" name="dob" value="<?= htmlentities($autoFill1['date_of_birth'] ?? '') ?>">
                        <label for="dob">DOB</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12" id="uphoto">
                        <label class="custom-file-upload" id="photo" for="myphoto">
                            <a class="btn blue darken-1"><input style="display: none;" id="myphoto" type="file" accept=".png, .jpg, .jpeg" name="userPhoto"><p id='myfilephoto' style="color: white;">Upload Photo</p></a>
                        </label>
                    </div>
                </div><br><br><br>
                <img id="image_upload_preview" src="" alt="your image" width="150" height="150" />
                <div style="color: red;">
                <!-- <?php echo $photoError;?> -->
                </div>
            </div>
        </div>
    </div>
</div>