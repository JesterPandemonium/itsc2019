var vm;
var map;
var mapoverlaylist = '';

function main() {

    // partly taken from https://jsfiddle.net/6RS2z/356/

    var vectorSource = new ol.source.Vector({
        //create empty vector
    });

    // Die Koordinaten kann man sich mit map.getCoordinateFromPixel([x,y]) holen

    var iconStyle = new ol.style.Style({
        image: new ol.style.Icon(/** @type {olx.style.IconOptions} */({
            anchor: [0.5, 1],
            anchorXUnits: 'fraction',
            anchorYUnits: 'fraction',
            opacity: 0.75,
            src: 'icon.png'
        }))
    });

    //add the feature vector to the layer vector, and apply a style to whole layer
    var vectorLayer = new ol.layer.Vector({
        source: vectorSource,
        style: iconStyle
    });

    map = new ol.Map({
        target: 'map',
        layers: [
            new ol.layer.Tile({
                source: new ol.source.OSM()
            }), vectorLayer
        ],
        view: new ol.View({
            center: [1497812.457070242, 6608950.218240036], // Mittelpunkt Sachsens
            zoom: 8
        })
    });

    vm = new Vue({
        el: '#vueApp',
        data: {
            dummy: 0,
            search: '',
            categories: {
                lorem: true,
                ipsum: true
            },
            ages: {
                child: true,
                youth: true,
                adult: true,
                senior: true
            },
            list: [
                {
                    name: 'Angebot1',
                    category: 'Lorem',
                    age: ['Kinder'],
                    cost: '1000',
                    position: [1528867.5688616533, 6630417.331831136]
                },
                {
                    name: 'Angebot2',
                    category: 'Ipsum',
                    age: ['Jugendliche'],
                    cost: '0',
                    position: [1527966.0436278544, 6635880.834514183]
                },
                {
                    name: 'Angebot3',
                    category: 'Lorem',
                    age: ['Erwachsene', 'Senioren'],
                    cost: '2500',
                    position: [1528215.5090072767, 6636657.4466648465]
                },
                {
                    name: 'Angebot4',
                    category: 'Ipsum',
                    age: ['Erwachsene'],
                    cost: '500',
                    position: [1627363.777353383, 6609627.701119642]
                },
                {
                    name: 'Angebot5',
                    category: 'Ipsum',
                    age: ['Jugendliche'],
                    cost: '0',
                    position: [1378202.6158101384, 6682362.833366003]
                },
            ]
        },
        methods: {
            isShown: function (item) {
                var dummy = this.dummy;
                if (!this.onMap(item.position)) return false;
                if (item.name.indexOf(this.search) == -1) return false;
                if (item.category == 'Lorem' && (!this.categories.lorem)) return false;
                if (item.category == 'Ipsum' && (!this.categories.ipsum)) return false;
                if (item.age == 'Kinder' && (!this.ages.child)) return false;
                if (item.age == 'Jugendliche' && (!this.ages.youth)) return false;
                if (item.age == 'Erwachsene' && (!this.ages.adult)) return false;
                if (item.age == 'Senioren' && (!this.ages.senior)) return false;
                return true;
            },
            onMap: function (location) {
                var mapRes = map.values_.size;
                var topLeft = map.getCoordinateFromPixel([0, 0]);
                var bottomRight = map.getCoordinateFromPixel([mapRes[0], mapRes[1]]);
                if (topLeft == null) return true;
                var minX = topLeft[0];
                var minY = bottomRight[1];
                var maxX = bottomRight[0];
                var maxY = topLeft[1];
                if (location[0] < minX) return false;
                if (location[0] > maxX) return false;
                if (location[1] < minY) return false;
                if (location[1] > maxY) return false;
                return true;
            },
            ageparser: function (agelist) {
                return agelist.join(', ');
            },
            moneyparser: function (value) {
                if (value == 0) return 'kostenlos';
                var match = value.match(/([0-9]+)([0-9]{2})/);
                return match[1] + ',' + match[2] + ' €';
            }
        }
    });


    for (var i = 0; i < vm.list.length; i++) {
        var iconFeature = new ol.Feature({
            geometry: new ol.geom.Point(vm.list[i].position),
            id: i
        });
        vectorSource.addFeature(iconFeature);
    }

    //map.listeners_['change:view'].push(function () {console.log('works')})

    map.on("click", function(e) {
        mapoverlaylist = '';
        map.forEachFeatureAtPixel(e.pixel, function (feature, layer) {
            var feature = vm.list[feature.values_.id];
            var htmlcode = '<div class="overlayentry">';
            htmlcode += '<span class="overlayentry-name">' + feature.name + '</span>';
            htmlcode += '<a href="#" class="overlayentry-link">Info</a>';
            htmlcode += '</div>';
            mapoverlaylist += htmlcode;
        });
        var overlay = document.getElementById('mapOverlay');
        overlay.innerHTML = mapoverlaylist;
        if (mapoverlaylist != '') overlay.style.display = 'block';
        else overlay.style.display = 'none';
        console.log(map.values_.size[1] - Math.round(e.pixel[1]));
        overlay.style.bottom = (map.values_.size[1] - Math.round(e.pixel[1]) + 5) + 'px';
        overlay.style.left = (Math.round(e.pixel[0]) - Math.round(overlay.offsetWidth / 2)) + 'px';
    });

    map.on('moveend', function () { 
        vm.dummy = (vm.dummy + 1) % 2;
    });

    map.on('movestart', function () { 
        document.getElementById('mapOverlay').style.display = 'none';
    });
}

window.onload = main;