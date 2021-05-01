<?php
    if(isset($_COOKIE['sid'])){
        require 'API/db.php';

        $sql = "select sid,type from session where sid = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s",$_COOKIE['sid']);
        if ($stmt->execute()){
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            if ($row['type'] == "Teacher"){
                
?>
<?php
    session_start();
    // require_once 'API/db.php';
    $company_name = $_POST['company_name'];
    // $_SESSION['company_name'] = $company_name;
    $company_description = $_POST['company_description'];
    $photoError = "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Created Form</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">


    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <!-- <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" /> -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
</head>

<body>
<section style="margin-top: 50px;" id="contact">
    <div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
    <form method="POST" action="insert_into_database.php" enctype="multipart/form-data">
        <input type="text" name="company_name" id="" placeholder="Enter Company Name" readonly="true" value="<?php echo $company_name;?>">
        <input type="text" name="company_description" id="" placeholder="Company Description..." readonly="true" value="<?php echo $company_description;?>">

        <input type="file" name="company_details_file" id="company_file">

        <?php if (isset($_POST['basicDetails'])) 
            {
                $_SESSION['basicDetails'] = true;
                include 'basic_details.php';
            }
            if (isset($_POST['communicationDetails'])) 
            {
                $_SESSION['communicationDetails'] = true;
                include 'communication_details.php';
            } 
            if (isset($_POST['educationalDetails'])) 
            {
                $_SESSION['educationalDetails'] = true;
                include 'education_detail.php';
            }
            if (isset($_POST['internshipDetail'])) 
            {
                $_SESSION['internshipDetail'] = true;
                include 'internship_detail.php';
            }
            if (isset($_POST['personalSkill'])) 
            {
                $_SESSION['personalSkill'] = true;
                include 'personal_skills.php';
            }
            if (isset($_POST['projectDetail'])) 
            {
                $_SESSION['projectDetail'] = true;
                include 'projects_detail.php';
            }
            if (isset($_POST['awardsAndAchievment'])) 
            {
                $_SESSION['awardsAndAchievment'] = true;
                include 'award_achievement.php';
            }
            if (isset($_POST['certificate'])) 
            {
                $_SESSION['certificate'] = true;
                include 'certificate.php';
            }
        ?>

        <button type="submit" class="btn btn-success" name="submit">Confirm this form</button>
    </form>
    </div>
    </div>
    </div>
</section>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
ctr11 = 0;

function addCertificate() {
    ctr11 += 1;

    var div = document.createElement("div");
    div.innerHTML = '<div class="row">\n' +
        '<div class="input-field col s6">\n' +
        '<input name="certificate[]" id="certificate' + ctr11 + '" type="text" class="validate">\n' +
        '<label for="certificate' + ctr11 + '">Certificate About..e.g.Sports,Course</label>\n' +
        '</div>\n' +
        '</div>\n' +

        '<div class="file-field input-field">\n' +
        '<div class="btn-small blue">\n' +
        '<span>Upload File</span>\n' +
        '<input type="file" id="certificate' + ctr11 + 'file" name="certificatefile' + ctr11 + '" accept=".pdf,.jpg,.jpeg,.docx,.doc,.png">\n' +
        '</div>\n' +

        '<div class="file-path-wrapper">\n' +
        '<input class="file-path validate" type="text" placeholder="No file selected" />\n' +
        '</div>\n' +
        '</div>\n';
    b = document.getElementById("addNewCertificateToThis");
    b.appendChild(div);

}

var ctr = ctr1 = ctr2 = ctr3 = ctr4 = ctr5 = ctr6 = ctr7 = ctr8 = ctr9 = ctr10 = 0;
$("#image_upload_preview").hide();
$(".internship2div").hide();
$(".internship3div").hide();
myimg = $("#image_upload_preview").val();

$("#internshipdetailsadd").click(function() {
    $(".internship2div").fadeIn(300);
});
$("#internshipdetailsadd1").click(function() {
    $(".internship3div").fadeIn(300);
});

$('#myphoto').change(function() {


    var f = $('#myphoto').val().split('.')
    var x = f[1]
    if (x == 'jpeg' || x == 'png' || x == 'jpg') {
        $('#myfilephoto').replaceWith($('#myphoto').val())

        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#image_upload_preview').attr('src', e.target.result);

            };

            reader.readAsDataURL(this.files[0]);
        }

        $("#image_upload_preview").slideDown("slow");
    } else {
        alert('Invalid File \n Only IMAGE accepted')
    }
});

function enggCollegeScholar() {
    ctr10 = ctr10 + 1;

    var div = document.createElement("div");
    div.innerHTML = '<div class="pgrid">\n' +
        '<div class="itm1">\n' +
        '<input type="text" id="enggCollegeScholar' + ctr10 + '" name="enggCollegeScholar[]" placeholder="Another Engg College Scholarship">\n' +
        ' </div>\n' +
        ' </div>\n';
    b = document.getElementById("enggCollegeScholar");
    b.appendChild(div);
};

function jrCollegeScholar() {
    ctr9 = ctr9 + 1;

    var div = document.createElement("div");
    div.innerHTML = '<div class="pgrid">\n' +
        '<div class="itm1">\n' +
        '<input type="text" id="jrCollegeScholar' + ctr9 + '" name="jrCollegeScholar[]" placeholder="Another Jr College Scholarship">\n' +
        ' </div>\n' +
        ' </div>\n';
    b = document.getElementById("jrCollegeScholar");
    b.appendChild(div);
};

function schoolScholar() {
    ctr8 = ctr8 + 1;

    var div = document.createElement("div");
    div.innerHTML = '<div class="pgrid">\n' +
        '<div class="itm1">\n' +
        '<input type="text" id="schoolScholar' + ctr8 + '" name="schoolScholar[]" placeholder="Another School Scholarship">\n' +
        ' </div>\n' +
        ' </div>\n';
    b = document.getElementById("schoolScholar");
    b.appendChild(div);
};

function enggCollegePrize() {
    ctr7 = ctr7 + 1;

    var div = document.createElement("div");
    div.innerHTML = '<div class="pgrid">\n' +
        '<div class="itm1">\n' +
        '<input type="text" id="enggCollegePrize' + ctr7 + '" name="enggCollegePrize[]" placeholder="Another Engg College Prize">\n' +
        ' </div>\n' +
        ' </div>\n';
    b = document.getElementById("enggCollegePrize");
    b.appendChild(div);
};

function jrCollegePrize() {
    ctr6 = ctr6 + 1;

    var div = document.createElement("div");
    div.innerHTML = '<div class="pgrid">\n' +
        '<div class="itm1">\n' +
        '<input type="text" id="jrCollegePrize' + ctr6 + '" name="jrCollegePrize[]" placeholder="Another Jr College Prize">\n' +
        ' </div>\n' +
        ' </div>\n';
    b = document.getElementById("jrCollegePrize");
    b.appendChild(div);
};

function schoolPrize() {
    ctr5 = ctr5 + 1;

    var div = document.createElement("div");
    div.innerHTML = '<div class="pgrid">\n' +
        '<div class="itm1">\n' +
        '<input type="text" id="schoolPrize' + ctr5 + '" name="schoolPrize[]" placeholder="Another School Prize">\n' +
        ' </div>\n' +
        ' </div>\n';
    b = document.getElementById("schoolPrize");
    b.appendChild(div);
};

function enggcollegeAward() {
    ctr4 = ctr4 + 1;

    var div = document.createElement("div");
    div.innerHTML = '<div class="pgrid">\n' +
        '<div class="itm1">\n' +
        '<input type="text" id="enggcollegeAward' + ctr4 + '" name="enggcollegeAward[]" placeholder="Another Engg College Award">\n' +
        ' </div>\n' +
        ' </div>\n';
    b = document.getElementById("engg");
    b.appendChild(div);
};

function jrcollegeAward() {
    ctr3 = ctr3 + 1;

    var div = document.createElement("div");
    div.innerHTML = '<div class="pgrid">\n' +
        '<div class="itm1">\n' +
        '<input type="text" id="jrcollegeAward' + ctr3 + '" name="jrcollegeAward[]" placeholder="Another Jr College Award">\n' +
        ' </div>\n' +
        ' </div>\n';
    b = document.getElementById("jrcerg");
    b.appendChild(div);
}

function addHobbies() {
    ctr1 = ctr1 + 1;
    var div = document.createElement("div");
    div.innerHTML = '<div class="row">' +
        '<div class="input-field col s12">' +
        '<input name="hobbies[]" id="hobbies' + ctr1 + '" type="text" class="validate">' +
        '<label for="hobbies' + ctr1 + '">Hobbies</label>' +

        '</div>' +
        '<div class="input-field col s12">' +

        '</div>' +
        '</div>';
    b = document.getElementById("hobb");

    b.appendChild(div);
}

function schoolAward() {
    ctr2 = ctr2 + 1;
    var div = document.createElement("div");
    div.innerHTML = '<div style="margin-left: 20px;">' +
        '<div class="itm1">' +
        '<input type="text" placeholder="Another School Award" name="schoolAward[]" id="schoolAward' + ctr2 + '">\n' +
        ' </div>\n' +
        '</div>';
    b = document.getElementById("schollg");
    b.appendChild(div);
}

function addActivity() {
    ctr = ctr + 1;
    var div = document.createElement("div");
    div.innerHTML = '<div class="row">\n' +
        '<div class="input-field col s12">\n' +
        '<input name="activities[]" id="activities' + ctr + '" type="text" class="validate">\n' +
        '<label for="activities' + ctr + '">Activities</label>\n' +

        '</div>\n' +
        '<div class="input-field col s12">\n' +
        '</div>\n' +
        '</div>';
    b = document.getElementById("act");

    b.appendChild(div);
}


$('#myphoto').change(function() {
    var f = $('#myphoto').val().split('.')
    var x = f[1]
    if (x == 'png' || x == 'jpeg' || x == 'jpg') {
        $('#myfilephoto').replaceWith($('#myphoto').val())

    } else {
        alert('Invalid File \n Only PNG, JPEG, JPG accepted')
    }

});

$('#internship1certificate').change(function() {
    var f = $('#internship1certificate').val().split('.')
    var x = f[1]
    if (x == 'pdf' || x == 'jpeg' || x == 'jpg' || x == 'docx') {
        $('#internship1certificatep').replaceWith($('#internship1certificate').val())

    } else {
        alert('Invalid File \n Only PDF, JPEG, JPG, DOCX accepted')
    }

});

$('#internship2certificate').change(function() {
    var f = $('#internship1certificate').val().split('.')
    var x = f[1]
    if (x == 'pdf' || x == 'jpeg' || x == 'jpg' || x == 'docx') {
        $('#internship2certificatep').replaceWith($('#internship2certificate').val())

    } else {
        alert('Invalid File \n Only PDF, JPEG, JPG, DOCX accepted')
    }

});

$('#internship3certificate').change(function() {
    var f = $('#internship3certificate').val().split('.')
    var x = f[1]
    if (x == 'pdf' || x == 'jpeg' || x == 'jpg' || x == 'docx') {
        $('#internship3certificatep').replaceWith($('#internship3certificate').val())

    } else {
        alert('Invalid File \n Only PDF, JPEG, JPG, DOCX accepted')
    }

});

$(document).ready(function() {
    $('.datepicker').datepicker({
    //dateFormat:"dd/mm/yy",
    yearRange: [1919, 2019],
    changeMonth: true,

    //changeYear:true

    });
    $('#certi').hide();
    $('#Achivement').hide();
    $('#project').hide();
    $('#skill').hide();
    $('#intern').hide();
    $('#edu').hide();
    $('#commu').hide();


    $('#comm').click(function() {
        $('#commu').toggle(300);
    });

    $('#eduu').click(function() {
        $('#edu').toggle(300);
    });

    $('#int').click(function() {
        $('#intern').toggle(300);
    });
    $('#per').click(function() {
        $('#skill').toggle(300);
    });

    $('#pro').click(function() {
        $('#project').toggle(300);
    });

    $('#award').click(function() {
        $('#Achivement').toggle(300);
    });

    $('#cer').click(function() {
        $('#certi').toggle(300);
    });
    // Prevent user to submit form on hit enter
    $(window).keydown(function(event){
            if(event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        });
});
</script>
</body>

</html>

<?php
            }
            else
            {
                header("refresh:0;url=error.html");
            }
        }
        else
        {
            header("refresh:0;url=error.html");
        }
    }
    else
    {
        header("refresh:0;url=error.html");
    }
?>
