@extends('front.layouts.app')

@include('components.navbar')
@include('components.mainHeroBox')
@include('components.industryItems')

<div class="container-fluid industryBigImageContainer">
    <div class="container">
        <img src="/images/WorkWithUs.jpg" alt="">
        <div class="row">
            <section>
                <h1 class="mb-3">ArashSeifi</h1>
                <h3>SALAM manam Arash , fekr konam esmam ro bedoni, hme ja hast</h3>
            </section>
        </div>
    </div>
</div>

<div class="container-fluid industryLinkToOtherContainer">
    <div class="row">
        <div class="col-12 col-md-4">
            <h1>Shahin</h1>
            <p>In shahin kos khol ke 1 INPUT nemitone dorost kone , miyad be man harf mizane
                1 roz rafte JER dadi khodet ro, code ro ANGOS kardi , natonesti
                bad miyay migi khodam hmaro mizanam< left bede
            </p>
            <button>ARASH</button>
        </div>
        <div class="col-12 col-md-4">
            <h1>Shahin</h1>
            <p>dadash to kheili ghavi hasti , ma ke chizi nagoftim ke to dargiri mikoni,
                age dava dari ke bahsesh jodas , zang bezan ba bache ha berizim onja, mashhad ro mesl babol, tasarof konim
            </p>
        </div>
        <div class="col-12 col-md-4">
            <h1>Shahin</h1>
            <p>In shahin kos khol ke 1 INPUT nemitone dorost kone , miyad be man harf mizane
                1 roz rafte JER dadi khodet ro, code ro ANGOS kardi , natonesti
                bad miyay migi khodam hmaro mizanam< left bede
            </p>
            <button>ARASH</button>
        </div>
    </div>
</div>
<hr>
<hr>
@include('components.footer')
