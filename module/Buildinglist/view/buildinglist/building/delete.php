<?php
 $title = 'Delete building';
 $this->headTitle($title);
 ?>
 <h1><?php echo $this->escapeHtml($title); ?></h1>

 <p>Are you sure that you want to delete the
   '<?php echo $this->escapeHtml($building->getName()); ?>' building?
 </p>
 <?php
 
 $url = $this->url('building', array('action' => 'delete', 'id'=>$id)); ?>
 
 <form action="<?php echo $url; ?>" method="post">
 <div>
   <input type="submit" name="del" value="Yes" />
   <input type="submit" name="del" value="No" />
 </div>
 </form>