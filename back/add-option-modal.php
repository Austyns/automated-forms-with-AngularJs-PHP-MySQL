
<div class="modal fade"  ng-repeat="ass in fields.fd" id="add{{ass.fd_id}}"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="myModalLabel"> Add Form Field   </h3>
      </div>
      <div class="modal-body">
      <form method="post" action="input.php?obj=formFields">
      
              <div class="form-group">
                      <label> Field  Title </label>
                          <div class="controls">
                                <input type="text" class="form-control" value="" name="fd_title" autocomplete="off" />
                                <input type="hidden" name="fd_form" value="<?php echo "$fm"; ?>"><input type="hidden" name="fd_agency" value=" {{forms.fm[0].fm_agency}}">
                        </div>
                   </div>


                  <div class="form-group">
                      <label >Input type </label>
                          <div class="controls">
                          <select class="form-control" name="fd_type">
                          	<option> Select Input type</option>
                          	<option ng-repeat="typ in inputs.typ" value="{{typ.typ_id}}">{{typ.typ_name}}</option>

                          </select>
                            </div>
                      </div>


                  <div class="form-group">
                      <label >Discription </label>
                          <div class="controls">
                              <textarea name="fd_discrip" class="form-control"></textarea>
                            </div>
                      </div>

                  <div class="form-group">
                      <div class="controls">
                                <input type="submit" value="Save & Update" class="btn btn-success">
                            </div>
                        </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
		
	