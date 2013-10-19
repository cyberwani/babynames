<!DOCTYPE html>
<html>
<body>
<div id="form">
 <!--- Check to see if data is in cache, use html5 numeric values date year --->
<form action="scraped_page.php" method="post" onsubmit="return submitIt();">
From Year: <input type="text" name="fromyear"  >
Until Year: <input type="text" name="untilyear"  >
Number of results: <input type="text" name="top" >
<input type="submit" value="Submit" name="submit">
</form>
</div>
</body>
</html>


