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
        const data = {
          projectName: $("#projectName").val(),
          addressOne: $("#addressOne").val(),
          addressTwo: $("#addressTwo").val(),
          city: $("#city").val(),
          state: $("#state").val(),
        };
      }

      $(form).addClass("was-validated");
    });
  });
});
