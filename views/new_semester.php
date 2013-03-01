<h3>Create a new semester</h3>

<form method="GET" action="create" >
  <p>
    <label for="title">Title</label><br />
    <input name="title" />
  </p>
  <p>
    <label for="created_by">Creator User name</label><br />
    <input name="created_by" />
  </p>

  <form action="demo_form.asp">
  Start Date: <input type="date" name="start_date">
  <input type="submit">
</form>

  <form action="demo_form.asp">
  End Date: <input type="date" name="end_date">
  <input type="submit">
</form>
  <input type="submit" value="Create" />
  
</form>
