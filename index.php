<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title Page</title>
    <style>
        #map {
            position: absolute;
            top: 0;
            bottom: 0;
            right: 0;
            left: 0;
        }
    </style>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div id="map"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
    <script>
        var getData = function(data) {
            $scope = {};
            $scope.data = data;
            this.getResult = function() {
                return $scope.getResult();
            }
            $scope.getResult = function() {
                var _jquery = $($scope.data);
                return _jquery.find('table tr td');
            }
        }

        $(document).ready(function() {
            $.ajax({
                url: 'getPage.php',
                type: 'post',
                success: function(data) {
                    
                    var tp = new getData(data);
                    var hasil = tp.getResult();
                    arr = [];
                    for (i = 0; i < hasil.length; i++) {
                        if (i % 8 == 0) {
                            pop = [];
                            for (j = i; j < i + 7; j++) {
                                tes = hasil[j].innerText.split("                                                                                                                                                                                                                                 ");
                                pop.push(tes);
                            }
                            arr.push(pop);
                        }
                    }

                    var map = L.map('map', {
                        center: [-8.4303, 117.4219],
                        zoom: 9
                    });

                    L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=Ts9g8McLuNVEfjGFTHeG', {
                        maxZoom: 10,
                        attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">© MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">© OpenStreetMap contributors</a>'
                    }).addTo(map);
                    arr.pop();
                    arr.pop();
                    arr.pop();
                    long=[-8.5837726,-8.6718889,-8.7030710,-8.3572425,-8.6330934,-8.6585150,-8.6680444,-8.5355857,-8.5637593,-8.4535168];
                    lat=[116.1068500,116.1220480,116.2899373,116.1609208,116.5587704,116.9161845,117.3144610,118.4621733,118.6719665,118.7276222];
                    for(i=0;i<arr.length;i++){
                        L.marker([long[i],lat[i]]).addTo(map)
                        .bindPopup("<b>" + arr[i][0] + "<b><hr><p>Jumlah : "+arr[i][1]+"</p><hr><p>PDP : "+arr[i][2]+"</p><hr><p>ODP : "+arr[i][5]+"</p>").openPopup();
                    var popup = L.popup();
                    }
                }
            })
        });
    </script>
</body>

</html>