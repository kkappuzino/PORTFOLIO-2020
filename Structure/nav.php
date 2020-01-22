

<div class="nav navbar navbar-right align-middle" id="myNavbar">
    <div class="switch-wrap">
      <div id="switch">
        <div id="circle"></div>
      </div>
    </div>
    <ul>
      <!-- using tags for href are useful for one pagers-->
      <li><a href="#home"><i class="far fa-circle" data-text="Home"></i></a></li>
      <li><a href="#skills"><i class="far fa-circle" data-text="Skills"></i></a></li>
      <li><a href="#works"><i class="far fa-circle" data-text="Art"></i></a></li>
      <li><a href="#art"><i class="far fa-circle" data-text="Art"></i></a></li>
      <li><a href="#me"><i class="far fa-circle" data-text="About Me"></i></a></li>
    </ul>
  </div>

 
<script>
$(document).ready(function(){
        // Add smooth scrolling to all links in navbar + footer link
        $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
            // Prevent default anchor click behavior
            event.preventDefault();
    
            // Store hash
            var hash = this.hash;
    
            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
            scrollTop: $(hash).offset().top
            }, 900, function(){
        
            // Add hash (#) to URL when done scrolling (default click behavior)
            window.location.hash = hash;
            });
        } // End if
        });
        
        $(window).scroll(function() {
        $(".slideanim").each(function(){
            var pos = $(this).offset().top;
    
            var winTop = $(window).scrollTop();
            if (pos < winTop + 600) {
                $(this).addClass("slide");
            }
        });
        });
    })
    
$("#switch").on('click', function () {
		if ($("body").hasClass("dark")) {
        $("body").toggleClass("dark");
        $("body").toggleClass("light");
        $("body").toggleClass("switched");
    }
    else if ($("body").hasClass("light")) {
        $("body").toggleClass("dark");
        $("body").toggleClass("light");
        $("body").toggleClass("switched");
		}

	});
</script>