<style>
</style>
<div>
    <section class="navigation">
        <div class="nav-container">
            <div class="brand">
                <a href="#!">Logo</a>
            </div>
            <nav>
                <div class="nav-mobile"><a id="nav-toggle" href="#!"><span></span></a></div>
                <ul class="nav-list">
                    <li>
                        <a href="#!">خانه</a>
                    </li>
                    <li>
                        <a href="#!">درباره ما</a>
                    </li>
                    <li>
                        <a href="#!">خدمات</a>
                        <ul class="nav-dropdown">
                            <li>
                                <a href="#!">Web Design</a>
                            </li>
                            <li>
                                <a href="#!">Web Development</a>
                            </li>
                            <li>
                                <a href="#!">Graphic Design</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#!">Pricing</a>
                    </li>
                    <li>
                        <a href="#!">Portfolio</a>
                        <ul class="nav-dropdown">
                            <li>
                                <a href="#!">Web Design</a>
                            </li>
                            <li>
                                <a href="#!">Web Development</a>
                            </li>
                            <li>
                                <a href="#!">Graphic Design</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#!">ارتباط با ما</a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

</div>
<script>
    (function($) { // Begin jQuery
        $(function() { // DOM ready
            // If a link has a dropdown, add sub menu toggle.
            $('nav ul li a:not(:only-child)').click(function(e) {
                $(this).siblings('.nav-dropdown').toggle();
                // Close one dropdown when selecting another
                $('.nav-dropdown').not($(this).siblings()).hide();
                e.stopPropagation();
            });
            // Clicking away from dropdown will remove the dropdown class
            $('html').click(function() {
                $('.nav-dropdown').hide();
            });
            // Toggle open and close nav styles on click
            $('#nav-toggle').click(function() {
                $('nav ul').slideToggle();
            });
            // Hamburger to X toggle
            $('#nav-toggle').on('click', function() {
                this.classList.toggle('active');
            });
        }); // end DOM ready
    })(jQuery); // end jQuery
</script>
