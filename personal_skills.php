<?php
    if (isset($autoFill1['activities'])){
        $activities = explode(",",$autoFill1['activities']);
    }
?>
<div class="card">
    <div class="card-body">
        <h3 id="per" title="Click here to Fill the Personal Detail" style="color: blue;"><b>Personal Skills</b></h3>
        <!-- form element -->
        <div class="row" id="skill">
            <div class="col s12">
                <div class="row">
                    <h5 style="color: blue;">&nbsp;&nbsp;&nbsp;Extra Curricular</h5>
                </div>
                <div class="act" id="act">
                    <div class="row">

                        <div class="input-field col s6">
                            <input name="activities[]" id="activities" type="text" class="validate" value="<?= htmlentities($activities[0] ?? '') ?>">
                            <label for="activities">Activities</label>
                        </div>
                        <div class="input-field col s6">
                            <a onclick="addActivity()" class="btn-floating btn-small waves-effect waves-light blue"><i class="material-icons">add</i></a>

                        </div>
                        <?php
                            if (isset($autoFill1['activities'])){
                    
                                for ($i = 1; $i < count($activities); $i++){
                                    ?>
                                    
                                    <div class="row">
                                    <div class="input-field col s12">
                                        <input name="activities[]" id="activities" type="text" class="validate" value="<?php echo $activities[$i];?>">
                                        <label for="activities">Activities</label>
                                    </div>
                                    
                                    </div>
                                    
                                    <?php
                                }
                            }
                        ?>
                    </div>

                </div>
                <div class="hobb" id="hobb">
                    <div class="row">
                        <div class="input-field col s12">
                            <input name="hobbies[]" id="hobbies" type="text" class="validate">
                            <label for="hobbies">Hobbies</label>

                        </div>
                        <div class="input-field col s12">
                            <a onclick="addHobbies()" class="btn-floating btn-small waves-effect waves-light blue"><i class="material-icons">add</i></a>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <h5 style="color: blue;">&nbsp;&nbsp;&nbsp;Languages Known</h5>
                </div>
                <div class="row">
                    <table class="responsive-table">

                        <tbody>
                            <tr>
                                <td><input type="text" id="language1" name="language1[]" placeholder="Language"></td>
                                <td><label>
                                    <input type="checkbox" class="" checked="checked" id="language1read" value="Read" name="language1[]"/>
                                    <span>Read</span>
                                </label>
                                </td>
                                <td>
                                    <label>
                                    <input type="checkbox" class="" id="language1write" value="Write" name="language1[]"/>
                                    <span>Write</span>
                                </label>
                                </td>
                                <td>
                                    <label>
                                    <input type="checkbox" class="" id="language1speak" value="Speak" name="language1[]"/>
                                    <span>Speak</span>
                                </label>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="text" id="language2" name="language2[]" placeholder="Language"></td>
                                <td><label>
                                    <input type="checkbox" class="" checked="checked" id="language2read" value="Read" name="language2[]"/>
                                    <span>Read</span>
                                </label>
                                </td>
                                <td>
                                    <label>
                                    <input type="checkbox" class="" id="language2write" value="Write" name="language2[]"/>
                                    <span>Write</span>
                                </label>
                                </td>
                                <td>
                                    <label>
                                    <input type="checkbox" class="" id="language2speak" value="Speak" name="language2[]"/>
                                    <span>Speak</span>
                                </label>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="text" id="language3" name="language3[]" placeholder="Language"></td>
                                <td><label>
                                    <input type="checkbox" class="" checked="checked" id="language3read" value="Read" name="language3[]"/>
                                    <span>Read</span>
                                </label>
                                </td>
                                <td>
                                    <label>
                                    <input type="checkbox" class="" id="language3write" value="Write" name="language3[]"/>
                                    <span>Write</span>
                                </label>
                                </td>
                                <td>
                                    <label>
                                    <input type="checkbox" class="" id="language3speak" value="Speak" name="language3[]"/>
                                    <span>Speak</span>
                                </label>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="text" id="language4" name="language4[]" placeholder="Language"></td>
                                <td><label>
                                    <input type="checkbox" class="" checked="checked" id="language4read" value="Read" name="language4[]"/>
                                    <span>Read</span>
                                </label>
                                </td>
                                <td>
                                    <label>
                                    <input type="checkbox" class="" id="language4write" value="Write" name="language4[]"/>
                                    <span>Write</span>
                                </label>
                                </td>
                                <td>
                                    <label>
                                    <input type="checkbox" class="" id="language4speak" value="Speak" name="language4[]"/>
                                    <span>Speak</span>
                                </label>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end form element -->
    </div>
</div>