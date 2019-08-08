<?php include 'header.php'; ?>
    <head>
      <!-- Including OpenLayers3 -->
      <link rel="stylesheet" href="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/css/ol.css" type="text/css">
      <!-- Including local files -->
      <link rel="stylesheet" href="styles/style.css">
    </head>

    <title>OpenLayers example</title>
    <meta charset="UTF-8">
</head>

    <h2>My Map</h2>
    <div id="map" class="OLmap">
        <div id="mapOverlay"></div>
    </div>
    <div id="vueApp">
        <input type="text" id="search" v-model="search">
        <input type="checkbox" id="cat-lorem" v-model="categories.lorem">
        <span>Lorem</span>
        <input type="checkbox" id="cat-ipsum" v-model="categories.ipsum">
        <span>Ipsum</span>
        <input type="checkbox" id="age-child" v-model="ages.child">
        <span>Kinder</span>
        <input type="checkbox" id="age-youth" v-model="ages.youth">
        <span>Jugendliche</span>
        <input type="checkbox" id="age-adult" v-model="ages.adult">
        <span>Erwachsene</span>
        <input type="checkbox" id="age-senior" v-model="ages.senior">
        <span>Senioren</span>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Kategorie</th>
                    <th>Alter</th>
                    <th>Kosten</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in list" v-show="isShown(item)">
                    <th>{{ item.name }}</th>
                    <td>{{ item.category }}</td>
                    <td>{{ ageparser(item.age) }}</td>
                    <td>{{ moneyparser(item.cost) }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Including local files -->
    <script src="scripts/script.js"></script>
    <!-- Including OpenLayers3 -->
    <script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=requestAnimationFrame,Element.prototype.classList"></script>
    <!-- ^ why are ppl even still using IE... -->
    <script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js"></script>

    <!-- Including Vue.js -->
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
<?php include 'footer.php'; ?>

<!--https://stackoverflow.com/q/925164-->