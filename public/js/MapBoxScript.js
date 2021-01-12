
//startMap("Espeto do sul Aveiro");
function startMap(key, destination) {
    mapboxgl.accessToken =  key;
    
    navigator.geolocation.getCurrentPosition(successLocation, errorLocation, {
      enableHighAccuracy: true
    })
  
    var current_position
    function successLocation(position) {
      setupMap([position.coords.longitude, position.coords.latitude], destination)
      current_position = position
    }
  
    function errorLocation() {
      setupMap([-2.24, 53.48])
    }
  
    function setupMap(center, destination) {
      const map = new mapboxgl.Map({
        container: "map",
        style: "mapbox://styles/mapbox/streets-v11",
        center: center,
        zoom: 15
      })
  
      const nav = new mapboxgl.NavigationControl()
      map.addControl(nav)
  
      var directions = new MapboxDirections({
        accessToken: mapboxgl.accessToken
      })
  
  
      map.addControl(directions, "top-left")
  
      map.on('load', () => {
        directions.setOrigin([current_position.coords.longitude,current_position.coords.latitude]);
        });
    
      map.on('load', () => {
        directions.setDestination(destination);
      });
    }
  
  }
  