$(document).ready(function () {
  let map;
  var markers = [];
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

  $("#add-markers-location").click(function () {
    let markersLocation = "";
    markers.forEach((marker, index) => {
      markersLocation += marker.position.lat() + " " + marker.position.lng();
      if (index != markers.length - 1) markersLocation += ",";
    });
    const url = $(this).data("url");
    $.ajax({
      url: url,
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
    const url = $(this).data("url");
    $.ajax({
      url: url,
      method: "POST",
      data: {
        projectId: pId,
      },
      success: (response) => {
        if (response["markers"] != 0) {
          markers.forEach((marker) => {
            marker.setMap(null);
          });
          response["markers"].map((marker, i) => {
            map.setCenter(
              new google.maps.LatLng(
                parseFloat(marker["lat"]),
                parseFloat(marker["lng"])
              )
            );

            addMarker(marker);
          });
        }
      },
      error: (error) => {},
    });
  });
  initMap();
});
