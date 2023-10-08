$(document).ready(function () {
  /**
   * Initiate Bootstrap validation check For Registration Sign Up Users
   */
  $("#user-registration-form").each(function (index, form) {
    $(form).submit(function (event) {
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
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
            console.log(response);
            if (response["message"]) {
              Toastify({
                text: response["message"],
                className: "info",
                close: true,
                gravity: "top",
                position: "right",
                stopOnFocus: true,
                style: {
                  background: "#4CAF50",
                },
              }).showToast();
            }
          },
          error: function (error) {
            if (error.status === 400) {
              Toastify({
                text: error.responseJSON.message,
                className: "info",
                close: true,
                gravity: "top",
                position: "right",
                stopOnFocus: true,
                style: {
                  background: "linear-gradient(to bottom, #FF6B6B, #FF4444)",
                },
              }).showToast();
            }
          },
        });
      }

      $(form).addClass("was-validated");
    });
  });

  /**
   * Initiate Bootstrap validation check For Login
   */
  $("#user-login-form").each(function (index, form) {
    $(form).submit(function (event) {
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
      } else {
        event.preventDefault();

        const data = {
          username: $("#username").val(),
          password: $("#password").val(),
        };

        $.ajax({
          url: "./api/user_login.php",
          method: "POST",
          data: data,
          success: function (response) {
            console.log(response);
            if (response["message"]) {
              Toastify({
                text: response["message"],
                className: "info",
                close: true,
                gravity: "top",
                position: "right",
                stopOnFocus: true,
                style: {
                  background: "#4CAF50",
                },
              }).showToast();
              console.log(response["user"]);
            }
          },
          error: function (error) {
            if (error.status === 400) {
              Toastify({
                text: error.responseJSON.message,
                className: "info",
                close: true,
                gravity: "top",
                position: "right",
                stopOnFocus: true,
                style: {
                  background: "linear-gradient(to bottom, #FF6B6B, #FF4444)",
                },
              }).showToast();
            }
          },
        });
      }

      $(form).addClass("was-validated");
    });
  });
});
