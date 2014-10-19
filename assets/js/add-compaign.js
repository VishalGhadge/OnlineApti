var markers = [];
window.MappolyPath = "";
var overlay, image, selectedShape,
        polys = new Array(),
        auth = false,
        map = null,
        status = 'Ia',
        // Pick a random lat & lng at the start
        lat = 18.029454,
        lng = 75.190840,
        zoom = 15,
        user = "documentation",
        table = "write_polygons",
        query = "SELECT cartodb_id, ST_AsGeoJSON(the_geom) as geoj FROM " + table + " ORDER BY updated_at DESC LIMIT 25";

function drawPolygon(id, poly) {
    // Construct the polygon
    // Note that we don't specify an array or arrays, but instead just
    // a simple array of LatLngs in the paths property
    var options = {paths: poly,
        strokeColor: '#AA2143',
        strokeOpacity: 1,
        strokeWeight: 2,
        fillColor: "#FF6600",
        fillOpacity: 0.7};

    console.log(id);
    newPoly = new google.maps.Polygon(options);
    newPoly.cartodb_id = id;
    newPoly.setMap(map);
    google.maps.event.addListener(newPoly, 'click', function() {
        this.setEditable(true);
        setSelection(this);
    });

    polys.push(newPoly);
}

function getPolygons() {

    var url = "http://" + user + ".cartodb.com/api/v1/sql?q=" + query;

    $.getJSON(url, function(response) {

        for (i in response.rows) {
            var
                    coords = JSON.parse(response.rows[i].geoj).coordinates[0][0],
                    poly = new Array();

            for (j in coords) {
                poly.push(new google.maps.LatLng(coords[j][1], coords[j][0]))
            }

            poly.pop();
            drawPolygon(response.rows[i].cartodb_id, poly);
        }
        ;
    })
}

function clearSelection() {
    if (!selectedShape)
        return;

    storePolygon(selectedShape.getPath(), selectedShape.cartodb_id);
    selectedShape.setEditable(false);
    selectedShape = null;
}

function setSelection(shape) {
    clearSelection();

    selectedShape = shape;
    shape.setEditable(true);
}

var storePolygon = function(path, cartodb_id) {
    var
            coords = new Array(),
            payload = {type: "MultiPolygon", coordinates: new Array()};

    payload.coordinates.push(new Array());
    payload.coordinates[0].push(new Array());

    for (var i = 0; i < path.length; i++) {
        coord = path.getAt(i);
        coords.push(coord.lng() + " " + coord.lat());
        payload.coordinates[0][0].push([coord.lng(), coord.lat()])
    }

    var q = "geojson=" + JSON.stringify(payload);

    if (cartodb_id) {
        q = q + "&cartodb_id=" + cartodb_id;
    }
    $.ajax({
        url: "http://cartodb-gallery.appspot.com/cartodb/write/polygon",
        crossDomain: true,
        type: 'POST',
        dataType: 'jsonp',
        data: q,
        success: function() {
        },
        error: function() {
        }
    });
}

function initmap()
{
    //Basic
    var cartodbMapOptions = {
        zoom: zoom,
        center: new google.maps.LatLng(lat, lng),
        disableDefaultUI: true,
        mapTypeId: google.maps.MapTypeId.HYBRID
    }



    // Init the map
    map = new google.maps.Map(document.getElementById("map"), cartodbMapOptions);


    // Define the map styles (optional)
    var mapStyle = [{
            stylers: [{saturation: -65}, {gamma: 1.52}]}, {
            featureType: "administrative", stylers: [{saturation: -95}, {gamma: 2.26}]}, {
            featureType: "water", elementType: "labels", stylers: [{visibility: "on"}]}, {
            featureType: "administrative.locality", stylers: [{visibility: 'on'}]}, {
            featureType: "road", stylers: [{visibility: "simplified"}, {saturation: -99}, {gamma: 2.22}]}, {
            featureType: "poi", elementType: "labels", stylers: [{visibility: "on"}]}, {
            featureType: "road.arterial", stylers: [{visibility: 'on'}]}, {
            featureType: "road.local", elementType: "labels", stylers: [{visibility: 'on'}]}, {
            featureType: "transit", stylers: [{visibility: 'on'}]}, {
            featureType: "road", elementType: "labels", stylers: [{visibility: 'on'}]}, {
            featureType: "poi", stylers: [{saturation: -55}]
        }];

    map.setOptions({styles: mapStyle});

    //                getPolygons();

    var drawingManager = new google.maps.drawing.DrawingManager({
        drawingControl: true,
        drawingControlOptions: {
            position: google.maps.ControlPosition.TOP_RIGHT,
            drawingModes: [google.maps.drawing.OverlayType.POLYGON]
        },
        polygonOptions: {
            fillColor: '#4646ff',
            fillOpacity: 0.4,
            strokeColor: '#0000ff',
            strokeWeight: 3,
            clickable: true,
            zIndex: 1,
            editable: true,
            draggable: true,
        }
    });

    drawingManager.setMap(map);


    var bermudaTriangle;

    // Define the LatLng coordinates for the polygon.
//    var triangleCoords = [
//        new google.maps.LatLng(18.529421, 73.852943),
//        new google.maps.LatLng(18.515993, 73.842128),
//        new google.maps.LatLng(18.523155, 73.841013),
//        new google.maps.LatLng(18.529340, 73.843158)
//    ];

    // Construct the polygon.
    bermudaTriangle = new google.maps.Polygon({
        paths: window.PolyGon,
        strokeColor: '#FF0000',
        strokeOpacity: 0.8,
        strokeWeight: 3,
        fillColor: '#FF0000',
        fillOpacity: 0.35
    });

    bermudaTriangle.setMap(map);


    google.maps.event.addListener(drawingManager, 'overlaycomplete', function(e) {
        // Add an event listener that selects the newly-drawn shape when the user
        // mouses down on it.

        var newShape = e.overlay;

        var polyPath = newShape.getPath();
        var measurement = google.maps.geometry.spherical.computeArea(polyPath);
        var squareMeters = measurement.toFixed(2);
        var squareFeet = (squareMeters * 10.7639).toFixed(2);
        window.MapsquareFeet = squareFeet;
        console.log(squareFeet);
        newShape.type = e.type;

        google.maps.event.addListener(newShape, 'click', function() {
            setSelection(this);
        });
        window.MappolyPath = newShape.getPath();
        setSelection(newShape);
        storePolygon(newShape.getPath());
        newShape.setEditable(true);
    });

    google.maps.event.addListener(map, 'click', clearSelection);



//    google.maps.event.trigger(map, "resize");

    var defaultBounds = new google.maps.LatLngBounds(
            new google.maps.LatLng(-33.8902, 151.1759),
            new google.maps.LatLng(-33.8474, 151.2631));
    map.fitBounds(defaultBounds);

    // Create the search box and link it to the UI element.
    var input = /** @type {HTMLInputElement} */(
            document.getElementById('pac-input'));
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    var searchBox = new google.maps.places.SearchBox(
            /** @type {HTMLInputElement} */(input));

    // [START region_getplaces]
    // Listen for the event fired when the user selects an item from the
    // pick list. Retrieve the matching places for that item.
    google.maps.event.addListener(searchBox, 'places_changed', function() {
        var places = searchBox.getPlaces();

        for (var i = 0, marker; marker = markers[i]; i++) {
            marker.setMap(null);
        }

        // For each place, get the icon, place name, and location.
        markers = [];
        var bounds = new google.maps.LatLngBounds();
        for (var i = 0, place; place = places[i]; i++) {
            var image = {
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            var marker = new google.maps.Marker({
                map: map,
                icon: image,
                title: place.name,
                position: place.geometry.location
            });

            markers.push(marker);

            bounds.extend(place.geometry.location);
        }

        map.fitBounds(bounds);
    });
    // [END region_getplaces]

    // Bias the SearchBox results towards places that are within the bounds of the
    // current map's viewport.
    google.maps.event.addListener(map, 'bounds_changed', function() {
        var bounds = map.getBounds();
        searchBox.setBounds(bounds);
    });


    navigator.geolocation.getCurrentPosition(function(position) {

        var geolocate = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

        var infowindow = new google.maps.InfoWindow({
            map: map,
            position: geolocate,
            content:
                    '<h1>Location pinned from HTML5 Geolocation!</h1>' +
                    '<h2>Latitude: ' + position.coords.latitude + '</h2>' +
                    '<h2>Longitude: ' + position.coords.longitude + '</h2>'
        });

        map.setCenter(geolocate);

    });
    jQuery('#clear_Map').click(function(e) {
        window.PolyGon.pop();
        drawPolygon(144821499.92, window.PolyGon);

//        initmap();
//        
//        window.isMapInitionlised = true;
        return false;
    });

}






 