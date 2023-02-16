<div class="container-fluid faqContainer">
    <div class="container">
        <div class="row">
            IMAGE
        </div>
        <div class="row">
            <h1>Hellow</h1>
        </div>
        <div class="row">
            <section>
                <button class="accordion" onclick="toggleTheAccordiob(1)">Section 1<span class="accordionArrow"><i
                            class="fa-solid fa-arrow-right"></i></span></button>
                <div class="panel">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>

                <button class="accordion" onclick="toggleTheAccordiob(2)">Section 2<span class="accordionArrow"><i
                            class="fa-solid fa-arrow-right"></i></span></button>
                <div class="panel">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>

                <button class="accordion" onclick="toggleTheAccordiob(3)">Section 3<span class="accordionArrow"><i
                            class="fa-solid fa-arrow-right"></i></span></button>
                <div class="panel">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>

            </section>
        </div>
    </div>
</div>

<script>
    var acc = document.getElementsByClassName("accordion");
    var accordionArrow = document.getElementsByClassName("accordionArrow")

    function toggleTheAccordiob(id) {
        acc[id - 1].classList.toggle("active");
        var panel = acc[id - 1].nextElementSibling;
        if (panel.style.maxHeight) {
            panel.style.maxHeight = null;
            accordionArrow[id - 1].classList.remove('rotateTheAccordionArrow')

        } else {
            panel.style.maxHeight = panel.scrollHeight + "px";
            accordionArrow[id - 1].classList.add('rotateTheAccordionArrow')

        }
    }
</script>
