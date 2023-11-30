$(document).ready(function () {
  let map;
  let markers = [];

  async function initMap() {
    console.log("Jamal");
    const { Map } = await google.maps.importLibrary("maps");

    map = new Map(document.getElementById("map"), {
      center: {
        lat: 39.60204162671823,
        lng: -101.40006299070782,
      },
      zoom: 5,
    });

    projects.forEach((project) => {
      const contenWindow = `
        <div id="content">
          <p>Last Activity: ${convertTime(project["lastActivity"])}</p>
          <p class="fs-4 text-black">
            <span class="text-muted fs-6">Name: </span> 
            ${project["name"]}
          </p>
          <p class="fs-4 text-black">
            <span class="text-muted fs-6">Project ID: </span> 
            ${project["id"]}
          </p>
        </div>
        `;

      const infoWindow = new google.maps.InfoWindow({
        content: contenWindow,
        ariaLabel: "Uluru",
      });

      const projectColor = generateColor(project.id);

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
        addMarker(position, projectColor, infoWindow);
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
        strokeColor: projectColor,
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: projectColor,
        fillOpacity: 0.35,
        map: map,
      });

      polygon.addListener("click", () => {
        infoWindow.open(map, polygon);
      });
    });
  }

  function generateColor(projectId) {
    const letters = "0123456789ABCDEF";
    let color = "#";
    for (let i = 0; i < 6; i++) {
      const randomIndex = Math.floor(Math.random() * 16);
      color += letters[randomIndex];
    }
    return color;
  }

  const addMarker = (position, color, infoWindow) => {
    const svgMarker = {
      path: "M11.291 21.706 12 21l-.709.706zM12 21l.708.706a1 1 0 0 1-1.417 0l-.006-.007-.017-.017-.062-.063a47.708 47.708 0 0 1-1.04-1.106 49.562 49.562 0 0 1-2.456-2.908c-.892-1.15-1.804-2.45-2.497-3.734C4.535 12.612 4 11.248 4 10c0-4.539 3.592-8 8-8 4.408 0 8 3.461 8 8 0 1.248-.535 2.612-1.213 3.87-.693 1.286-1.604 2.585-2.497 3.735a49.583 49.583 0 0 1-3.496 4.014l-.062.063-.017.017-.006.006L12 21zm0-8a3 3 0 1 0 0-6 3 3 0 0 0 0 6z",
      fillColor: color,
      fillOpacity: 1,
      strokeWeight: 0,
      rotation: 0,
      scale: 2,
      anchor: new google.maps.Point(0, 20),
    };
    const marker = new google.maps.Marker({
      position: position,
      map: map,
      draggable: false,
      icon: svgMarker,
      title: "Hello World!",
    });

    marker.addListener("click", () => {
      infoWindow.open(map, marker);
    });

    markers.push(marker);
  };

  function convertTime(inputDate) {
    const timestamp = Date.parse(inputDate);
    const outputDate = new Date(timestamp).toLocaleString("en-US", {
      month: "short",
      day: "numeric",
      hour: "numeric",
      minute: "numeric",
      hour12: true,
    });
    return outputDate;
  }

  initMap();
});
