<?php  
  require_once('app/lib/change_name.php');
  require_once('models/m_list_foods.php');
  require_once('models/m_menus.php');
?>

<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>4 or more character</h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>List-Food <small>Create new a list food</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <?php  
            if (isset($_COOKIE['same']))
            {
            ?>
              <div class="alert alert-danger"><?php echo $_COOKIE['same']; ?></div>
            <?php  
            }
            ?>
          <div class="x_content">
            <br />

            <!-- form action -->
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="admin.html?page=store_list_foods">
              <!-- name -->
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Name<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="name" required="required" class="form-control col-md-7 col-xs-12"  pattern=".{3,50}" >
                </div>
              </div>
              <!--/name -->
              
              <!-- price -->
               <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Price<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="number" id="first-name" name="price" required="required" class="form-control col-md-7 col-xs-12" step="any">
                </div>
              </div>
              <!--/price-->
              
              <!-- id_menu -->
               <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Id Menu<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control col-md-7 col-xs-12" name="id_menu">
                    <?php  
                      $menu_curors = new M_menus;
                      $menus  = $menu_curors->read_menus();
                      foreach ($menus as $menu) {
                    ?>
                    <option value="<?php echo $menu->id; ?>"><?php echo $menu->name; ?></option>
                    <?php  
                      }
                    ?>

                  </select>
                  
                </div>
              </div>
              <!--/id_menu-->

              <!-- description -->
               <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Description<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                   <textarea id="demo" class="ckeditor" id="first-name" name="description" required="required" pattern=".{3,250}" class="form-control col-md-7 col-xs-12"></textarea>
                </div>
              </div>
              <!--/description-->

              <!--sort_oder -->
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" name="name" >Sort_oder<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="number" id="first-name" name="sort_oder" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <!--/sort_oder -->

              <!-- special -->
                <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" name="name" >Special<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <div id="hot" class="btn-group" data-toggle="buttons">
                  <label class="btn btn-default " data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                      <input type="radio" name="special" value="0" > &nbsp; No
                  </label>
                  <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                      <input type="radio" name="special" value="1"> Yes
                  </label>
            </div>
                </div>
              </div>
              <!--/special-->

              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button class="btn btn-primary" type="button"><a href="admin.html?page=list_foods" style="color: white">Cancel</a></button>
		              <button class="btn btn-primary" type="reset">Reset</button>
                  <button type="submit" name="create" class="btn btn-success">Submit</button>
                </div>
              </div>
            </form>
            <!-- /form action -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
