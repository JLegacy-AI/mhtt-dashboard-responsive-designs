$(document).ready(function () {
  console.log(document.getElementById("locationMap"));
  let map;
  let markers = [];
  let projectId;

  async function initMap() {
    const { Map } = await google.maps.importLibrary("maps");

    map = new Map(document.getElementById("locationMap"), {
      center: {
        lat: 39.60204162671823,
        lng: -101.40006299070782,
      },
      zoom: 5,
    });

    map.addListener("click", (event) => {
      console.log(markers);
      if (event.placeId == undefined) {
        addMarker(event.latLng);
      } else {
        Toastify({
          text: "🚩 Place Marker Aside Then Drag over the Location",
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
    });

    const searchBox = new google.maps.places.SearchBox(
      document.getElementById("addressSearch")
    );

    google.maps.event.addListener(searchBox, "places_changed", () => {
      const places = searchBox.getPlaces();
      const bounds = new google.maps.LatLngBounds();
      let i, place;
      for (i = 0; (place = places[i]); i++) {
        bounds.extend(place.geometry.location);
        console.log(places.name);
      }
      map.fitBounds(bounds);
      map.setZoom(15);
    });
  }

  const addMarker = (position) => {
    const marker = new google.maps.Marker({
      position: position,
      map: map,
      draggable: true,
    });
    markers.push(marker);

    marker.addListener("drag", (e) => {
      console.log(e.latLng.lat());
      console.log(e.latLng.lng());
    });

    marker.addListener("rightclick", (e) => {
      marker.setMap(null);
      markers = markers.filter((m) => m !== marker);
    });
  };

  initMap();

  $("#add-markers-location").click(function () {
    let markersLocation = "";
    markers.forEach((marker, index) => {
      markersLocation += marker.position.lat() + " " + marker.position.lng();
      if (index != markers.length - 1) markersLocation += ",";
    });
    $.ajax({
      url: "../../api/add_markers_location_project.php",
      method: "POST",
      data: {
        location: markersLocation,
        projectId: projectId,
      },
      success: (response) => {
        Toastify({
          text: "🚩 " + response["message"],
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
      error: (error) => {
        Toastify({
          text: "🚩 " + error.responseText["message"],
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
    });
  });

  $(".marker-location-btn").on("click", function () {
    const pId = $(this).data("project-id");
    projectId = pId;
    $.ajax({
      url: "../../api/get_project_markers.php",
      method: "POST",
      data: {
        projectId: pId,
      },
      success: (response) => {
        if (response["markers"] != 0) {
          response["markers"].map((marker, i) => {
            addMarker(marker);
          });
        }
      },
      error: (error) => {
        console.log(error);
      },
    });
  });
});
