<!DOCTYPE html>
<html lang="en" ng-app="getDocente">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 5 and Angular CRUD Application</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= asset('css/bootstrap.min.css') ?>">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->
<!--     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> -->

  </head>
  <body>

    <div class="container">
      <h2>Aplicacion Laravel + Angular</h2>
      <div ng-controller="DocenteController">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Email</th>
              <th>
                <button id="btn-add" class="btn btn-success btn-xs" ng-click="toggle('add', 0)">Agregar nuevo docente</button>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="docente in docentes">
              <td>@{{ docente.id }}</td>
              <td>@{{ docente.nombre }}</td>
              <td>@{{ docente.apellido }}</td>
              <td>@{{ docente.email }}</td>
              <td>
                <button class="btn btn-warning btn-xs btn-detail" ng-click="toggle('edit', docente.id)">
                  <span class="glyphicon glyphicon-edit"></span>
                </button>
                <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(docente.id)">
                  <span class="glyphicon glyphicon-trash"></span>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
        <!-- show modal  -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">@{{form_title}}</h4>
              </div>
              <div class="modal-body">
                <form name="frmDocente" class="form-horizontal" novalidate="">
                  
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Nombre</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="@{{nombre}}" ng-model="docente.nombre" ng-required="true">
                      <span ng-show="frmDocente.nombre.$invalid && frmDocente.nombre.$touched">Nombre requerido</span>
                    </div>
                  </div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label">Apellido</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" value="@{{apellido}}" ng-model="docente.apellido" ng-required="true">
                        <span ng-show="frmDocente.apellido.$invalid && frmDocente.apellido.$touched">Apellido Requerido</span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label">Email</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="@{{email}}" ng-model="docente.email" ng-required="true">
                        <span ng-show="frmDocente.email.$invalid && frmDocente.email.$touched">Email requerido</span>
                      </div>
                    </div>

                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmDocente.$invalid">Save Changes</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- bootstrap -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- Aangular -->
    <script src="{{ asset('js/angular.min.js') }}"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script> -->
<!--     <script src="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.1/angular-material.min.js"></script> -->

    <!-- Angular Scripts -->
    <script src="{{ asset('angular/app.js') }}"></script>
    <script src="{{ asset('angular/controllers/DocenteController.js') }}"></script>
  </body>
</html>