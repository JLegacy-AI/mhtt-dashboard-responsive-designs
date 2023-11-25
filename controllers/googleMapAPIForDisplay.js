$(document).ready(function () {
  let map;
  let markers = [];
  async function initMap() {
    const { Map } = await google.maps.importLibrary("maps");

    map = new Map(document.getElementById("map"), {
      center: {
        lat: 39.60204162671823,
        lng: -101.40006299070782,
      },
      zoom: 5,
    });

    projects.forEach((project) => {
      const markers = project["marks"]
        .replace("MULTIPOINT", "")
        .replaceAll(")", "")
        .replaceAll("(", "")
        .split(",")
        .map((point) => {
          return point.split(" ").map((coord) => parseFloat(coord));
        });

      for (let i = 0; i < markers.length; i++) {
        const position = { lat: markers[i][0], lng: markers[i][1] };
        const marker = new google.maps.Marker({
          position: position,
          map: map,
          draggable: false,
        });
      }

      const geofence = project["geofence"]
        .replace("MULTIPOINT", "")
        .replaceAll(")", "")
        .replaceAll("(", "")
        .split(",")
        .map((point) => {
          return {
            lat: parseFloat(point.split(" ")[0]),
            lng: parseFloat(point.split(" ")[1]),
          };
        });

      const polygon = new google.maps.Polygon({
        paths: geofence,
        strokeColor: "#FF0000",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: "#ADFF2F",
        fillOpacity: 0.35,
        map: map,
      });
    });

    // console.log(project["geofence"]);

    // const polygon = new google.maps.Polygon({
    //   paths: project.locations,
    //   strokeColor: "#FF0000",
    //   strokeOpacity: 0.8,
    //   strokeWeight: 2,
    //   fillColor: "#ADFF2F",
    //   fillOpacity: 0.35,
    // });
    // polygon.setMap(map);

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
      draggable: false,
    });
    markers.push(marker);
  };

  initMap();
});
