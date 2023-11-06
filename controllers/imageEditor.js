var whiteTheme = {
  "common.backgroundColor": "#f1f1f1",
  "common.border": "1px solid #c1c1c1",

  // header
  "header.backgroundImage": "none",
  "header.backgroundColor": "transparent",
  "header.border": "0px",

  // load button
  "loadButton.display": "none",

  // main icons
  "menu.normalIcon.color": "#8a8a8a",
  "menu.activeIcon.color": "#555555",
  "menu.disabledIcon.color": "#434343",
  "menu.hoverIcon.color": "#e9e9e9",
  "menu.iconSize.display": "24px",
  "menu.iconSize.height": "24px",

  // submenu icons
  "submenu.normalIcon.color": "#8a8a8a",
  "submenu.activeIcon.color": "#555555",
  "submenu.iconSize.width": "32px",
  "submenu.iconSize.height": "32px",

  // submenu primary color
  "submenu.backgroundColor": "#f5f5f5",
  "submenu.partition.color": "#e5e5e5",

  // submenu labels
  "submenu.normalLabel.color": "#858585",
  "submenu.normalLabel.fontWeight": "normal",
  "submenu.activeLabel.color": "#000",
  "submenu.activeLabel.fontWeight": "normal",

  // checkbox style
  "checkbox.border": "1px solid #ccc",
  "checkbox.backgroundColor": "#fff",

  // rango style
  "range.pointer.color": "#333",
  "range.bar.color": "#ccc",
  "range.subbar.color": "#606060",

  "range.disabledPointer.color": "#d3d3d3",
  "range.disabledBar.color": "rgba(85,85,85,0.06)",
  "range.disabledSubbar.color": "rgba(51,51,51,0.2)",

  "range.value.color": "#000",
  "range.value.fontWeight": "normal",
  "range.value.fontSize": "11px",
  "range.value.border": "0",
  "range.value.backgroundColor": "#f5f5f5",
  "range.title.color": "#000",
  "range.title.fontWeight": "lighter",

  // colorpicker style
  "colorpicker.button.border": "0px",
  "colorpicker.title.color": "#000",
};

$(document).ready(function () {
  const initToastImageEditor = (imageUrl) => {
    // Image editor
    var imageEditor = new tui.ImageEditor("#tui-image-editor-container", {
      includeUI: {
        loadImage: {
          path: imageUrl,
          name: "Image",
        },
        theme: whiteTheme,
        initMenu: "filter",
        menuBarPosition: "left",
      },
      cssMaxWidth: 1000,
      cssMaxHeight: 1000,
      usageStatistics: true,
    });
    $(".tui-image-editor-menu").prepend(
      `<li id="download-updated-image" tooltip-content="Download" class="tie-btn-rotate tui-image-editor-item normal">
        <i class='bx bx-download fs-3 text-white' style="opacity: 0.5"></i>
      </li>`
    );
    $(".tui-image-editor-menu").prepend(
      `<li id="save-updated-image" tooltip-content="Upload" class="tie-btn-rotate tui-image-editor-item normal">
        <i class='bx bx-upload fs-3 text-white' style="opacity: 0.5" ></i>
      </li>`
    );
    $("#download-updated-image").click(function () {
      const canvas = $(".lower-canvas")[0];
      const dataURL = canvas.toDataURL("image/png");

      const downloadLink = document.createElement("a");
      downloadLink.href = dataURL;
      downloadLink.download = "image-edited.png";
      downloadLink.click();
    });

    $("#save-updated-image").click(function () {
      const canvas = $(".lower-canvas")[0];
      const dataURL = canvas.toDataURL("image/png");
    });
    $(".tui-image-editor-header").remove();
    $(".tui-image-editor-download-btn").html(`<i class="bi bi-download"></i>`);
    $(".tui-image-editor-download-btn").removeAttr("style");
    $(".tui-image-editor-download-btn").attr(
      "class",
      "btn btn-primary rounded-0 border-0"
    );
    $(".tui-image-editor-controls-logo").html("");

    imageEditor.toDataURL();

    window.onresize = function () {
      imageEditor.ui.resizeEditor();
    };
  };

  $("#editPhoto").click(function () {
    const imageUrl = $(this).data("url");
    initToastImageEditor(imageUrl);
    $("#toast-image-editor-modal").css("display", "block");
    $("#toast-image-editor-modal").addClass("show");
    const closeButton = $("#toast-image-editor-modal .btn-close");
    closeButton.click(function () {
      $("#toast-image-editor-modal").css("display", "none");
      $("#toast-image-editor-modal").removeClass("show");
    });
  });
});
