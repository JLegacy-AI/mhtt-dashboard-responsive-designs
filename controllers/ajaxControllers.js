$(document).ready(function () {
  /**
   * Initiate Bootstrap validation check For Adding Projects
   */
  $("#project-add-form").each(function (index, form) {
    $(form).submit(function (event) {
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
      } else {
        event.preventDefault();
        event.stopPropagation();
        const data = {
          projectName: $("#projectName").val(),
          addressOne: $("#addressOne").val(),
          addressTwo: $("#addressTwo").val(),
          city: $("#city").val(),
          state: $("#state").val(),
          postalCode: Number($("#postalCode").val()),
          token: document.cookie.split("=")[1],
        };

        $.ajax({
          url: "../../api/project_add.php",
          method: "POST",
          data: data,
          success: (response) => {
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
              location.reload();
            }, 1000);
          },
          error: (error) => {
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
          },
        });
      }

      $(form).addClass("was-validated");
    });
  });

  /**
   * Delete Projects
   */

  $(".delete-project").each(function () {
    $(this).on("click", function () {
      const data = {
        pid: $(this).attr("data-target-pid"),
      };
      $.ajax({
        method: "POST",
        url: "../../api/project_delete.php",
        data: data,
        success: (response) => {
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
            location.reload();
          }, 1000);
        },
        error: (error) => {
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
        },
      });
    });
  });

  $("#invite-user-form").each(function (index, form) {
    $(form).submit(function (event) {
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
      } else {
        event.preventDefault();
        event.stopPropagation();
        const data = {
          username: $("#username").val(),
        };

        $.ajax({
          url: "../../../api/invite_user.php",
          method: "POST",
          data: data,
          success: (response) => {
            console.log(response);
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
            // setTimeout(() => {
            //   location.reload();
            // }, 1000);
          },
          error: (error) => {
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
          },
        });
      }

      $(form).addClass("was-validated");
    });
  });
});
