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

  /**
   * username to add in Project
   */

  $("#username").keyup(function () {
    const usernameEmail = $(this).val();
    if (usernameEmail.length > 0) {
      $("#user-menu-list").html("");
      console.log(usernameEmail);
      $.ajax({
        url:
          $(this).data("page") == "user"
            ? "../../api/user_search.php"
            : "../../../api/user_search.php",
        method: "POST",
        data: {
          usernameEmail: usernameEmail,
        },
        success: function (response) {
          console.log(response);
          if (response["user"].length > 0) {
            $("#userList").html("");
            response["user"].forEach((user) => {
              $("#user-menu-list").append(
                `<li><p class="dropdown-item invite-user-dropdown-item" data-target-user="${user["username"]}">${user["firstName"]}, ${user["lastName"]}, @${user["username"]}</p></li>`
              );
            });
            $(".invite-user-dropdown-item").click(function () {
              const username = $(this).data("target-user");
              $("#username").val(username);
              $("#user-menu-list").removeClass("show");
            });
            $("#user-menu-list").addClass("show");
          } else {
            Toastify({
              text: response["message"],
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
            $("#user-menu-list").append(
              `<li><p class="dropdown-item">${response["message"]}</p></li>`
            );
          }
        },
        error: function (error) {
          console.log(error);
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
  });

  $("#project-image").on("change", function () {
    var fileInput = this;
    var imagePreview = $("#image-preview");

    if (fileInput.files && fileInput.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $("#upload-icon").removeClass("opacity-50");
        $("#upload-icon").addClass("text-success");
        var img = document.createElement("img");
        img.src = e.target.result;
        img.style = "height: 150px";

        imagePreview.html(img);
      };

      // Read the selected file and trigger the `onload` event
      reader.readAsDataURL(fileInput.files[0]);
    }
  });

  $("#upload-photo").click(function () {
    var fileInput = document.getElementById("project-image");
    var file = fileInput.files[0];

    if (file) {
      var formData = new FormData();
      console.log(typeof file);
      formData.append("projectImage", file);

      $.ajax({
        type: "POST",
        url: "../../api/upload_image.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          Toastify({
            text: response["message"],
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
        },
      });
    } else {
      Toastify({
        text: "File is not Selected",
        className: "info",
        close: true,
        gravity: "top",
        position: "right",
        stopOnFocus: true,
        style: {
          background: "linear-gradient(to bottom, #FF6B6B, #FF4444)",
          color: "black",
        },
      }).showToast();
    }
  });

  $(".delete-project-user").each(function () {
    // For each element with the class "delete-project-user"
    $(this).click(function () {
      // Attach a click event handler
      const data = {
        pid: $(this).data("project-id"),
        uid: $(this).data("user-id"),
      };
      $.ajax({
        method: "POST",
        url: "../../../api/project_user_delete.php",
        data: data,
        success: (response) => {
          // Handle a successful response
          Toastify({
            text: response.message,
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
          // Handle an error response
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
        },
      });
    });
  });

  $(".delete-photo").each(function (index, element) {
    element.addEventListener("click", function () {
      const photoId = $(this).data("photo-id");

      $.ajax({
        url: "../../api/delete_photo.php",
        data: {
          photoId: photoId,
        },
        method: "POST",
        success: function (response) {
          Toastify({
            text: response.message,
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
        error: function (error) {
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
        },
      });
    });
  });

  $(".share-photo").each(function (index, element) {
    element.addEventListener("click", function () {
      const photoUrl = $(this).data("url");
      if ("clipboard" in navigator) {
        navigator.clipboard
          .writeText(photoUrl)
          .then(function () {
            Toastify({
              text: "🔗 Copied to Clipboard",
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
          })
          .catch(function (err) {
            Toastify({
              text: "Unable to Copy to Clipboard",
              className: "info",
              close: true,
              gravity: "top",
              position: "right",
              stopOnFocus: true,
              style: {
                background: "linear-gradient(to bottom, #FF6B6B, #FF4444)",
              },
            }).showToast();
          });
      }
    });
  });

  $("#tagInput").on("keyup", function (event) {
    if (event.keyCode === 13) {
      if (event.target.value) {
        $.ajax({
          url: "../../../api/add_tag_to_photo.php",
          data: {
            tag: event.target.value,
            photoId: $(this).data("photo-id"),
          },
          method: "POST",
          success: function (response) {
            console.log(response);
            Toastify({
              text: response.message,
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
          error: function (error) {
            console.log(error);
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
      } else {
        Toastify({
          text: "🚫 Tag is Empty",
          className: "info",
          close: true,
          gravity: "top",
          position: "right",
          stopOnFocus: true,
          style: {
            background: "white",
            color: "black",
          },
        }).showToast();
      }
    } else {
      $.ajax({
        url: "../../../api/search_tags.php",
        data: {
          tag: $(this).val(),
        },
        method: "POST",
        success: function (response) {
          $("#tags-menu-list").html("");
          response["tags"].forEach((tag) => {
            $("#tags-menu-list").append(
              `<li><p class="dropdown-item tag-dropdown-item" data-target-tag-id="${tag["id"]}" data-target-tag="${tag["Tag"]}">${tag["Tag"]}</p></li>`
            );
          });
          $(".tag-dropdown-item").click(function () {
            const tag = $(this).data("target-tag");
            $("#tagInput").val(tag);
            $("#tags-menu-list").removeClass("show");
          });
          $("#tags-menu-list").addClass("show");
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
        },
      });
    }
  });
  $("#projectInput").on("keyup", function (event) {
    if (event.keyCode === 13) {
      if (!$(this).val()) {
        Toastify({
          text: "🚫 Empty not Allowed",
          className: "info",
          close: true,
          gravity: "top",
          position: "right",
          stopOnFocus: true,
          style: {
            background: "white",
            color: "black",
          },
        }).showToast();
      } else if (isNaN($(this).val())) {
        Toastify({
          text: "🚫 Only Numbers are allowed",
          className: "info",
          close: true,
          gravity: "top",
          position: "right",
          stopOnFocus: true,
          style: {
            background: "white",
            color: "black",
          },
        }).showToast();
      } else {
        $.ajax({
          url: "../../../api/add_project_to_photo.php",
          data: {
            projectId: Number($(this).val()),
            photoId: $(this).data("photo-id"),
          },
          method: "POST",
          success: function (response) {
            // console.log(response);
            Toastify({
              text: response.message,
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
          error: function (error) {
            // console.log(error);
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
    } else {
      $.ajax({
        url: "../../../api/search_projects.php",
        data: {
          ProjectNameID: $(this).val(),
        },
        method: "POST",
        success: function (response) {
          console.log(response);
          $("#project-menu-list").html("");
          response["projects"].forEach((project) => {
            $("#project-menu-list").append(
              `<li><p class="dropdown-item project-dropdown-item" data-project-id="${project["id"]}">${project["name"]},${project["state"]},${project["city"]},${project["postalCode"]},</p></li>`
            );
          });
          $(".project-dropdown-item").click(function () {
            const id = $(this).data("project-id");
            $("#projectInput").val(id);
            $("#project-menu-list").removeClass("show");
          });
          $("#project-menu-list").addClass("show");
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
        },
      });
    }
  });

  $(".delete-photo-tag").each(function (index, element) {
    $(element).on("click", function () {
      const data = {
        tag: $(this).data("tag"),
        photoId: $(this).data("photo-id"),
      };

      $.ajax({
        url: "../../../api/delete_photo_tag.php",
        data: data,
        method: "POST",
        success: (response) => {
          Toastify({
            text: response.message,
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
        },
      });
    });
  });

  $(".delete-project-photo").each(function (index, element) {
    $(element).on("click", function () {
      const data = {
        projectId: $(this).data("project-id"),
        photoId: $(this).data("photo-id"),
      };

      console.log(data);

      $.ajax({
        method: "POST",
        url: "../../../api/delete_project_photo.php",
        data: data,
        success: (response) => {
          console.log(response);
          Toastify({
            text: response.message,
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
          console.log(error);
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
        },
      });
    });
  });
  $("#upload-project-photo").on("click", function () {
    const projectId = $(this).data("project-id");
    const fileInput = document.getElementById("project-image");
    const file = fileInput.files[0];
    const formData = new FormData();
    console.log(projectId);
    formData.append("projectPhoto", file);
    formData.append("projectId", projectId);
    $.ajax({
      method: "POST",
      url: "../../../api/upload_image_to_project.php",
      data: formData,
      processData: false,
      contentType: false,
      success: (response) => {
        console.log(response);
        Toastify({
          text: response.message,
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
        console.log(error);
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
      },
    });
  });
  $(".remove-image-from-project").each(function (index, element) {
    $(element).on("click", function () {
      const data = {
        projectId: $(this).data("project-id"),
        photoId: $(this).data("photo-id"),
      };
      console.log(data);
      $.ajax({
        method: "POST",
        url: "../../../api/delete_project_photo.php",
        data: data,
        success: (response) => {
          console.log(response);
          Toastify({
            text: response.message,
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
          console.log(error);
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
        },
      });
    });
  });

  $("#photo-description").on("keyup", function (event) {
    // $(this).val().split("").length
    $("#show-description-characters").html(
      `| ${$(this).val().split("").length} Characters`
    );
  });

  $("#addDescriptionButton").on("click", function () {
    console.log($("#photo-description").val());
    const data = {
      photoId: $(this).data("photo-id"),
      description: $("#photo-description").val(),
    };
    $.ajax({
      url: "../../../api/add_photo_description.php",
      data: data,
      method: "POST",
      success: function (response) {
        console.log(response);
        Toastify({
          text: response.message,
          className: "info",
          close: true,
          gravity: "top",
          position: "right",
          stopOnFocus: true,
          style: {
            background: "#4CAF50",
          },
        }).showToast();
      },
      error: function (error) {
        console.log(error);
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
      },
    });
  });

  $("#add-employee-form").each(function (index, form) {
    $(form).submit(function (event) {
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
      } else {
        event.preventDefault();

        const data = {
          username: $("#username").val(),
          managerId: $("#username").data("manager-id"),
        };

        console.log(data);

        $.ajax({
          url: "../../api/add_user_employee.php",
          method: "POST",
          data: data,
          success: function (response) {
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
            if (response["message"]) {
              // setTimeout(() => {
              //   location.reload();
              // }, 1000);
            }
          },
          error: function (error) {
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
          },
        });
      }

      $(form).addClass("was-validated");
    });
  });
});
