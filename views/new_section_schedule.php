<h3>Create a new Schedule</h3>

<form method="GET" action="create" >
  
  <label for="monday">Monday</label>
  <input type="checkbox" name="monday" value="1">

  <label for="tuesday">Tuesday</label>
  <input type="checkbox" name="tuesday" value="1">
  
  <label for="wednesday">Wednesday</label>
  <input type="checkbox" name="wednesday" value="1">
  
  <label for="thursday">Thursday</label>
  <input type="checkbox" name="thursday" value="1">

  <label for="friday">Friday</label>
  <input type="checkbox" name="friday" value="1">

  <label for="saturday">Saturday</label>
  <input type="checkbox" name="monday" value="1">

  <label for="sunday">Sunday</label>
  <input type="checkbox" name="sunday" value="1">

  <p>
    <label for="start_date">Start Date:</label><br />
    <input type="date" name="start_date">
  </p>
 
  <p>
    <label for="end_date">End Date:</label><br />
    <input type="date" name="end_date">
  </p>

  <input type="submit" value="Create" />
</form>
