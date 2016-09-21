<!DOCTYPE html>
<html ng-app="app">
<head>
	<meta charset="UTF-8"/>
	<title>Liste à voir</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div ng-controller="MyController" data-ng-init="getUser()">
	<table class="table table-bordered table-striped table-hover">
		<thead>
			<tr>
				<th>id</th>
				<th>Nom</th>
				<th>Prenom</th>
				<th>Active</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		<!--Get all user -->
			<tr ng-repeat="user in users">
				<td  ng-model="uid">{{user.id}}</td>
				<td  ng-model="tfname">{{user.FName}}</td>
				<td  ng-model="tlname">{{user.LName}}</td>
		<!--*************-->
				<td>
					<span class="text-success" ng-show="user.isActive == 1">Active</span>
					<span class="text-danger" ng-show="user.isActive == 0">Pas Active</span>
				</td>

				<td>
					<button type="button" class="btn btn-outline-success btn-lg" style="background-color:#6BB9F0; color:white" ng-click="editUser(user.FName, user.LName, user.id)">Edit</button>
					<button type="button" class="btn btn-outline-danger btn-lg" style="background-color:#96281B; color:white" ng-click="delete(user.id)">Delete</button>
				</td>
			</tr>
		</tbody>

	</table>
	<form>
	First Name 	: <input type="text" ng-model="fname" name="userFName">
	Last Name 	: <input type="text" ng-model="lname" name="userLName">
	ID			: <input type="text" ng-model="iduser" ng-disabled=true>
	Active 		: <input type="checkbox" ng-model="active" ng-true-value='1' ng-false-value='0'>
	<!-- <input type="file" file-model="myFile"/> -->

	<input type="button" value="{{btnName}}" ng-click="insertdata()">
	</form>
</div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
<script type="text/javascript" src="../../js/app.js"></script>
</body>
</html>