<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    
    <!-- Bootstrap -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link href="styles/admin.css" rel="stylesheet" type="text/css" >
    <!-- Angular -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.min.js" type="text/javascript"></script>
    <!-- jQuery -->
      <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  </head>
  <body ng-app="cylinderAdminApp" ng-controller="cylinderAdminCtrl">
    <div class="panel panel-default">
      <div class="jumbotron">
        <h1>UVU Cylinder Admin</h1>
      </div>
    </div>

      <!-- Search Bar -->
    <div class="row">
      <div class="col-sm-10 col-sm-offset-1">
        <div class="form-group">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for..." ng-model="search">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
            </span>
          </div><!-- /input-group -->
        </div><!-- /form-group -->
        <div class="form-group">
          <button type="submit" id="add" class="btn btn-default pull-right" ng-click="openNew()">Add</button>
        </div>
      </div><!-- /.col-lg-10 -->
    </div><!-- /.row -->

    <div class="data">
      <div class="col-sm-10 col-sm-offset-1">
        <div class="panel panel-default box" ng-click="getItemData()" ng-repeat="item in returnedData | filter:search">
          <h2 ng-bind="item.title"></h2>
          <h3 ng-bind="item.artist"></h3>
        </div>
      </div>
    </div>



    <div id="modal--bg">
    
      <div id="cylinderFormInfo" class="modal__container panel panel-default"">
        <h3 class="text-center">Update Cylinder Information</h3>
        <form enctype="multipart/form-data" action="" method="POST">
          <div class="col-sm-12">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label" for="artist">Name of Artist</label>
              <div class="col-sm-9">
                <input ng-model="cylinderArtist" class="form-control" type="text" name="artist" value="">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label" for="artist">Title of Cylinder</label>
              <div class="col-sm-9">
                <input ng-model="cylinderTitle" class="form-control" type="text" name="title" value="">
              </div>
            </div>
            <div class="form-group row">
              <input type="file" name="" class="pull-right">
            </div>
            <div class="form-group">
              <label for="artist">Comments</label>
              <textarea ng-model="cylinderComments" class="form-control" type="text" name="comments" value="" rows="7"></textarea>
            </div>
            <div class="form-inline pull-right">
              <button type="submit" class="btn btn-default" ng-click="closeEdit()">Cancel</button>
              <button type="submit" name="btn_update" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </form>
      </div>
      <!-- <input ng-model="cylinderTitle" type="text" name="" value=""> -->
      <!-- <input ng-model="cylinderArtist" type="text" name="" value=""> -->
      <!-- <input ng-model="cylinderComments" type="text" name="" value=""> -->
      

      <div id="createNewCylinderForm" class="modal__container panel panel-default"">
        <h3 class="text-center">Add New Cylinder</h3>
        <form enctype="multipart/form-data" action="" method="POST">
          <div class="col-sm-12">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label" for="artist">Name of Artist</label>
              <div class="col-sm-9">
                <input class="form-control" type="text" name="newArtist" value="">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label" for="artist">Title of Cylinder</label>
              <div class="col-sm-9">
                <input class="form-control" type="text" name="newTitle" value="">
              </div>
            </div>
            <div class="form-group row">
              <input type="file" name="cylinderFile" class="pull-right">
            </div>
            <div class="form-group">
              <label for="artist">Comments</label>
              <textarea class="form-control" type="text" name="newComments" value="" rows="7"></textarea>
            </div>
            <div class="form-inline pull-right">
              <button type="submit" class="btn btn-default" ng-click="closeNewForm()">Cancel</button>
              <button type="submit" name="btn_add" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </form>
      </div>


    </div>
    
    <script type="text/javascript" src="scripts/adminScript.js"></script>
  </body>
</html>
