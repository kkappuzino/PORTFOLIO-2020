</div>

    <script>
        // Get all horizontal scroll element
        var horizontals = document.querySelectorAll('.section--horizontal');

        // For each horizontal scroll element, apply the effect
        horizontals.forEach(function (horizontal) {
        
        // Get the inner element
        var inner = horizontal.querySelector('.section__inner');

        // When the user scroll and an animation frame is available
        window.addEventListener('scroll', function() {
            window.requestAnimationFrame(function() {
            
            // The distance to scroll inside the horizontal element
            // is its height - the window's height
            var toGo = horizontal.offsetHeight - window.innerHeight;
            
            // The scroll position inside the element
            // is the scroll position - the element's distance from the top
            var position = window.scrollY - horizontal.offsetTop;
            
            // The progression between 0 & 1 is the scroll position
            // inside the element divided by the distance to scroll
            var progression = (position / toGo);

            // If progression is between 0 & 1 that means we are viewing
            // the section so fix it
            if (progression > 0 && progression < 1) {
                horizontal.classList.add('section--isFixed');
            } else { // Don't fix it
                horizontal.classList.remove('section--isFixed');
            }

            // If the progression is above 1 that means the
            // section has been completly scrolled
            if (progression >= 1) {
                horizontal.classList.add('section--isScrolled');
            } else {
                horizontal.classList.remove('section--isScrolled');
            }
            
            // Set the translation for the element
            setTranslateX(inner, progression);
            });
        });
        });

        function setTranslateX(element, progression) {
        // Limit the progression factor between 0 & 1
        if (progression > 1) {
            progression = 1;
        } else if (progression < 0) {
            progression = 0;
        }
        
        // The size to move is the element width minus the window width
        var toMove = element.offsetWidth - window.innerWidth;
        
        // The transform factor is the size to move multiplied by the progression
        var transform = (-1 * toMove * progression) + 'px';
        element.style.transform = 'translateX(' + transform + ')';
        }



        // Typewriter.js
        // https://github.com/ronv/Typewriter.js

        $.fn.typewriter = function() {
        this.each(function() {
            var c = $(this),
            b = c.html(),
            a = 0,
            d = 0;
            c.html("");
            var e = function() {
            if ("<" == b.substring(a, a + 1)) {
                var f = new RegExp(/<span class="instant"/),
                g = new RegExp(/<span class="clear"/);
                if (b.substring(a, b.length).match(f)) a += b.substring(a, b.length).indexOf("</span>") + 7;
                else if (b.substring(a, b.length).match(g)) d = a, a += b.substring(a, b.length).indexOf("</span>") + 7;
                else
                for (;
                    ">" != b.substring(a, a + 1);) a++
            }
            c.html(b.substring(d, a++) + (a & 1 ? "_" : ""));
            a >= b.length || setTimeout(e, 70 + 100 *
                Math.random())
            };
            e()
        });
        return this
        };
        $(".terminal").typewriter();
        
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















class Demo {
  constructor() {
    this.initSVG();
    this.initCursor();
    this.initHovers();
  }
  
  initSVG(){
    $(document).mousemove(function(event){
  
  $("mask polygon").each(function(index, element){
    
    var xPos = (event.clientX/$(window).width())-0.5,
       yPos = (event.clientY/$(window).height())-0.5,
       box = element;
  
  TweenLite.to(box, 1, {
    rotationY: xPos * 100, 
    rotationX: yPos * 100,
    ease: Power1.easeOut,
  });
    
  })  
});
  }

  initCursor() {
    const { Back } = window;
    this.outerCursor = document.querySelector(".circle-cursor--outer");
    this.innerCursor = document.querySelector(".circle-cursor--inner");
    this.outerCursorBox = this.outerCursor.getBoundingClientRect();
    this.outerCursorSpeed = 0;
    this.easing = Back.easeOut.config(1.7);
    this.clientX = -100;
    this.clientY = -100;
    this.showCursor = false;

    const unveilCursor = () => {
      TweenMax.set(this.innerCursor, {
        x: this.clientX,
        y: this.clientY
      });
      TweenMax.set(this.outerCursor, {
        x: this.clientX - this.outerCursorBox.width / 2,
        y: this.clientY - this.outerCursorBox.height / 2
      });
      setTimeout(() => {
        this.outerCursorSpeed = 0.2;
      }, 100);
      this.showCursor = true;
    };
    document.addEventListener("mousemove", unveilCursor);

    document.addEventListener("mousemove", e => {
      this.clientX = e.clientX;
      this.clientY = e.clientY;
    });

    const render = () => {
      TweenMax.set(this.innerCursor, {
        x: this.clientX,
        y: this.clientY
      });
      if (!this.isStuck) {
        TweenMax.to(this.outerCursor, this.outerCursorSpeed, {
          x: this.clientX - this.outerCursorBox.width / 2,
          y: this.clientY - this.outerCursorBox.height / 2
        });
      }
      if (this.showCursor) {
        document.removeEventListener("mousemove", unveilCursor);
      }
      requestAnimationFrame(render);
    };
    requestAnimationFrame(render);
  }

  initHovers() {
    this.body = document.querySelector('body');

    const handleMouseEnter = e => {
      this.isStuck = true;
      const target = e.currentTarget;
      const box = target.getBoundingClientRect();
      this.outerCursorOriginals = {
        width: this.outerCursorBox.width,
        height: this.outerCursorBox.height
      };
      TweenMax.to(this.outerCursor, 0.2, {
        x: box.left,
        y: box.top,
        width: box.width,
        height: box.height,
        opacity: 0.6,
        borderColor: "#000"
      });
    };

    const handleMouseLeave = () => {
      this.isStuck = false;
      TweenMax.to(this.outerCursor, 0.2, {
        width: this.outerCursorOriginals.width,
        height: this.outerCursorOriginals.height,
        opacity: 0.2,
        borderColor: "#000"
      });
    };

    const mainNavHoverTween = TweenMax.to(this.outerCursor, 0.3, {
      backgroundColor: "#ff6161",
      ease: this.easing,
      paused: true,
      width: 60,
      height: 60,
      opacity: 0.2,
    });

    const mainNavHoverTween1 = TweenMax.to(this.outerCursor, 0.3, {
      backgroundColor: "#6361ff",
      ease: this.easing,
      paused: true,
      width: 60,
      height: 60,
      opacity: 0.2,
    });


    const mainNavMouseEnter = () => {
      this.outerCursorSpeed = 0;
      TweenMax.set(this.innerCursor, { opacity: 0 });
      if(this.body.classList.contains("light")){
        mainNavHoverTween.play();
      }else{
        mainNavHoverTween1.play();
      }
    };

    const mainNavMouseLeave = () => {
      this.outerCursorSpeed = 0.2;
      TweenMax.set(this.innerCursor, { opacity: 1 });
      mainNavHoverTween.reverse();
      mainNavHoverTween1.reverse();
    };

    const mainNavLinks = document.querySelectorAll("a, #circle");
    mainNavLinks.forEach(item => {
      item.addEventListener("mouseenter", mainNavMouseEnter);
      item.addEventListener("mouseleave", mainNavMouseLeave);
    });


/*
    this.section = document.querySelector('section');

    if(this.section.hasId("design")){

      const handleMouseEnter2 = e => {
        this.isStuck = true;
        const target = e.currentTarget;
        const box = target.getBoundingClientRect();
        this.outerCursorOriginals = {
          width: this.outerCursorBox.width,
          height: this.outerCursorBox.height
        };
        TweenMax.to(this.outerCursor, 0.2, {
          x: box.left,
          y: box.top,
          width: box.width,
          height: box.height,
          opacity: 0.8,
          borderColor: "#ff6161"
        });
      };

      const handleMouseLeave2 = () => {
        this.isStuck = false;
        TweenMax.to(this.outerCursor, 0.2, {
          width: this.outerCursorOriginals.width,
          height: this.outerCursorOriginals.height,
          opacity: 0.2,
          borderColor: "#ff6161"
        });
      };

      const designPictureHoverTween = TweenMax.to(this.outerCursor, 0.3, {
        backgroundColor: "#fff",
        ease: this.easing,
        paused: true,
        width: 60,
        height: 40,
        opacity: 0.5,
      });

      const designPictureHoverTween1 = TweenMax.to(this.outerCursor, 0.3, {
        backgroundColor: "#333",
        ease: this.easing,
        paused: true,
        width: 60,
        height: 40,
        opacity: 0.5,
      });

      const designPictureMouseEnter = () => {
        this.outerCursorSpeed = 0;
        TweenMax.set(this.innerCursor, { opacity: 0 });
        if(this.body.classList.contains("light")){
          mainNavHoverTween.play();
        }else{
          mainNavHoverTween1.play();
        }
      };

      const designPictureMouseLeave = () => {
        this.outerCursorSpeed = 0.2;
        TweenMax.set(this.innerCursor, { opacity: 1 });
        mainNavHoverTween.reverse();
        mainNavHoverTween1.reverse();
      };

      const designPictureLinks = document.querySelectorAll(".pic");
      designPictureLinks.forEach(item => {
        item.addEventListener("mouseenter", designPictureMouseEnter);
        item.addEventListener("mouseleave", designPictureMouseLeave);
      });
    }*/
  }
}

const demo = new Demo();








var html = document.documentElement;
var body = document.body;

var scroller = {
  target: document.querySelector("#scroll-smooth"),
  ease: 0.5, // <= scroll speed
  endY: 0,
  y: 0,
  resizeRequest: 1,
  scrollRequest: 0,
};

var requestId = null;
TweenLite.set(scroller.target, {
  rotation: 0.01,
  force3D: true
});

window.addEventListener("load", onLoad);
function onLoad() {    
  updateScroller();  
  window.focus();
  window.addEventListener("resize", onResize);
  document.addEventListener("scroll", onScroll); 
}


function updateScroller() {  
  var resized = scroller.resizeRequest > 0;
  if (resized) {    
    var height = scroller.target.clientHeight;
    body.style.height = height + "px";
    scroller.resizeRequest = 0;
  }
      
  var scrollY = window.pageYOffset || html.scrollTop || body.scrollTop || 0;

  scroller.endY = scrollY;
  scroller.y += (scrollY - scroller.y) * scroller.ease;

  if (Math.abs(scrollY - scroller.y) < 0.05 || resized) {
    scroller.y = scrollY;
    scroller.scrollRequest = 0;
  }
  
  TweenLite.set(scroller.target, { 
    y: -scroller.y 
  });
  requestId = scroller.scrollRequest > 0 ? requestAnimationFrame(updateScroller) : null;
}

function onScroll() {
  scroller.scrollRequest++;
  if (!requestId) {
    requestId = requestAnimationFrame(updateScroller);
  }
}

function onResize() {
  scroller.resizeRequest++;
  if (!requestId) {
    requestId = requestAnimationFrame(updateScroller);
  }
}



    </script>
</body>