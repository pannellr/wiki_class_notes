<form method="get" action="update" >
   
  <input type="hidden" name="id" value="<?php echo $data[0]['id']; ?>" />
  
  <p>
    <label for="title">Title</label><br />
    <input name="title" value="<?php echo $data[0]['title']; ?>" />
  </p>
  
  <p>
    <label for="author">Author</label><br />
    <input name="author" value="<?php echo $data[0]['author']; ?>" />
  </p>

  <input type="submit" value="Update" />
</form>
