      
      <div class="row">
        <div class="col-md-12">


          <div class="box box-primary">
            <div class="box-body">
        <div class="btn-group pull-right">
            <a class="btn btn-default" data-toggle="modal" data-target="#addMain">Add MainMenu</a>
            <a class="btn btn-default" data-toggle="modal" data-target="#addSub">Add SubMenu</a>
        </div>

              <?php if(!empty($info_main_menu)){ ?>


              <?php $sno=1; $s=0; foreach ($info_main_menu as $value1): $allowGroupMain=''; ?>

              <h3 class="col-xs-12 box-header with-border">
                <?php echo $value1->PMENUNAME; ?>
                <div class="btn-group pull-right">
                  <a data-toggle="modal" data-target="#updateMain_<?php echo $s; ?>" class="btn btn-info btn-xs"><i class="fa fa-edit"></i></a>
                  <a data-toggle="modal" data-target="#deleteMain_<?php echo $s; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                </div>

              </h3>

              <?php $info_sub_menu = $this->main_db->view_single('inf_sub_menu', 'PMENUID', $value1->PMENUID); 

              if (!empty($info_sub_menu)) { ?>
              <table class="table table-bordered table-striped table-condensed table-hover">
                <tr>
                  <th>Id</th>
                  <th>Icon</th>
                  <th>Order By</th>
                  <th>Name</th>
                  <th>Link</th>
                  <th>Access Groups</th>
                  <th>Allow</th>
                  <th></th>
                </tr>

                <?php $allowGroup=''; foreach ($info_sub_menu as $val1): 

                $allowGroup = $this->options_model->allowGroup($val1->ALLOW_GROUP);

                ?>

                <tr>
                  <td><?php echo $val1->SMENUID; ?></td>
                  <td><?php echo $val1->MENUICON; ?></td>
                  <td><?php echo $val1->ORDER_BY; ?></td>
                  <td><?php echo $val1->ALLOW_GROUP; ?></td>
                  <td><?php echo $val1->MENUNAME; ?></td>
                  <td><?php echo $val1->MENULINK; ?></td>
                  <td><?php echo $val1->ALLOW; ?></td>
                  <td>
                    <div class="btn-group">
                      <a class="btn btn-info btn-xs" data-keyboard="true" data-toggle="modal" data-target="#edit_<?php echo $sno; ?>">
                        <i class="fa fa-edit" aria-hidden="true"></i>
                      </a>
                      <a class="btn btn-danger btn-xs" data-keyboard="true" data-toggle="modal" data-target="#delete_<?php echo $sno; ?>">
                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                      </a>
                    </div>
                  </td>                      
                </tr>

                <!-- Edit Modal -->
                <div id="edit_<?php echo $sno; ?>" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit SubMenu <b><?php echo $val1->MENUNAME; ?></b></h4>
                      </div>
                      <form action="" method="POST">
                        <div class="modal-body">

                          <div class="form-group">
                            <label>Id</label>
                            <input type="text" name="id" value="<?php echo $val1->SMENUID; ?>" class="form-control" readonly>
                          </div>

                          <div class="form-group">
                            <label>Order By</label>
                            <input type="number" name="info[ORDER_BY]" value="<?php echo $val1->ORDER_BY; ?>" class="form-control"x>
                          </div>

                          <div class="form-group">
                            <label>Menu Icon</label>
                            <input type="text" name="info[MENUICON]" value="<?php echo $val1->MENUICON; ?>" class="form-control">
                          </div>

                          <div class="form-group">
                            <label>Menu Link</label>
                            <input type="text" name="info[MENULINK]" value="<?php echo $val1->MENULINK; ?>" class="form-control">
                          </div>

                          <div class="form-group">
                            <label>Menu Name</label>
                            <input type="text" name="info[MENUNAME]" value="<?php echo $val1->MENUNAME; ?>" class="form-control">
                          </div>

                          <div class="form-group">
                            <label>Allow Groups</label>
                            <?php echo form_multiselect('allow[]', $groups, $allowGroup, 'class="form-control select2" style="width:100%;" required'); ?>
                          </div>

                          <?php $allow=[''=>'Select an Option','Y'=>'Allow','N'=>'Not Allow']; ?>         

                          <div class="form-group">
                            <label>Menu Allow</label>
                            <?php echo  form_dropdown('info[ALLOW]', $allow, $val1->ALLOW, 'class="form-control" required'); ?>
                          </div>

                        </div>

                        <div class="modal-footer">
                          <input type="submit" name="updateSub" value="Update" class="btn btn-success">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </form>
                    </div>

                  </div>
                </div>                     

                <!-- Delete Modal -->
                <div id="delete_<?php echo $sno; ?>" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Delete SubMenu <b><?php echo $val1->MENUNAME; ?></b></h4>
                      </div>
                      <div class="modal-body">
                        <p>Are You sure you want to delete submenu <b><?php echo $val1->MENUNAME; ?></b>?</p>
                      </div>
                      <div class="modal-footer">
                        <form action="" method="POST">
                          <input type="hidden" name="id" value="<?php echo $val1->SMENUID; ?>">
                          <input type="submit" name="deleteSub" value="Delete" class="btn btn-danger">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </form>
                      </div>
                    </div>

                  </div>
                </div>
                <?php $sno++; endforeach;   ?>
              </table> <?php } ?>

              <?php $allowGroupMain = $this->options_model->allowGroup($value1->ALLOW_GROUP); ?>

              <!-- Update Main Modal -->
              <div id="updateMain_<?php echo $s; ?>" class="modal fade" role="dialog">
                <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Update MainMenu <b><?php echo $value1->PMENUNAME; ?></b></h4>
                    </div>
                    <form action="" method="POST">
                      <div class="modal-body">
                        <div class="form-group">
                          <label>Menu id</label>
                          <input type="text" name="id" value="<?php echo $value1->PMENUID; ?>" class="form-control" readonly>
                        </div>      
                        <div class="form-group">
                          <label>Menu OrderBy</label>
                          <input type="number" name="info[ORDER_BY]" value="<?php echo $value1->ORDER_BY; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>Menu Icon</label>
                          <input type="text" name="info[PMENUICON]" value="<?php echo $value1->PMENUICON; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>Menu Name</label>
                          <input type="text" name="info[PMENUNAME]" value="<?php echo $value1->PMENUNAME; ?>" class="form-control">
                        </div>        
                        <div class="form-group">
                          <label>Menu Link</label>
                          <input type="text" name="info[PMENULINK]" value="<?php echo $value1->PMENULINK; ?>" class="form-control">
                        </div>        
                        <div class="form-group">
                          <label>Menu Allow Groups</label>
                          <?php echo form_multiselect('allow[]', $groups, $allowGroupMain, 'class="form-control select2" style="width:100%;" required'); ?>
                        </div> 
                        <div class="form-group">
                          <label>Menu Allow</label>
                          <?php echo form_dropdown('info[ALLOW]', $allow, $value1->ALLOW, 'class="form-control" required'); ?>
                        </div>                    
                      </div>
                      <div class="modal-footer">
                        <input type="submit" name="updateMain" class="btn btn-success" value="Update">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>                    

              <!-- Delete Modal -->
              <div id="deleteMain_<?php echo $s; ?>" class="modal fade" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Delete MainMenu <b><?php echo $value1->PMENUNAME; ?></b></h4>
                    </div>
                    <div class="modal-body">
                      <p>Are You sure you want to delete mainmenu <b><?php echo $value1->PMENUNAME; ?></b>?</p>
                    </div>
                    <div class="modal-footer">
                      <form action="" method="POST">
                        <input type="hidden" name="id" value="<?php echo $value1->PMENUID; ?>">
                        <input type="submit" name="deleteMain" value="Delete" class="btn btn-danger">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </form>
                    </div>
                  </div>

                </div>
              </div>


              <?php $s++; endforeach; } ?>
            </div>                  
          </div>
        </div> <!-- ./ box body -->
      </div> <!-- ./ close box -->

  <!-- Add Main Modal -->
  <div id="addMain" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Main Menu</h4>
        </div>
        <form action="" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <label>Menu OrderBy</label>
              <input type="number" name="info[ORDER_BY]" class="form-control">
            </div>
            <div class="form-group">
              <label>Menu Icon</label>
              <input type="text" name="info[PMENUICON]" class="form-control">
            </div>
            <div class="form-group">
              <label>Menu Name</label>
              <input type="text" name="info[PMENUNAME]" class="form-control">
            </div>        
            <div class="form-group">
              <label>Menu Link</label>
              <input type="text" name="info[PMENULINK]" class="form-control">
            </div>        
            <div class="form-group">
              <label>Menu Allow Groups</label>
              <?php echo form_multiselect('allow[]', $groups, '', 'class="form-control select2" style="width:100%;" required'); ?>
            </div> 
            <div class="form-group">
              <label>Menu Allow</label>
              <?php echo form_dropdown('info[ALLOW]', $allow, '', 'class="form-control" required'); ?>
            </div>                    
          </div>
          <div class="modal-footer">
            <input type="submit" name="addMain" class="btn btn-success" value="Add">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Add SubMenu Modal -->
  <div id="addSub" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Sub Menu</h4>
        </div>
        <form action="" method="POST">
          <div class="modal-body">

            <div class="form-group">
              <label>Main Menu</label>
              <?php echo  form_dropdown('info[PMENUID]', $mainMenu, '', 'class="form-control select2" style="width:100%;" required'); ?>
            </div>

            <div class="form-group">
              <label>Order By</label>
              <input type="number" name="info[ORDER_BY]" class="form-control"x>
            </div>

            <div class="form-group">
              <label>Menu Icon</label>
              <input type="text" name="info[MENUICON]" class="form-control">
            </div>

            <div class="form-group">
              <label>Menu Link</label>
              <input type="text" name="info[MENULINK]" class="form-control">
            </div>

            <div class="form-group">
              <label>Menu Name</label>
              <input type="text" name="info[MENUNAME]" class="form-control">
            </div>

            <div class="form-group">
              <label>Allow Groups</label>
              <?php echo form_multiselect('allow[]', $groups, '', 'class="form-control select2" style="width:100%;" required'); ?>
            </div>

            <div class="form-group">
              <label>Menu Allow</label>
              <?php echo  form_dropdown('info[ALLOW]', $allow, '', 'class="form-control" required'); ?>
            </div>

          </div>

          <div class="modal-footer">
            <input type="submit" name="addSub" value="Add" class="btn btn-success">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>

    </div>
  </div>  