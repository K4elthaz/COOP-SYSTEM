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


/* table */
.table-container {
  overflow-x: auto;
  overflow-y: auto;
}


table {
  height: 400px;
  border-collapse: collapse;
  display: inline-block; 
 
}

th {
  background-color: gray;
}

th, td {
  /* padding: 8px; */
  text-align: center;
  border: 1px solid blue;
  color: black;
  margin: 0;
  white-space: nowrap;
  border-top-width: 0px;
}

/* table */
body {
  color: #404E67;
  background: #F5F7FA;
  font-family: 'Open Sans', sans-serif;
  
}

.btn {
  float: right;
  height: 30px;
  font-weight: bold;
  font-size: 12px;
  text-shadow: none;
  min-width: 100px;
  border-radius: 50px;
  line-height: 13px;
}
.btn i {
  margin-right: 4px;
}

table.table tr th, table.table tr td {
  border-color: #e9e9e9;
}

table.table th i {
  font-size: 13px;
  margin: 0 5px;
  cursor: pointer;
}

table.table th:last-child {
  width: 100px;
}

table.table td a {
  cursor: pointer;
  display: inline-block;
  margin: 0 5px;
  min-width: 24px;
}   

table.table td a.add {
  color: #27C46B;
}

table.table td a.edit {
  color: #FFC107;
}

table.table td a.delete {
  color: #E34724;
}

table.table td i {
  font-size: 19px;
}

table.table td a.add i {
  font-size: 24px;
  margin-right: -1px;
  position: relative;
  top: 3px;
}    

table.table .form-control {
  height: 32px;
  line-height: 32px;
  box-shadow: none;
  border-radius: 2px;
}

table.table .form-control.error {
  border-color: #f50000;
}

table.table td .add {
  display: none;
}


table.table td:first-child, table.table th:first-child {
  position: sticky;
  left: 0;
  z-index: 2;
  font-weight: bold;
  border-collapse: separate;
  background-color:darkgrey;
}


.headcol {
  position: absolute;
  width: 5em;
  left: 0;
  top: auto;
  border-top-width: 1px;
  margin-top: -1px;
}


.img-account-profile {
    height: 10rem;
}
    
.rounded-circle {
    border-radius: 50% !important;
}

.btn {
  width: 5%;
  justify-content:end;
}


</style>

