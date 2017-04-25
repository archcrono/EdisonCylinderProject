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
      <div class="jumbotron">
        <h1 class="text-center">UVU Cylinder Admin</h1>
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







    <!-- <form id="upload_form" style="border: 1px solid black;" enctype="multipart/form-data" method="post">
      <input type="file" name="file1"  id="file1"><br>

      <input type="button" value="Upload" id="uploadButton">
      <br>
      <progress id="progressBar" value="0" max="100" style="width: 300px;"></progress>
      <h3 id="status"></h3>
    </form> -->









    <div class="data row">
      <div class="col-sm-10 col-sm-offset-1">
        <div class="col-sm-4" ng-repeat="item in returnedData | filter:search">
          <div class="panel panel-default box" ng-click="getItemData()">
            <h2 ng-bind="item.cylinderTitle"></h2>
            <h4 ng-bind="item.cylinderArtist"></h3>
          </div>
        </div>
      </div>
    </div>



    <div id="modal--bg" class="light">

      <div id="cylinderFormInfo" class="modal__container panel panel-default">
        <h3 class="text-center">Update "{{ cylinderTitle }}"</h3>


        <form enctype="multipart/form-data" id="cylinderUpdateForm">
          <input ng-model="cylinderId" name="id" style="display: none;" readonly>

          <!-- Artist/Title/Record Label/Month Year -->
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
              <label class="col-sm-3 col-form-label">Cylinder Record Label</label>
              <div class="col-sm-9">
                <input ng-model="cylinderRecordLabel" class="form-control" type="text" name="recordLabel" value="">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Month/Year(MM/YYYY)</label>
              <div class="col-sm-9">
                <input ng-model="cylinderMonthYear" class="form-control" type="text" name="monthYear" value="">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">EQ Settings</label>
              <div class="col-sm-9">
                <input ng-model="cylinderEQSettings" class="form-control" type="text" name="eqSettings" value="">
              </div>
            </div>


            <!-- Number/Take/Mold/Condition/Box Number -->
            <div class="form-group row">

              <div class="col-sm-3">
                <label class="col-sm-6 col-form-label" for="condition">Number</label>
                <div class="col-sm-6">
                  <input ng-model="cylinderNumber" class="input-sm form-control" type="number" name="number" value="">
                </div>
              </div>

              <div class="col-sm-3">
                <label class="col-sm-6 col-form-label" for="condition">Take</label>
                <div class="col-sm-6">
                  <input ng-model="cylinderTake" class="input-sm form-control" type="number" name="take" value="">
                </div>
              </div>

              <div class="col-sm-3">
                <label class="col-sm-6 col-form-label" for="condition">Mold</label>
                <div class="col-sm-6">
                  <input ng-model="cylinderMold" class="input-sm form-control" type="number" name="mold" value="">
                </div>
              </div>

              <div class="col-sm-3">
                <label class="col-sm-6 col-form-label" for="condition">Condition</label>
                <div class="col-sm-6">
                  <input ng-model="cylinderCondition" class="input-sm form-control" type="number" name="condition" value="">
                </div>
              </div>

              <div class="col-sm-3">
                <label class="col-sm-6 col-form-label">Box Number</label>
                <div class="col-sm-6">
                  <input ng-model="cylinderMold" class="input-sm form-control" type="number" name="boxNumber" value="">
                </div>
              </div>

            </div>


            <!-- Playable/Unplayable/Flat Edge/ In UCSB -->
            <div class="form-group row">
              <div class="col-sm-2 col-sm-offset-1">
                <div class="checkbox">
                  <label>
                    <input ng-model="checkbox.playable" type="checkbox" name="playable">Cracked Playable
                  </label>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="checkbox">
                  <label>
                    <input ng-model="checkbox.unplayable" type="checkbox" name="unplayable">Cracked Unplayable
                  </label>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="checkbox">
                  <label>
                    <input ng-model="checkbox.flatEdge" type="checkbox" name="edge">Flat Edge
                  </label>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="checkbox">
                  <label>
                    <input ng-model="checkbox.ucsb" type="checkbox" name="ucsb">in UCSB db
                  </label>
                </div>
              </div>

            </div>

            <div class="form-group">
              <label for="artist">Comments</label>
              <textarea ng-model="cylinderComments" style="resize: none;" class="form-control" type="text" name="comments" value="" rows="7"></textarea>
              <label for="artist">Comments</label>
              <textarea ng-model="cylinderOtherComments" style="resize: none;" class="form-control" type="text" name="otherComments" value="" rows="7"></textarea>
            </div>
            <div class="form-inline pull-right">
              <div class="btn btn-default" ng-click="closeEdit()">Cancel</div>
              <button name="btn_update" id="deleteCylinder" class="btn btn-danger">Delete</button>
              <button name="btn_update" id="updateCylinder" class="btn btn-primary">Update</button>
            </div>
          </div>
        </form>
      </div>


      <div id="createNewCylinderForm" class="modal__container panel panel-default">
        <h3 class="text-center">Add New Cylinder</h3>
        <form enctype="multipart/form-data" id="createForm" method="POST">

          <!-- File Upload -->
          <label>Cylinder Picture(500x500)</label>
          <input type="file" name="cylinderTop" id="cylinderTop">
          <label>Cylinder Audio</label>
          <input type="file" name="cylinderAudio" id="cylinderAudio">

          <progress id="progressBar" max="100" style="width: 300px; height: 10px;"></progress>

          <input type="text" style="display: none;" id="randomCylinderId" name="id" readonly>

          <div class="col-sm-12">
            <!-- Artist/Title/Record Label/MonthYear/EQ Settings -->
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
              <label class="col-sm-3 col-form-label" for="artist">Cylinder Record Label</label>
              <div class="col-sm-9">
                <input class="form-control" type="text" name="recordLabel" value="">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label" for="artist">Month/Year(MM/YYYY)</label>
              <div class="col-sm-9">
                <input class="form-control" type="text" name="monthYear" value="">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label" for="artist">EQ Settings</label>
              <div class="col-sm-9">
                <input class="form-control" type="text" name="eqSettings" value="">
              </div>
            </div>


            <!-- Number/Take/Mold/Condition/Box Number -->
            <div class="form-group row">

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

              <div class="col-sm-3">
                <label class="col-sm-6 col-form-label" for="condition">Mold</label>
                <div class="col-sm-6">
                  <input class="input-sm form-control" type="number" name="mold" value="">
                </div>
              </div>

              <div class="col-sm-3">
                <label class="col-sm-6 col-form-label" for="condition">Condition</label>
                <div class="col-sm-6">
                  <input class="input-sm form-control" type="number" name="condition" value="">
                </div>
              </div>

              <div class="col-sm-3">
                <label class="col-sm-6 col-form-label" for="boxNumber">Box Number</label>
                <div class="col-sm-6">
                  <input class="input-sm form-control" type="number" name="boxNumber" value="">
                </div>
              </div>

            </div>



            <!-- Cracked/Flat Edge/In UCSB -->
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

            </div>

            <div class="form-group">
              <label for="artist">Comments</label>
              <textarea class="form-control" style="resize: none;" type="text" name="comments" value="" rows="7"></textarea>
              <label for="artist">Other Comments</label>
              <textarea class="form-control" style="resize: none;" type="text" name="otherComments" value="" rows="7"></textarea>
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
