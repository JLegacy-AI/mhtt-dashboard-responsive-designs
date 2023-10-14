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
              setTimeout(() => {
                window.location = `./dashboard/projects/index.php?username=${response["user"]["username"]}`;
                console.log("Here");
              }, 1000);
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
  $("#project-add-form").each(function (index, form) {
    console.log(form);
    $(form).submit(function (event) {
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
      } else {
        event.preventDefault();
      }

      $(form).addClass("was-validated");
    });
  });

  /**
   * Making Headings or Content Editable
   */
  $(".editableButton").click(function () {
    var targetValue = $(this).data("target");
    if ($(targetValue).attr("contenteditable")) {
      $(targetValue).attr("contenteditable", "false");
      $(this).html(`<i class='bx bx-edit fs-5 text-primary'></i>`);
    } else {
      $(this).html(`<i class="bx bx-check-square text-success fs-5"></i>`);
      $(targetValue).attr("contenteditable", "true");
      Toastify({
        text: "Click ✅ Save Changes",
        className: "info",
        close: true,
        gravity: "top",
        position: "right",
        stopOnFocus: true,
        style: {
          background: "#f5f5f5",
          color: "black",
        },
      }).showToast();
    }
  });

  /**
   * Initiate Datatables using jQuery
   */
  $(".datatable").each(function () {
    new simpleDatatables.DataTable(this);
  });
});
