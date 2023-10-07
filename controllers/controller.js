$(document).ready(function () {
  /**
   * Initiate Bootstrap validation check
   */
  $(".needs-input-validation").each(function (index, form) {
    $(form).submit(function (event) {
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
        console.log("NOT OK");
      } else {
        event.preventDefault();

        const data = {
          firstname: $("#firstName").val(),
          lastname: $("#lastName").val(),
          email: $("#email").val(),
          phonenumber: $("#phoneNumber").val(),
          username: $("#username").val(),
          password: $("#password").val(),
        };

        $.ajax({
          url: "./api/user_register.php",
          method: "POST",
          data: data,
          success: function (response) {
            if (response["success"]) {
              window.location = "/";
            }
          },
          error: function (error) {
            console.log("Error");
            console.log(error);
            if (error.status === 400) {
            }
          },
        });
      }

      $(form).addClass("was-validated");
    });
  });
});
