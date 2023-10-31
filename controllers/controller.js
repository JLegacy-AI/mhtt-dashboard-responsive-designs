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

              $("#firstName").val("");
              $("#lastName").val("");
              $("#email").val("");
              $("#phoneNumber").val("");
              $("#username").val("");
              $("#password").val("");
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
                setCookie("token", response["token"]["token"], 1);
                window.location = `./dashboard/index.php?token=${response["token"]["token"]}`;
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
   * Making Headings or Content Editable
   */
  $(".editableButton").click(function () {
    var targetValue = $(this).data("target");
    if ($(targetValue).attr("contenteditable")) {
      $(targetValue).removeAttr("contenteditable");
      $(this).html(`<i class='bx bx-edit fs-5 text-primary'></i>`);

      /**
       *  Ajax Call to Update the Content
       */
      const column = $(this).data("column");
      const id = $(this).data("target");
      const userUrl = $(this).data("url");
      const value = $(id).text().trim();

      $.ajax({
        url: "../../../api/user_edit.php",
        method: "POST",
        data: {
          column: column,
          url: userUrl,
          value: value,
        },
        success: function (response) {
          Toastify({
            text: `✅ ${response["message"]}`,
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
          setTimeout(() => {
            location.reload();
          }, 1000);
        },
        error: function (error) {
          Toastify({
            text: error.responseJSON["message"],
            className: "info",
            close: true,
            gravity: "top",
            position: "right",
            stopOnFocus: true,
            style: {
              background: "linear-gradient(to bottom, #FF6B6B, #FF4444)",
            },
          }).showToast();
          setTimeout(() => {
            location.reload();
          }, 1000);
        },
      });
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

  /**
   *  Token Authentication
   */
  function setCookie(name, value, hours) {
    var date = new Date();
    date.setTime(date.getTime() + hours * 60 * 60 * 1000);
    var expires = "expires=" + date.toUTCString();
    document.cookie = name + "=" + value + "; " + expires + "; path=/";
  }

  /**
   * Tooltip
   */
  const tooltipTriggerList = document.querySelectorAll(
    '[data-bs-toggle="tooltip"]'
  );
  const tooltipList = [...tooltipTriggerList].map(
    (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl)
  );
});
