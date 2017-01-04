<div class="content container">
<?

function create_image($cap)
{

@unlink("./assets/image1.png");

global $image;

$image = imagecreatetruecolor(200, 50) or die("Cannot Initialize new GD image stream");

$background_color = imagecolorallocate($image, 255, 255, 255);

$text_color = imagecolorallocate($image, 0, 255, 255);

$line_color = imagecolorallocate($image, 64, 64, 64);

$pixel_color = imagecolorallocate($image, 0, 0, 255);

imagefilledrectangle($image, 0, 0, 200, 50, $background_color);

for ($i = 0; $i < 3; $i++) {

imageline($image, 0, rand() % 50, 200, rand() % 50, $line_color);

}

for ($i = 0; $i < 1000; $i++) {

imagesetpixel($image, rand() % 200, rand() % 50, $pixel_color);

}

$text_color = imagecolorallocate($image, 0, 0, 0);

ImageString($image, 22, 30, 22, $cap, $text_color);

/************************************/

$_SESSION["captcha_string"] = $cap;

/*************************************/

imagepng($image, "./assets/image1.png");

}

create_image($data["cap"]);

echo "<img src='/assets/image1.png'>";

?>

<form action="/form/getInputs" method="POST">
  <div class="form-group">
    <div>
      <label for="exampleInputEmail1">Enter Captcha </label>
      <input class="form-control" name="captcha" type="captcha" id="captcha"  placeholder="Enter captcha" required>
    </div>
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
  </div>
  <div class="form-group">
    <label for="select">Example select</label>
    <select class="form-control" id="select" name="select" required>
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <div class="form-group">
    <label for="textarea">Example textarea</label>
    <textarea class="form-control" id="textarea" rows="3" name="textarea" required></textarea>
  </div>
  <fieldset class="form-group">
    <legend>Radio buttons</legend>
    <div class="form-check">
      <label class="form-check-label">
        <input type="radio" class="form-check-input" name="radios" id="radio1" value="option1" checked>
        Option one is this and that&mdash;be sure to include why it's great
      </label>
    </div>
    <div class="form-check">
    <label class="form-check-label">
        <input type="radio" class="form-check-input" name="radios" id="radio2" value="option2">
        Option two can be something else and selecting it will deselect option one
      </label>
    </div>
    <div class="form-check disabled">
    <label class="form-check-label">
        <input type="radio" class="form-check-input" name="radios" id="radio3" value="option3">
        Option three is not disabled
      </label>
    </div>
  </fieldset>
  <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input" id="check" name="check" required>
      Check me out
    </label>
  </div>
  <button type="submit" class="btn btn-primary" id="submit">Submit</button>
</form>
</div>