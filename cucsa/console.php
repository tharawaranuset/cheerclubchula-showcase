<div class="container main-container">
    
    <?php echo $_SESSION['alert_add']; ?>
    
      <div class="alert alert-primary alert-dismissible fade show" role="alert">
      <strong>News:<br></strong> 
              <?php 
              	for ($i = 0; $i < count($news_array); $i++) {
        echo $i+1 .'. '. $news_array[$i] . "<br>";  // แสดงข้อความจาก array
    }
              ?>
        
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

    <div class="mb-3">
  
        <span class="h4">
                Dashboard
        </span>

        <span class="float-right">
            
            <?php echo $show_in_progress_button; ?>
            
            <?php echo $show_deleted_button; ?>

            <button type="button" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#exampleModal">
               Add Code
            </button>

        </span>
    
    </div>
    
    <nav class="px-0">
        
      <div class="nav nav-tabs mx-0" role="tablist">
          
        <a class="nav-item nav-link active mx-0" id="nav-11-tab" data-toggle="tab" href="#nav-11" role="tab">1:1</a>
          
        <a class="nav-item nav-link mx-0" id="nav-11seq-tab" data-toggle="tab" href="#nav-11seq" role="tab">1:1 Seq</a>
          
        <a class="nav-item nav-link mx-0" id="nav-125-tab" data-toggle="tab" href="#nav-125" role="tab">1:25</a>
              
        <a class="nav-item nav-link mx-0" id="nav-mp-tab" data-toggle="tab" href="#nav-mp" role="tab">MP</a>
              
        <a class="nav-item nav-link mx-0" id="nav-baka-tab" data-toggle="tab" href="#nav-baka" role="tab">BAKA</a>
          
      </div>
        
    </nav>
    
    <div class="tab-content mb-5" id="nav-tabContent">
        
        <div class="tab-pane fade show active" id="nav-11" role="tabpanel"><?php echo $table11; ?></div>
        
        <div class="tab-pane fade" id="nav-11seq" role="tabpanel"><?php echo $table11seq; ?></div>
        
        <div class="tab-pane fade" id="nav-125" role="tabpanel"><?php echo $table125; ?></div>
            
        <div class="tab-pane fade" id="nav-mp" role="tabpanel"><?php echo $tableMP; ?></div>
            
        <div class="tab-pane fade" id="nav-baka" role="tabpanel"><?php echo $tableBAKA; ?></div>
        
    </div>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Add Code</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">

					<form method="post" enctype="multipart/form-data">

						<input type="hidden" name="action" value="add-code">

						<div class="form-group">

							<label for="type">Type</label>
							<select class="form-control" id="type" name="type" required>
								<option value="">Please Select</option>
								<option value="1">1:1</option>
								<option value="2">1:1 Sequence</option>
								<option value="3">1:25</option>
                                <option value="4">MP</option>
                                <option value="5">BAKA</option>

							</select>

						</div>
                        

					  <div class="form-group">

					    <label for="title">Title</label>

					    <input type="text" class="form-control" id="title" name="title" placeholder="Enter your code title" required>
				        <small id="titleHelp" class="form-text text-muted">Must represent pronunciation/visual of a code [for 1:1] e.g. ตลาดล่าง</small>

					  </div>
                        
					   <div class="form-group">

							<label for="category">Category (for 1:1 only)</label>
							<select class="form-control" id="category" name="category" required>
								
                                <?php echo $category_option; ?>

							</select>

						</div>

					  <div class="form-group">

					    <label for="description">Description</label>
					    <textarea class="form-control" name="description" id="description" placeholder="Enter your code description"></textarea>

					  </div>
                        
                        <div class="form-group">

					    <label for="comment">Comment</label>
                        <textarea class="form-control" name="comment" id="comment" placeholder="Enter your comment about this version"></textarea>

					   </div>

						<div class="form-group">
							<label for="fileUpload">Upload File (.bmp only)</label>
							<input type="file" class="form-control-file" id="fileUpload" name="fileUpload[]" multiple required>
                            <small id="fileUploadHelp" class="form-text text-muted">You can select multiple files for 1:1 sequence type (press Ctrl and select SEQUENTIALLY RENAMED files, up to 99 shots). Please select only one file for 1:1 and 1:25 type!</small>
						</div>

						<div class="text-right">
							<button type="submit" id="submit-form" class="btn btn-success">Submit</button>
						</div>

					</form>

	      </div>

	    </div>
	  </div>
	</div>


</div>
