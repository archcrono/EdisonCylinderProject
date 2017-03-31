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
        <h1 class="text-center">UVU Cylinder Admin</h1>
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
          <button type="submit" id="add" class="btn btn-default pull-right" ng-click="openNewForm()">Add</button>
        </div>
      </div><!-- /.col-lg-10 -->
    </div><!-- /.row -->

    <div class="data row">
      <div class="col-sm-10 col-sm-offset-1">
        <div class="col-sm-4" ng-repeat="item in returnedData | filter:search">
          <div class="panel panel-default box" ng-click="getItemData()">
            <h2 ng-bind="item.title"></h2>
            <h4 ng-bind="item.artist"></h3>
          </div>
        </div>
      </div>
    </div>



    <div id="modal--bg" class="light">

      <div id="cylinderFormInfo" class="modal__container panel panel-default">
        <h3 class="text-center">Update "{{ cylinderTitle }}"</h3>
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
              <label class="col-sm-3 col-form-label" for="artist">URL</label>
              <div class="col-sm-9">
                <input ng-model="cylinderURL" class="form-control" type="text" name="url" value="">
              </div>
            </div>
            <div class="form-group row">
              <div class="text-right">
                <input type="file" name="" class="pull-right">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-3">
                <label class="col-sm-6 col-form-label" for="condition">Condition</label>
                <div class="col-sm-6">
                  <input ng-model="cylinderCondition" class="input-sm form-control" type="number" name="condition" value="">
                </div>
              </div>
              <div class="col-sm-3">
                <label class="col-sm-6 col-form-label" for="condition">Mold</label>
                <div class="col-sm-6">
                  <input ng-model="cylinderMold" class="input-sm form-control" type="number" name="mold" value="">
                </div>
              </div>
              <div class="col-sm-3">
                <label class="col-sm-6 col-form-label" for="condition">Number</label>
                <div class="col-sm-6">
                  <input ng-model="cylinderNumber" class="input-sm form-control" type="number" name="$cylinderNumber" value="">
                </div>
              </div>
              <div class="col-sm-3">
                <label class="col-sm-6 col-form-label" for="condition">Take</label>
                <div class="col-sm-6">
                  <input ng-model="cylinderTake" class="input-sm form-control" type="number" name="take" value="">
                </div>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-2 col-sm-offset-1">
                <div class="checkbox">
                  <label>
                    <input ng-model="checkbox.playable" type="checkbox" name="playable" value="">Cracked Playable
                  </label>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="checkbox">
                  <label>
                    <input ng-model="checkbox.unplayable" type="checkbox" name="cracked" value="">Cracked Unplayable
                  </label>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="checkbox">
                  <label>
                    <input ng-model="checkbox.flatEdge" type="checkbox" name="edge" value="">Flat Edge
                  </label>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="checkbox">
                  <label>
                    <input ng-model="checkbox.ucsb" type="checkbox" name="ucsb" value="">in UCSB db
                  </label>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="checkbox">
                  <label>
                    <input ng-model="checkbox.website" type="checkbox" name="ucsb" value="">on Website
                  </label>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="artist">Comments</label>
              <textarea ng-model="cylinderComments" class="form-control" type="text" name="comments" value="" rows="7"></textarea>
            </div>
            <div class="form-inline pull-right">
              <div class="btn btn-default" ng-click="closeEdit()">Cancel</div>
              <button type="submit" name="btn_update" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </form>
      </div>


      <div id="createNewCylinderForm" class="modal__container panel panel-default">
        <h3 class="text-center">Add New Cylinder</h3>
        <form enctype="multipart/form-data" id="createForm" method="POST">
          <input type="text" style="display: none;"id="cylinderId" name="id" value="" readonly="">
          <div class="col-sm-12">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label" for="artist">Name of Artist</label>
              <div class="col-sm-9">
                <input class="form-control" type="text" name="artist" value="">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label" for="artist">Title of Cylinder</label>
              <div class="col-sm-9">
                <input class="form-control" type="text" name="title" value="">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label" for="artist">URL</label>
              <div class="col-sm-9">
                <input class="form-control" type="text" name="url" value="www.website.com">
              </div>
            </div>
            <div class="form-group row">
              <div class="text-right">
                <input type="file" name="" class="pull-right">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-3">
                <label class="col-sm-6 col-form-label" for="condition">Condition</label>
                <div class="col-sm-6">
                  <input class="input-sm form-control" type="number" name="condition" value="">
                </div>
              </div>
              <div class="col-sm-3">
                <label class="col-sm-6 col-form-label" for="condition">Mold</label>
                <div class="col-sm-6">
                  <input class="input-sm form-control" type="number" name="mold" value="">
                </div>
              </div>
              <div class="col-sm-3">
                <label class="col-sm-6 col-form-label" for="condition">Number</label>
                <div class="col-sm-6">
                  <input class="input-sm form-control" type="number" name="number" value="">
                </div>
              </div>
              <div class="col-sm-3">
                <label class="col-sm-6 col-form-label" for="condition">Take</label>
                <div class="col-sm-6">
                  <input class="input-sm form-control" type="text" name="take" value="">
                </div>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-2 col-sm-offset-1">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="playable">Cracked Playable
                  </label>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="unplayable">Cracked Unplayable
                  </label>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="edge">Flat Edge
                  </label>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="ucsb">in UCSB db
                  </label>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="website">on Website
                  </label>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="artist">Comments</label>
              <textarea class="form-control" type="text" name="comments" value="" rows="7"></textarea>
            </div>
            <div class="form-inline pull-right">
              <div class="btn btn-default" ng-click="closeNewForm()">Cancel</div>
              <button type="submit" name="btn_update" id="createNewCylinderButton" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </form>
      </div>


    </div>

    <script type="text/javascript" src="scripts/adminScript.js"></script>
  </body>
</html>
