$(document).ready(function () {
  $(".editableButton").click(function () {
    const column = $(this).data("column");
    const id = $(this).data("target");
    if ($(id).attr("contenteditable") == "false") {
      const userUrl = $(this).data("url");
      const value = $(id).text().trim();
      console.log(value);
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
      console.log(id);
    }
  });
});
