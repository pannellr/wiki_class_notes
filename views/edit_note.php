<form method="get" action="update" >
   
  <input type="hidden" name="id" value="<?php echo $data[0]['id']; ?>" />
  
  <p>
    <label for="title">Title</label><br />
    <input name="title" value="<?php echo $data[0]['title']; ?>" />
  </p>
  
  <p>
    <label for="summary">Author</label><br />
    <input name="summary" value="<?php echo $data[0]['summary']; ?>" />
  </p>
  
  <p>
    <label for="content">Note</label><br />
    <input name="content" value="<?php echo $data[0]['summary']; ?>" />
  </p>

  <p>
    <label for="content">Note</label><br />
    <textarea class="ckeditor" name="content"><?php echo $data[0]['summary']; ?></textarea>
  </p>

  <input type="submit" value="Update" />
</form>
