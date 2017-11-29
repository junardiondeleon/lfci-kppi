<div class="box box-default ">
  <div class="box-header with-border">
    <h3 class="box-title">Comments (<?php echo count($comments)? count($comments) : '0'; ?>)</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
    </div>
  </div>
 
  <div class="box-body" style="">
     <?php if(count($comments)): ?>
          
    <ul class="timeline">
            <?php foreach ($comments as $comment): ?>
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-green">
                   <?php echo date('F d, Y h:i:s A', strtotime($comment->c_at)); ?>
                  </span>
            </li>
            
            
            <li>
              <i class="fa fa-comments bg-blue"></i>

              <div class="timeline-item">
               

                <h3 class="timeline-header"><a><?php echo $comment->firstname . ' ' . $comment->lastname; ?></a> </h3>

                <div class="timeline-body">
                 <?php echo nl2br($comment->remarks); ?>
                </div>
               
              </div>
            </li>
          
            
          
            <?php endforeach; ?> 
            
          </ul>
           <?php else: ?>
            
                <span class="label label-danger">No comment found!.</span>
            
          <?php endif ?>
     
  </div>


      <div class="box-footer">
        <?php if(!$confirmation_page): ?>
            <?php echo $sub_page_title_comment; ?>
        <?php endif; ?>    
      </div>      

  </div>
