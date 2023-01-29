//<--- Live status for Student Registration  Start --->
$(document).ready(function () {

  // Ajax Call for Email Already Exists Conditioon, Name validation - For Student Registration
  $("#stuemail, #stuname, #stupass").on("keypress blur", function () {
    var stuemail = $("#stuemail").val();
    var stuname = $("#stuname").val();
    var stupass = $("#stupass").val();

    $.ajax({
      url: "Student/addstudent.php",
      method: "POST",
      dataType: "json",
      data: {
        checkmail: "checkmail",
        stuemail: stuemail,
      },
      success: function (data) {
        console.log(data);
        if (data != 0) {
          $("#reg_statusMsg2").html(
            "<small style='color: red'>Email already exists!</small>"
          );

          email_exst = true;

        } else if (data == 0) {
          // If email is not valid
          if (stuemail.trim() != "" && !validateEmail(stuemail)) {
            $("#reg_statusMsg2").html(
              "<small style='color: red'>Please enter valid email: e.g example@mail.com</small>"
            );

          } else if (stuemail.trim() != "" && validateEmail(stuemail)) 
          // If email is valid
          {
            $("#reg_statusMsg2").html(
              "<small style='color: green'>Everything looks good!</small>"
            );

            email_exst = false;
          }
          else if(stuemail.trim() == ""){
            $("#reg_statusMsg2").html(
              "<small style='color: red'>Please enter email Id</small>"
            );
          }
        }
        
          // If name is empty
          if (stuname.trim() == "") {
            $("#reg_statusMsg1").html(
              "<small style='color: red'>Please enter name</small>"
            );

          }

          // If name is empty
          if (stuname != "") {

            if (!validateName(stuname)) {
              $("#reg_statusMsg1").html(
                "<small style='color: red'>Please enter a valid name</small>"
              );
          
            }
            else{
              $("#reg_statusMsg1").html("");
            }
          }

          // If password is empty
          if (stupass.trim() == "") {
            $("#reg_statusMsg3").html(
              "<small style='color: red'>Please enter password</small>"
            );
          }

          // If password is not empty
          if (stupass != "") {
            $("#reg_statusMsg3").html("");
          }
      },
    });
  });
});


function addStu() {
  var stuname = $("#stuname").val();
  var stuemail = $("#stuemail").val();
  var stupass = $("#stupass").val();

  console.log(email_exst);
  // Checkimg Form Fields on From Submission

  // If name is empty
  if (stuname.trim() == "") {
    $("#reg_statusMsg1").html(
      "<small style='color: red'>Please enter name</small>"
    );

  }

  // If email is empty
  if (stuemail.trim() == "") {
    $("#reg_statusMsg2").html(
      "<small style='color: red'>Please enter email Id</small>"
    );
  }
  else if (stuemail.trim() != "" && !validateEmail(stuemail)) {
    $("#reg_statusMsg2").html(
      "<small style='color: red'>Please enter valid email: e.g example@mail.com</small>"
    );
  }

  // If password is empty
  if (stupass.trim() == "") {
    $("#reg_statusMsg3").html(
      "<small style='color: red'>Please enter password</small>"
    );
  }

  // otherwise proceed
  else if(stuname.trim() != "" && validateName(stuname) && validateEmail(stuemail) && !email_exst && stupass.trim() != "") {
    $.ajax({
      url: "Student/addstudent.php",
      method: "POST",
      dataType: "json",
      data: {
        stusignup: "stusignup",
        stuname: stuname,
        stuemail: stuemail,
        stupass: stupass,
      },

      success: function (data) {
        console.log(data);

        if (data == "OK") {
          $("#successMsg")
            .html(
              "<span class='alert alert-success'>Registration successful</span>"
            )
            .fadeIn(500);

          // function called to clear success/failure Msg
          setTimeout(clearMsg, 3500);

          // function called to clear fields
          clearStuRegFields();

        } else if (data == "Failed") {
          $("#successMsg").html(
            "<span class='alert alert-danger'>Unable to register<span>"
          );

          // function called to clear success/failure Msg
          setTimeout(clearMsg, 3500);
        }
      },
    });
  }
}


// Function to validate name
function validateName(name) {
  var reg = /^[a-zA-Z ]{2,30}$/;
  return reg.test(name);
}

// Function to validate email
function validateEmail(email) {
  var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
  return reg.test(email);
}

//  Clear All Fields
function clearStuRegFields() {
  $("#stuRegForm").trigger("reset");
  $("#reg_statusMsg1").html(" ");
  $("#reg_statusMsg2").html(" ");
  $("#reg_statusMsg3").html(" ");
}

function clearStuLogFields(){
  $("#stuLoginForm").trigger("reset");
  $("#stuLogemail").html(" ");
  $("#stuLogpass").html(" ");
  $("#statusLogMsg").html(" ");

}

// Clear Success/Failure Message
function clearMsg() {
  $("#successMsg").fadeOut();
}
//<--- Live status for Student Registration End --->

//<--- Live status for Student Login Start --->
function checkStuLogin() {
  var stuLogEmail = $("#stuLogemail").val();
  var stuLogPass = $("#stuLogpass").val();

  if(stuLogEmail.trim() == ""){
    $("#log_statusMsg1").html(
      "<small style='color: red'>Please enter email Id</small>"
    );

  }
  else{
    if(validateEmail(stuLogEmail)){

      $("#log_statusMsg1").html(
        "<small style='color: green'>Everything looks good!</small>"
      );
      
    }
    else{
      $("#log_statusMsg1").html("");
    }
  }

  if (stuLogEmail.trim() != "" && !validateEmail(stuLogEmail)) {
    $("#log_statusMsg1").html(
      "<small style='color: red'>Please enter valid email: e.g example@mail.com</small>"
    );

  }

  if(stuLogPass.trim() == ""){
    $("#log_statusMsg2").html(
      "<small style='color: red'>Please enter password</small>"
    );

  }
  else{
    $("#log_statusMsg2").html("");
  }

  if(stuLogEmail.trim() != "" && stuLogPass.trim() != "" && validateEmail(stuLogEmail)){
    $.ajax({
      url: "Student/addstudent.php",
      method: "POST",
      dataType: "json",
      data: {
        checkLogemail: "checklogmail",
        stuLogEmail: stuLogEmail,
        stuLogPass: stuLogPass,
      },
      success: function (data) {
        console.log(data);

        if (data == 0) {
          $("#statusLogMsg").html(
            "<small class='alert alert-danger'>Invalid email id or password!</small>"
          );
        } else if (data == 1) {
          $("#statusLogMsg").html(
            "<div class='spinner-border text-success' role='status'></div>"
          );

          setTimeout(()=>{
            window.location.href="index.php";
          }, 1000);
        }
      },
    });
  }
}


