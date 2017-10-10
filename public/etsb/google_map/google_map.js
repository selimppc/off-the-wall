/*
 * declare map as a global variable
 */
var map;

/*
 * use google maps api built-in mechanism to attach dom events
 */
google.maps.event.addDomListener(window, "load", function () {

    /*
     * create map
     */
    var map = new google.maps.Map(document.getElementById("map_div"), {
        center: new google.maps.LatLng(23.753665, 90.358984),
        zoom: 14,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    /*
     * create infowindow (which will be used by markers)
     */
    var infoWindow = new google.maps.InfoWindow();

    /*
     * marker creater function (acts as a closure for html parameter)
     */
    function createMarker(options, html) {
        var marker = new google.maps.Marker(options);
        if (html) {
            google.maps.event.addListener(marker, "click", function () {
                infoWindow.setContent(html);
                infoWindow.open(options.map, this);
            });
        }
        return marker;
    }

    /*
     * add markers to map in google
     */
    var marker0 = createMarker({
        position: new google.maps.LatLng(23.753665, 90.358984),
        map: map,
        icon: "http://1.bp.blogspot.com/_GZzKwf6g1o8/S6xwK6CSghI/AAAAAAAAA98/_iA3r4Ehclk/s1600/marker-green.png"
        //icon: "http://bzmgraphics.com/assets/images/logo.png"
    }, "<h1>Bmz Graphics</h1>" +
        "<p>www.bzmGraphics.com</p>" +
            "<p>email : hello@bmzgraphics.com</p>" +
            "<p>Phone: +8801916075973 </p>" +
            "<p>bZm Graphics is a Creative studio with 100+ Photoshop and Illustrator experts with an aim to provide excellent Photo editing and Graphics designing services. Our services include Clipping path, Retouching, Photo Masking, Shadow creation, Color correction, Background remove and many more. We are providing services to Newspapers, Magazines, Advertising Agencies, Ecommerce Site Management Firms, Product and Fashion Photographers, Prepress Agencies, Printing & Publishing Companies around the world and fulfilling their graphics design and image editing needs.</p>"
    );

});
