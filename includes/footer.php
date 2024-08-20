<div class= "footer">
         <div class="container">                                                        
            <div class="col-md-4 footer-grid footer-grid1">
                    <div class="Office Address">
                        <h4>About Us</h4>
                       <ul class="bottom-icons">
                       <li class="active"><a href="index.php">Home</a></li>
                <li><a href="about.php">  About </a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="eligibility.php">Eligibility & Rules </a></li>
                <li><a href="search.php"> Search </a></li>
                <li><a href="contact.php">Contact</a></li> 
                        </ul>
                     </div>
                </div>

                <div class="col-md-4 footer-grid footer-grid1">
                    <div class="Office Address">
                        <h4>Contact Details</h4>
                       <ul class="bottom-icons">
                        <?php

                            $ret=mysqli_query($con,"select * from tblpage where PageType='contactus' ");
                            $cnt=1;
                            while ($row=mysqli_fetch_array($ret)) {

                            ?>
                            <li><a class="home" href="#"><span> </span></a><?php  echo $row['PageDescription'];?></li>
                            <li><a class="mail" href="mailto:info@example.com"><span> </span><?php  echo $row['Email'];?></a></li>
                            <li><a class="mbl" href="#"><span> </span></a><?php  echo $row['MobileNumber'];?></li>   
                            <div class="clearfix"> </div><?php } ?> 
                            <br>  

                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2480.24367395998!2d-0.37909728852553815!3d51.563766306467414!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4876132cdb24b3cf%3A0x46dc2b9f8b8d6085!2s35%20Leamington%20Cres%2C%20Harrow%20HA2%209HH!5e0!3m2!1sen!2suk!4v1722097423961!5m2!1sen!2suk" width="200" height="100" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </ul>
                     </div>
                </div>
                
                <div class="col-md-4 footer-grid footer-grid2">
                    <div class=" Follow us here">
                    <h4>Connect with us</h4>
                        <ul class="bottom-icons two">
                            <li><a class="fbook" href="#"><span> </span></a>Facebook</li>
                            <li><a class="twt" href="#"><span> </span></a>Twitter</li>
                            <li><a class="iin" href="#"><span> </span></a>Linked in</li>    
                            <div class="clearfix"> </div>   
                        </ul>
                    </div>
     
                    </div>
                    <div class="clearfix"> </div>   
                </div>

                

    <div class="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="copy-right">Copyright &copy; MK Happy Home. All Rights Reserved</h4>
            </div>
        </div>
    </div>
  </div>


            </div>