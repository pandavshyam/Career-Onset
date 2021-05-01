<?php
    if (isset($autoFill1['present_address'])){
        $present_address = $autoFill1['present_address'];
        $present_address = explode(",",$present_address);
    }
    if (isset($autoFill1['permanent_address'])){
        $permanent_address = $autoFill1['permanent_address'];
        $permanent_address = explode(",",$permanent_address);
    }
    if (isset($autoFill1['mobile_number'])){
        $mobile_number = $autoFill1['mobile_number'];
        $mobile_number = explode(",",$mobile_number);
    }
    if (isset($autoFill1['email'])){
        $email = $autoFill1['email'];
        $email = explode(",",$email);
    }

?>
<div class="card">
    <div class="card-body">
        <h3 title="Click Here to fill the Communication Details" id="comm" style="color: blue;"><b>Communication Detail</b></h3>
        <div class="row" id="commu"><br>
            <div class="col s12">
                <br>
                <h5 style="color: blue;">Present Address</h5>
                <div class="row">
                    <div class="input-field col s6">
                        <input name="presentaddress" id="presentaddress" type="text" class="validate" value="<?= htmlentities($present_address[0] ?? '') ?>">
                        <label for="presentaddress">Address Line 1</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <input name="pcountry" id="pcountry" type="text" class="validate" value="<?= htmlentities($present_address[3] ?? '') ?>">
                        <label for="pcountry">Country</label>

                    </div>
                    <div class="input-field col s6">
                        <input name="pstate" id="pstate" type="text" class="validate" value="<?= htmlentities($present_address[2] ?? '') ?>">
                        <label for="pstate">State</label>
                    </div>
                    <div class="input-field col s6">
                        <input name="pcity" id="pcity" type="text" class="validate" value="<?= htmlentities($present_address[1] ?? '') ?>">
                        <label for="pcity">City</label>
                    </div>
                </div>

                <h5 style="color: blue;">Permanent Address</h5>
                <div class="row">
                    <div class="input-field col s6">
                        <input name="permanentaddress" id="permanentaddress" type="text" class="validate" aria-required="true" value="<?= htmlentities($permanent_address[0] ?? '') ?>">
                        <label for="permanentaddress">Address Line 1</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <input name="ppcountry" id="ppcountry" type="text" class="validate" aria-required="true" value="<?= htmlentities($permanent_address[3] ?? '') ?>">
                        <label for="ppcountry">Country</label>
                    </div>
                    <div class="input-field col s6">
                        <input name="ppstate" id="ppstate" type="text" class="validate" aria-required="true" value="<?= htmlentities($permanent_address[2] ?? '') ?>">
                        <label for="ppstate">State</label>
                    </div>
                    <div class="input-field col s6">
                        <input name="ppcity" id="ppcity" type="text" class="validate" aria-required="true" value="<?= htmlentities($permanent_address[1] ?? '') ?>">
                        <label for="ppcity">City</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <input name="mobilenumber1" id="mobilenumber1" type="text" class="validate" maxlength="10" value="<?= htmlentities($mobile_number[0] ?? '') ?>">
                        <label for="mobilenumber1">Mobile Number 1</label>
                    </div>
                    <div class="input-field col s6">
                        <input name="mobilenumber2" id="mobilenumber2" type="text" class="validate" maxlength="10" value="<?= htmlentities($mobile_number[1] ?? '') ?>">
                        <label for="mobilenumber2">Mobile Number 2</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <input name="pemail" id="pemail" type="email" class="validate" value="<?= htmlentities($email[0] ?? '') ?>">
                        <label for="pemail">Personal Email</label>
                    </div>
                    <div class="input-field col s6">
                        <input name="cemail" id="cemail" type="email" class="validate" value="<?= htmlentities($email[1] ?? '') ?>">
                        <label for="cemail">College Email</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>