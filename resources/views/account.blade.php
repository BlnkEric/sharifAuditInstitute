@extends('layouts.app')

<div class="container-fluid accountContainer">
    <div class="container">
        <div class="row">
            {{-- Image Holder --}}
            <div class="col-12 col-md-6">
                <section>
                    <span>LogoName</span> <span class="me-3">عموی شاهین</span>
                </section>
                <section>
                    <h1>به سایت ارش خوش امدید</h1>
                </section>
                <section>
                    <p>www.arash.com</p>
                </section>
            </div>
            <div class="col-12 col-md-6">
                <section id="loginTab">
                    <h2>لاگين</h2>
                    <form action="">
                        <input type="text" placeholder="Name">
                        <input type="text" placeholder="Password">
                        <button class="accountSubmitBtn">ورود</button>
                    </form>
                </section>
                <section id="registerTab">
                    <h2>رجيستر</h2>
                    <form action="">
                        <input type="text" placeholder="Name">
                        <input type="text" placeholder="Password">
                        <input type="text" placeholder="Confirm Password">
                        <input type="email" placeholder="Email">
                        <button class="accountSubmitBtn">ورود</button>
                    </form>
                </section>
                <button onclick="changeLoginPosition()" id="LoginChangeBtn">رجيستر</button>
                <button onclick="changeRegisterPosition()" id="RegisterChangeBtn">لاگين</button>
            </div>
        </div>
    </div>
</div>
<script>
    var loginTab = document.getElementById('loginTab');
    var registerTab = document.getElementById('registerTab');

    function changeLoginPosition() {
        registerTab.style.right = '20%'
        loginTab.style.right = '-500px';
    }

    function changeRegisterPosition() {
        registerTab.style.right = '120%'
        loginTab.style.right = '20%';
    }
</script>
