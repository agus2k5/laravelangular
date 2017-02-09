app.controller('DocenteController', function($scope,$http,API_URL){

	 //devuelve los docentes de la API
	$http.get(API_URL + 'docente')
	.success(function(response){
		$scope.docentes = response;
	});


	  // show modal Form

  $scope.toggle = function(modalstate, id) {
      $scope.modalstate = modalstate;
      //cambia el titulo segun cada caso
      switch(modalstate) {
        case 'add':
          $scope.form_title = "Agregar nuevo Docente";
          break;
        case 'edit':
          $scope.form_title = "Detalle docente";
          $scope.id = id;
          $http.get(API_URL + 'docente/' + id).success(function(response){
            console.log(response);
            $scope.docente = response;
          });
          break;
        default:
          break;
      }
      console.log(id);
      $('#myModal').modal('show');
  }

  // guardar nuevo docente o modificar docente existente
  $scope.save = function(modalstate, id) {
    var url = API_URL + "docente";
    if (modalstate === 'edit') {
      url += "/" + id;
    }
    console.log(modalstate);
    $http({
      method: 'POST',
      url: url,
      data: $.param($scope.docente),
      headers: {'Content-Type': 'application/x-www-form-urlencoded'}
    }).success(function(response){
      console.log(response);
      location.reload();
    }).error(function(response){
      console.log(response);
      alert('ocurrio un error');
    });
  }

 // borrar registro de docente
 $scope.confirmDelete = function(id) {

   var isConfirmDelete = confirm('Seguro que desea guardar este registro?');
   console.log(isConfirmDelete);
   if (isConfirmDelete){
     $http({
       method: 'DELETE',
       url: API_URL + 'docente/' + id
     }).success(function(data){
       console.log(data);
       location.reload();
     }).error(function(data){
       console.log(data);
       alert('no se pudo eliminar el registro');
     });
   } else {
     return false;
   }
 }


});


