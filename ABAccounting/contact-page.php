<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    sscanf($name, "%s", $firstName);


    $conn = new mysqli('localhost','root','','abaMessage');
    
	if($conn->connect_error){
		die("Connection Failed: " . $conn->connect_error);
	} else {
		$stmt = $conn->prepare("INSERT INTO messages(name, email, phone, message) VALUES(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $name, $email, $phone, $message);
        $stmt->execute();
		
        mail("cianboyle2004@gmail.com", "New Message", "Name: $name\nEmail: $email\nPhone: $phone\nMessage: $message", "From: example@example.com\r\nContent-Type: text/plain; charset=utf-8\r\nX-Mailer: PHP/" . phpversion());

		$stmt->close();
		$conn->close();
	}

?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style.css" rel="stylesheet">
        <link href="contact.css" rel="stylesheet">
        
        <title>Contact - Annette Boyle Acounting</title>
    </head>
    <body>
        <div class="contact-container">
            <div class="navbar">
                <div class="title"><a href="index.html">ABAccounting</a></div>
                <div class="navbarItem"><a href="index.html">Home</a></div>
                <div class="navbarItem"><a href="services-page.html">Services</a></div>
                <div class="navbarItem"><a href="clients-page.html">Clients</a></div>
                <div class="navbarItem"><a href="faq-page.html">FAQ</a></div>
                <div class="navbarItem"><a href="contact-page.html">Contact</a></div>
                <div class="navbarItem"><a href="about-page.html">About</a></div>
            </div>
              <main>
                <h1 class="header">Contact Us</h1>
                <hr>
              </main>
              

              <div class="box" id="message">
                <h1 class="message-header">Thank You  <?php echo $firstName; ?>!</h1>
                <div class="thank-you-msg">Your message has been sent<br><br>We will get back to you soon!
                </div>
                <div class="check">
                    <img src="Images/Icons/icon-check.png" alt="Green check mark" height="200">

                    <cite>Icon by Ra20Ga<br></cite>
                    <a href="https://similarpng.com/check-mark-green-tick-isolated-on-transparent-background-png/#getdownload" target="_blank">Original Image</a>
                </div>
                
                <div class="user-info">submitted email: <?php echo $email; ?> <br><br> submitted number: <?php echo $phone; ?></div>
              </div>


              <div class="box" id="email-phone">
                <div class="email">
                    <div class="contact-larger-text">
                        Email Address:
                    </div>
                    <br>
                    <div class="contact-info">
                        <a href="mailto:randomemail@gmail.com">randomemail@gmail.com</a>
                    </div>
                </div>
                <div class="phone">
                    <div class="contact-larger-text">
                        Phone Number:
                    </div><br>
                    <div class="contact-info">
                        <a href="tel:++353861234567">+353 86 123 4567</a>
                    </div>
                </div>
              </div>

              <div class="box" id="visit">
                <div class="visit-header">
                    Visit our Office
                </div>
                <div class="office-info">
                    Castlegoland<br>Portnoo<br>Co. Donegal<br>Ireland<br>F94 DY24
                </div>
                <div class="donegal-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11739.986793918085!2d-8.411872!3d54.8416965!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x485f0d4bf7acf8fd%3A0xfb3492b92fb118b1!2sCashelgolan%2C%20Co.%20Donegal%2C%20F94%20DY24!5e0!3m2!1sen!2sca!4v1556246073837!5m2!1sen!2sca"  width="350" height="270" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

                </div>
                <div id="office-hours">
                    <i><b>*Office Hours: Mon-Fri, 9am-5pm.</b></i>
                </div>
              </div>

              <footer>
                <div class="column">
                  <h2>Quick Links</h2>
                    <a class="footer-item" href="index.html">Home</a><br>
                    <a class="footer-item" href="faq-page.html">FAQ</a><br>
                    <a class="footer-item" href="contact-page.html">Contact</a><br>
                    <a class="footer-item" href="about-page.html">About</a>
      
              </div>
              <div class="column">
                  <h2>Contact Us</h2>
                  <a class="footer-item" href="mailto:example@example.com">contact@abacounting.com</a><br>
                  <a class="footer-item" href="tel:++353861234567">+353 86 123 4567</a>
              </div>
              <div class="column">
                  <h2>Our Office</h2>
                  <a class="footer-item" href="https://www.google.com/maps/place/Cashelgolan,+Co.+Donegal,+F94+DY24/@54.8601761,-8.791587,9z/data=!4m6!3m5!1s0x485f0d4bf7acf8fd:0xfb3492b92fb118b1!8m2!3d54.8416965!4d-8.411872!16s%2Fg%2F11c5343qsk" target="_blank">
                  Castlegoland, <br> Portnoo, <br> Co. Donegal <br> Ireland <br> F94 DY24
                </a>
              </div>
            </footer>
        </div>
    </body>
</html>




