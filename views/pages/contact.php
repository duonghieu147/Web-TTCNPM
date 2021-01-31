<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/contact.css">

</head>

<body>

  <div class="contact">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6">
          <form>
            <div class="title">
              Liên hệ chúng tôi
            </div>
            <div class="title-border">
            </div>
            <div class="sub-title">
              Cho chúng tôi biết thắc mắc của bạn
            </div>
            <div class="form">
              <input type="text" placeholder="Full name">
            </div>
            <div class="form">
              <input type="text" placeholder="Your email">
            </div>
            <div class="form">
              <textarea rows="6" placeholder="Message"></textarea>
            </div>
            <input type="submit" value="SUBMIT">
          </form>

        </div>
        <div class="col-12 col-md-6">
          <div id="map"><img src="./asset/image/GoogleMap.PNG" alt=""></div>
        </div>
        <div class="col-12 col-md-4">
          <div class="card-contact">
            <img src="asset/icon/map.svg" alt="">
            <div class="info">
              <div class="text">Location</div>
              <p><?php echo $info->Address ?></p>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-4">
          <div class="card-contact">
            <img src="asset/icon/open-email.svg" alt="">
            <div class="info">
              <div class="text">Email</div>
              <p><?php echo $info->Email ?></p>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-4">
          <div class="card-contact">
            <img src="asset/icon/call.svg" alt="">
            <div class="info">
              <div class="text">Phone</div>
              <p>+ <?php echo $info->Phone ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


</body>

</html>