<div class="container-fluid faqContainer mt-5">
    <div style="background-image:url('/images/audit.jpg'); width: 100%; height: 500px; background-size: cover;">

    </div>
    <div class="container">
        <div class="row">

        </div>
        <div class="row">
            <h1>سوالات متداول</h1>
        </div>
        <div class="row">
            <section>
                <button class="accordion" onclick="toggleTheAccordiob(1)">سوال اول<span class="accordionArrow"><i
                            class="fa-solid fa-arrow-left"></i></span></button>
                <div class="panel">
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است،
                        چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی
                        مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه
                        درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری
                        را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این
                        صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و
                        زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی
                        اساسا مورد استفاده قرار گیرد.</p>
                </div>

                <button class="accordion" onclick="toggleTheAccordiob(2)">سوال دوم<span
                        class="accordionArrow"><i class="fa-solid fa-arrow-left"></i></span></button>
                <div class="panel">
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است،
                        چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی
                        مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه
                        درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری
                        را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این
                        صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و
                        زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی
                        اساسا مورد استفاده قرار گیرد.</p>
                </div>
                <button class="accordion" onclick="toggleTheAccordiob(3)">سوال سوم<span
                        class="accordionArrow"><i class="fa-solid fa-arrow-left"></i></span></button>
                <div class="panel">
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است،
                        چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی
                        مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه
                        درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری
                        را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این
                        صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و
                        زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی
                        اساسا مورد استفاده قرار گیرد.</p>
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
