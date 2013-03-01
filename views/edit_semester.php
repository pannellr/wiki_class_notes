<form method="get" action="update" >
   
  <input type="hidden" name="id" value="<?php echo $data[0]['id']; ?>" />
  
  <p>
    <label for="name">Name</label><br />
    <input name="name" value="<?php echo $data[0]['name']; ?>" />
  </p>

  <input type="submit" value="Update" />
</form>
