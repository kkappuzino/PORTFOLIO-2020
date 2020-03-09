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
    </script>
</body>