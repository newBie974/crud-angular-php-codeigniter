var app = angular.module('app', []);

//Controller MyController pour la page Show_user
	app.controller('MyController', function($scope, $http){
		$scope.users  	= [];
		$scope.btnName 	= "Ajouter"
		//GET USER I NEED
		$scope.getUser = function(){
			$http.get("get_user").success(function(result){
				$scope.users = result;
			});
		;}

		//INSERT NEW USER
		//UPDATE user existing
		$scope.insertdata = function(){
			//console.log($scope.active);
			console.log($scope.iduser);
			$scope.fname 	= null;
			$scope.lname 	= null;
			$scope.iduser	= null;
			$http.post("insert_user", {'id':$scope.iduser,'FName':$scope.fname, 'LName':$scope.lname, 'isActive':$scope.active, 'btnName':$scope.btnName}).success(function(){
				$scope.getUser();
			});
		};

		//DELETE a user
		$scope.delete = function(id){
			$http.post("deleteUser", {'id':id}).success(function(){
				console.log("Supprimer");
				$scope.getUser();
			});		
		};

		//Edit a user
		$scope.editUser = function(FName, LName, id){
			$scope.fname 	= FName;
			$scope.lname 	= LName;
			$scope.iduser	= id;
			console.log($scope.iduser);
			$scope.btnName	= "Update";
		}


	})