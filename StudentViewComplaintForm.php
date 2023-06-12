<!DOCTYPE html>
<html>
<head>

</head>
<body>



<form action="readform.php" method="post">
  <label>Post's ID </label><input type="text" name="postID"><br>
  <label>User ID </label><input type="text" name="userID"><br>
  

  <label for="type">Complaint type</label>
  <select name="type[]" multiple>
  <option value="Inappropriate">Inappropriate</option>
  <option value="Irrelevant content">Irrelevant content</option>
  <option value="Missing Information">Missing Information</option>
  <option value="Misleading Title">Misleading Title</option>
  </select><br>
  <label for="desc"> Description:</label><textarea name="desc" rows="10" cols="30"></textarea><br>
  <input type="submit" value="Submit">
  
</form>

</body>
</html>