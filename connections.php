<?php
$connections = mysqli_connect("localhost", "root", "", "coop-database");

if (mysqli_connect_errno()) {
  echo "failed to connect to MYSQL: " . mysqli_connect_error();
}
?>


<style>
* {
  box-sizing: border-box;
}

/* ADMIN - Style the search field */
form.example input[type=text] {
  padding: 1px;
  font-size: 17px;
  border: 1px solid grey;
  border-bottom-left-radius: 7px;
  border-top-left-radius: 7px;
  float: left;
  width: 30%;
  background: #f1f1f1;
  margin-left: 0%;
  margin-top: 0%
}

/* ADMIN - Style the submit button */
form.example button {
  float: left;
  width: 5%;
  padding: 1px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-bottom-right-radius: 7px;
  border-top-right-radius: 7px;
  border-left: none; /* Prevent double borders */
  cursor: pointer;
  margin-right: 54%;
}

form.example button:hover {
  background: #0b7dda;
}

/* Clear floats */
form.example::after {
  content: "";
  clear: both;
  display: table;
}

/* tables */
.table-container {
  width: 100%;
  overflow-x: auto;
  overflow-y: auto;
}

table {
  width: 100%;
  height: 400px;
  border-collapse: collapse;
  display: block; 
}

th, td {
  padding: 8px;
  text-align: center;
  border: 1px solid blue;
  color: black;

}


</style>