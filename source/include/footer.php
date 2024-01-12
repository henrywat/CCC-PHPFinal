    <footer class="w3-center w3-brown w3-opacity w3-padding-16">
        <p>
            <a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook-official w3-hover-opacity"></i></a>
            <a href="https://www.instagram.com/" target="_blank"><i class="fa fa-instagram w3-hover-opacity"></i></a>
            <a href="https://www.snapchat.com/" target="_blank"><i class="fa fa-snapchat w3-hover-opacity"></i></a>
            <a href="https://www.pinterest.com/" target="_blank"><i class="fa fa-pinterest-p w3-hover-opacity"></i></a>
            <a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter w3-hover-opacity"></i></a>
            <a href="https://www.linkedin.com/" target="_blank"><i class="fa fa-linkedin w3-hover-opacity"></i></a>
        </p>
        <!--div class="w3-content w3-container">
            <div class="w3-row">
                <div class="w3-third w3-left-align">
                    <ul>
                        <li><a href="index.html">Boozy Henry</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="menu.html">Menu</a></li>
                        <li><a href="gallery.html">Gallery</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </div>
                <div class="w3-third w3-left-align">
                    <ul>
                        <li><a href="menu.html#SHOOTERS">SHOOTERS</a></li>
                        <li><a href="menu.html#FORZEN">FORZEN</a></li>
                        <li><a href="menu.html#TEQUILA">TEQUILA</a></li>
                    </ul>
                </div>
                <div class="w3-third w3-left-align">
                    <ul>
                        <li>Edmonton, Calgary</li>
                        <li>Phone: +0 123 123456</li>
                        <li>Email: mail@mail.com</li>
                    </ul>
                </div>
            </div>
        </div-->
        <p>Create Career College - PHP&DB project by Henry Wat & Jason Lin @ 2024.</p>
    </footer>

    <script>
    // Change style of navbar on scroll
    window.onscroll = function() {myFunction()};
    function myFunction() {
        var navbar = document.getElementById("navbar");
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            topBar.className = "w3-top  w3-center"
            navbar.className = "w3-bar w3-card w3-animate-top w3-dark-grey";
        } else {
            topBar.className = "w3-top  w3-center w3-dark-grey"
            navbar.className = navbar.className.replace(" w3-card w3-animate-top w3-dark-grey", "");
        }
    }

    // Used to toggle the menu on small screens when clicking on the menu button
    function toggleFunction() {
        var x = document.getElementById("navbarsmall");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else {
            x.className = x.className.replace(" w3-show", "");
        }
    }
    </script>