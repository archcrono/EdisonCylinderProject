<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <!-- jQuery -->
      <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <!-- Bootstrap -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link href="styles/admin.css" rel="stylesheet" type="text/css" >
    <!-- Angular -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.min.js" type="text/javascript"></script>
  </head>
  <body ng-app="cylinderAdminApp" ng-controller="cylinderAdminCtrl">
    <div class="panel panel-default">
      <div class="jumbotron">
        <h1>UVU Cylinder Admin</h1>
      </div>
    </div>

    <form>
      <input type="text" id="name" name="name" value="Blake">
      <input type="text" id="age" name="age" value="30">
      <button type="submit" id="submitButton" name="button">Submit</button>
    </form>

      <!-- Search Bar -->
    <div class="row">
      <div class="col-lg-10 col-lg-offset-1">
        <div class="form-group">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
            </span>
          </div><!-- /input-group -->
        </div><!-- /form-group -->
        <div class="form-group">
          <button type="submit" id="add" class="btn btn-default pull-right">Add</button>
        </div>
      </div><!-- /.col-lg-10 -->
    </div><!-- /.row -->

    <div class="data">
      <div class="col-lg-10 col-lg-offset-1">
        <div class="panel panel-default col-lg-3 box" ng-click="getItemData()" ng-repeat="item in returnedData">
          <h2>{{ item.title }}</h2>
          <h3>{{ item.artist }}</h3>
        </div>
      </div>
    </div>


    <form id="cylinderFormInfo">
      <h1>This is a form</h1>
      <input ng-model="cylinderTitle" type="text" name="" value="">
      <input ng-model="cylinderArtist" type="text" name="" value="">
      <input ng-model="cylinderComments" type="text" name="" value="">

      <button type="button" name="button" ng-click="closeEdit()">close</button>
    </form>

    <form id="createNewCylinderForm">
      <input type="text" name="newArtist" value="">
    </form>

    <script type="text/javascript" src="scripts/adminScript.js"></script>
  </body>
</html>
