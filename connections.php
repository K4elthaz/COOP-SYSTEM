<?php

<script type = "module">
    import { initializeApp } from "https://www.gstatic.com/firebasejs/9.17.2/firebase-app.js";
    import { getDatbase , set , ref , push , child , onValue , get } from 
        "https://www.gstatic.com/firebasejs/9.17.2/firebase-analytics.js";

var firebaseConfig = {
    apiKey: "AIzaSyBplBrnv8mCuomqxLZoDTznGqwaL19wsw4",
    authDomain: "erdb-multi-purpose-cooperative.firebaseapp.com",
    projectId: "erdb-multi-purpose-cooperative",
    storageBucket: "erdb-multi-purpose-cooperative.appspot.com",
    messagingSenderId: "514307857725",
    appId: "1:514307857725:web:cf8674db500fd1a9563954",
    measurementId: "G-9X2QT9D9QW"
        };
const app = initializeApp(firebaseConfigb);
const database = getDatbase(app);

</script>

$connections = mysqli_connect("localhost", "root", "", "coop-database");

if (mysqli_connect_errno()) {
    echo "failed to connect to MYSQL: " . mysqli_connect_error();
}
?>