$(document).ready(function () {
  var mapOptions;
  var map;

  var coordinates = [];
  let new_coordinates = [];
  let lastElement;
  let projectId;

  async function InitMap() {
    const { Map } = await google.maps.importLibrary("maps");

    map = new Map(document.getElementById("geofenceMap"), {
      center: {
        lat: 39.60204162671823,
        lng: -101.40006299070782,
      },
      zoom: 5,
    });
    var all_overlays = [];
    var selectedShape;
    var drawingManager = new google.maps.drawing.DrawingManager({
      //drawingMode: google.maps.drawing.OverlayType.MARKER,
      //drawingControl: true,
      drawingControlOptions: {
        position: google.maps.ControlPosition.TOP_CENTER,
        drawingModes: [
          //google.maps.drawing.OverlayType.MARKER,
          //google.maps.drawing.OverlayType.CIRCLE,
          google.maps.drawing.OverlayType.POLYGON,
          //google.maps.drawing.OverlayType.RECTANGLE
        ],
      },
      markerOptions: {
        //icon: 'images/beachflag.png'
      },
      circleOptions: {
        fillColor: "#ffff00",
        fillOpacity: 0.2,
        strokeWeight: 3,
        clickable: false,
        editable: true,
        zIndex: 1,
      },
      polygonOptions: {
        clickable: true,
        draggable: false,
        editable: true,
        // fillColor: '#ffff00',
        fillColor: "#ADFF2F",
        fillOpacity: 0.5,
      },
      rectangleOptions: {
        clickable: true,
        draggable: true,
        editable: true,
        fillColor: "#ffff00",
        fillOpacity: 0.5,
      },
    });

    function clearSelection() {
      if (selectedShape) {
        selectedShape.setEditable(false);
        selectedShape = null;
      }
    }
    //to disable drawing tools
    function stopDrawing() {
      drawingManager.setMap(null);
    }

    function setSelection(shape) {
      clearSelection();
      stopDrawing();
      selectedShape = shape;
      shape.setEditable(true);
    }

    function deleteSelectedShape() {
      if (selectedShape) {
        selectedShape.setMap(null);
        drawingManager.setMap(map);
        coordinates.splice(0, coordinates.length);
        document.getElementById("info").innerHTML = "";
      }
    }

    function CenterControl(controlDiv, map) {
      // Set CSS for the control border.
      var controlUI = document.createElement("div");
      controlUI.style.backgroundColor = "#fff";
      controlUI.style.border = "2px solid #fff";
      controlUI.style.borderRadius = "3px";
      controlUI.style.boxShadow = "0 2px 6px rgba(0,0,0,.3)";
      controlUI.style.cursor = "pointer";
      controlUI.style.marginBottom = "22px";
      controlUI.style.textAlign = "center";
      controlUI.title = "Select to delete the shape";
      controlDiv.appendChild(controlUI);

      // Set CSS for the control interior.
      var controlText = document.createElement("div");
      controlText.style.color = "rgb(25,25,25)";
      controlText.style.fontFamily = "Roboto,Arial,sans-serif";
      controlText.style.fontSize = "16px";
      controlText.style.lineHeight = "38px";
      controlText.style.paddingLeft = "5px";
      controlText.style.paddingRight = "5px";
      controlText.innerHTML = "Delete Selected Area";
      controlUI.appendChild(controlText);

      //to delete the polygon
      controlUI.addEventListener("click", function () {
        deleteSelectedShape();
      });
    }

    drawingManager.setMap(map);

    var getPolygonCoords = function (newShape) {
      coordinates.splice(0, coordinates.length);

      var len = newShape.getPath().getLength();

      for (var i = 0; i < len; i++) {
        coordinates.push(newShape.getPath().getAt(i).toUrlValue(6));
      }
    };

    google.maps.event.addListener(
      drawingManager,
      "polygoncomplete",
      function (event) {
        event.getPath().getLength();
        google.maps.event.addListener(
          event,
          "dragend",
          getPolygonCoords(event)
        );

        google.maps.event.addListener(
          event.getPath(),
          "insert_at",
          function () {
            getPolygonCoords(event);
          }
        );

        google.maps.event.addListener(event.getPath(), "set_at", function () {
          getPolygonCoords(event);
        });
      }
    );

    google.maps.event.addListener(
      drawingManager,
      "overlaycomplete",
      function (event) {
        all_overlays.push(event);
        if (event.type !== google.maps.drawing.OverlayType.MARKER) {
          drawingManager.setDrawingMode(null);

          var newShape = event.overlay;
          newShape.type = event.type;
          google.maps.event.addListener(newShape, "click", function () {
            setSelection(newShape);
          });
          setSelection(newShape);
        }
      }
    );

    var centerControlDiv = document.createElement("div");
    var centerControl = new CenterControl(centerControlDiv, map);

    centerControlDiv.index = 1;
    map.controls[google.maps.ControlPosition.BOTTOM_CENTER].push(
      centerControlDiv
    );
  }

  $("#geofence-location-btn").click(function () {
    projectId = $(this).data("project-id");
    const data = {
      projectId: projectId,
    };

    $.ajax({
      url: "../../api/get_geofence_project.php",
      method: "GET",
      data: data,
      success: (response) => {
        const geofence = response["geofence"];
        if (geofence) {
          coordinates = geofence.map(
            (coordinate) => coordinate["lat"] + "," + coordinate["lng"]
          );
        }
        InitMap();
      },
      error: (error) => {
        Toastify({
          text: "🚩 Geofence Not Found...",
          className: "error",
          close: true,
          gravity: "top",
          position: "right",
          stopOnFocus: true,
          style: {
            background: "#4CAF50",
          },
        }).showToast();
      },
    });
  });

  $("#add-geofence-location").on("click", function () {
    let cordination = "";
    coordinates.forEach((coordinate, index) => {
      console.log(index);
      cordination +=
        coordinate.replace(",", " ") +
        (index != coordinates.length - 1 ? "," : "");
    });
    // console.log(cordination);
    $.ajax({
      url: "../../api/add_geofence_project.php",
      data: {
        projectId: projectId,
        geofence: cordination,
      },
      method: "POST",
      success: (response) => {
        Toastify({
          text: response["message"],
          className: "success",
          close: true,
          gravity: "top",
          position: "right",
          stopOnFocus: true,
          style: {
            background: "#4CAF50",
          },
        }).showToast();
      },
      error: (error) => {
        Toastify({
          text: "🚩 Error Occured...",
          className: "error",
          close: true,
          gravity: "top",
          position: "right",
          stopOnFocus: true,
          style: {
            background: "#4CAF50",
          },
        }).showToast();
      },
    });
  });
});
