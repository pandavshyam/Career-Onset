<div class="card">
    <div class="card-body">
        <h3 id="cer" title="Click Here to fill the Certificate Details" style="color: blue;"><b>Certificate</b></h3>
        <div class="row" class="certi" id="certi">
            <div class="col s12" id="adddiv">
                <div id="addNewCertificateToThis">
                    <div class="row">
                        <div class="input-field col s6">
                            <input name="certificate[]" id="certificate0" type="text" class="validate">
                            <label for="certificate0">Certificate About..e.g.Sports,Course</label>
                        </div>
                    </div>

                    <div class="file-field input-field">
                        <div class="btn-small blue">
                            <span>Upload File</span>
                            <input type="file" id="certificate0file" name="certificatefile0" accept=".pdf,.jpg,.jpeg,.docx,.doc,.png">
                        </div>

                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="No file selected" />
                        </div>
                    </div>
                </div>

                <a id="" value="add" onclick="addCertificate();" class="btn-floating btn-small waves-effect waves-light blue"><i class="material-icons">add</i></a>
            </div>
        </div>
    </div>
</div>