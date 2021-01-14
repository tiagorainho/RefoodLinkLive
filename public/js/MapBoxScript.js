
//startMap("Espeto do sul Aveiro");
function startMap(key, origin, destination) {
    mapboxgl.accessToken =  key;

    setupMap([origin[1], origin[0]])
    
    function setupMap(center) {
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
        directions.setOrigin([origin[1],origin[0]]);
        });
    
      map.on('load', () => {
        directions.setDestination(destination);
      });
    }
  
  }
  