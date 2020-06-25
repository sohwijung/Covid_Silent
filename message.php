<?php
include("includes/init.php");
$title = "Messages";
$db = open_sqlite_db("secure/messages.sqlite");

$messages = array();

if(isset($_POST["share"])) {
  $first_name = trim(filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING));
  $encouragement = trim(filter_input(INPUT_POST, 'encouragement', FILTER_SANITIZE_STRING));
  if ($first_name == "" && $encouragement == ""){
    array_push($messages, "Please enter a value for both fields.");
  } else if ($first_name == "") {
    array_push($messages, "Please enter a value for first name.");
  } else if ($encouragement == "") {
    array_push($messages, "Please enter a value for message.");
  } else {
    $sql = "INSERT INTO links (first_name, encouragement) VALUES (:first_name, :encouragement);";
    $params = array(":first_name" => $first_name, "encouragement" => $encouragement);
    $result = exec_sql_query($db , $sql, $params);

    if ($result) {
      array_push($messages, "Successfully uploaded message!");
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Covid Silent</title>
  <meta charset="utf-8"/>
  <link rel="stylesheet" type="text/css" href="theme.css">
  <script src="scripts/site.js" type="text/javascript"></script>
  <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
  </script>
</head>

<title>Covid Silent</title>

<body>
  <h1><a href="index.php">Covid Silent</a></h1>

<div class = "columnDisplay">
<div class="eachColumnDisplay">
  <div class = "centerImages">
    <img class="mySlidesSlow" src="masked_faces/1.jpg">
    <img class="mySlidesSlow" src="masked_faces/2.jpg">
    <img class="mySlidesSlow" src="masked_faces/3.jpg">
    <img class="mySlidesSlow" src="masked_faces/4.jpg">
    <img class="mySlidesSlow" src="masked_faces/5.jpg">
    <img class="mySlidesSlow" src="masked_faces/6.jpg">
    <img class="mySlidesSlow" src="masked_faces/7.jpg">
    <img class="mySlidesSlow" src="masked_faces/8.jpg">
    <img class="mySlidesSlow" src="masked_faces/9.jpg">
    <img class="mySlidesSlow" src="masked_faces/10.jpg">
    <img class="mySlidesSlow" src="masked_faces/11.jpg">
    <img class="mySlidesSlow" src="masked_faces/12.jpg">
    <img class="mySlidesSlow" src="masked_faces/13.jpg">
    <img class="mySlidesSlow" src="masked_faces/14.jpg">
    <img class="mySlidesSlow" src="masked_faces/15.jpg">
    <img class="mySlidesSlow" src="masked_faces/16.jpg">
    <img class="mySlidesSlow" src="masked_faces/17.jpg">
    <img class="mySlidesSlow" src="masked_faces/18.jpg">
    <img class="mySlidesSlow" src="masked_faces/19.jpg">
    <img class="mySlidesSlow" src="masked_faces/20.jpg">
    <img class="mySlidesSlow" src="masked_faces/21.jpg">
    <img class="mySlidesSlow" src="masked_faces/22.jpg">
    <img class="mySlidesSlow" src="masked_faces/23.jpg">
    <img class="mySlidesSlow" src="masked_faces/24.jpg">
    <img class="mySlidesSlow" src="masked_faces/25.jpg">
    <img class="mySlidesSlow" src="masked_faces/26.jpg">
    <img class="mySlidesSlow" src="masked_faces/27.jpg">
    <img class="mySlidesSlow" src="masked_faces/28.jpg">
    <img class="mySlidesSlow" src="masked_faces/29.jpg">
    <img class="mySlidesSlow" src="masked_faces/30.jpg">
    <img class="mySlidesSlow" src="masked_faces/31.jpg">
    <img class="mySlidesSlow" src="masked_faces/32.jpg">
    <img class="mySlidesSlow" src="masked_faces/33.jpg">
    <img class="mySlidesSlow" src="masked_faces/34.jpg">
    <img class="mySlidesSlow" src="masked_faces/35.jpg">
    <img class="mySlidesSlow" src="masked_faces/36.jpg">
    <img class="mySlidesSlow" src="masked_faces/37.jpg">
    <img class="mySlidesSlow" src="masked_faces/38.jpg">
    <img class="mySlidesSlow" src="masked_faces/39.jpg">
    <img class="mySlidesSlow" src="masked_faces/40.jpg">
    <script>carouselSlow()</script>
  </div>

  <div class="feedback_msg">
    <?php
      foreach ($messages as $message) {
        echo "<p>" . htmlspecialchars($message) . "</p>\n";
      }
    ?>
  </div>
<!--
<div class="columnDisplay">
  <div class="eachColumnDisplay"> -->
  <form method="post">
    <div class ="formcolumn">
      <div class ="eachformcolumn">
        <div class="box">
          <label for="encouragement"></label>
          <textarea name="encouragement" id="encourageMessage" class="message" onKeyUp="countChar()" maxlength="140" placeholder="Please share a word of encouragement"></textarea>
          <div id="charValue" class="charValue"></div>
          <script>countChar();</script>
        </div>
      </div>

      <div class ="eachformcolumn">
        <div class ="eachformcolumn1">
          <label for="first_name" ></label>
          <input type="textbox" class="firstname" name="first_name" placeholder="First Name"></input>
        </div>
        <div class ="eachformcolumn2">
            <button name="share" class="share">Share</button>
        </div>
      </div>
    </div>
  </form>

</div>

  <div class="eachColumnDisplay">
  <ul class = "all_messages">
    <?php
    $sql = "SELECT * FROM links ORDER BY id DESC;";
    $params = array();
    $results = exec_sql_query($db, $sql, $params)->fetchAll();

    foreach ($results as $result) { ?>
      <div class="eachLink">
        <div class ="eachFirstName"><?php echo "<p>" . htmlspecialchars($result[1]) . "</p>\n"; ?></div>
        <div class ="eachMessage"><?php echo "<p>" . htmlspecialchars($result[2]) . "</p>\n";?></div>
      </div>
    <?php } ?>
  </ul>

</div>
</div>

<div class="footer">
  <div class="eachfooter"><footer>Made with ❤️ by <a href="https://twitter.com/perewaripere" class="link">@pere</a> and <a href="https://www.linkedin.com/in/sohwijung/" class="link">@sohwijung</a></footer></div>
  <div class="eachfooter"><a href="http://twitter.com/share?text=An%20Awesome%20Link&url=http://www.google.com" class="twitter"> Share on Twitter </a></div>
</div>
</body>
</html>
