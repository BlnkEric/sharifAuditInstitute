@extends('layouts.app')

<div class="container-fluid accountContainer">
    <div class="container">
        <div class="row">
            {{-- Image Holder --}}
            <div class="col-12 col-md-6">
                <section>
                    <span class="me-3">Logo picture</span><span>LogoName</span>
                </section>
                <section>
                    <h1>Arash</h1>
                </section>
                <section>
                    <p>www.arash.com</p>
                </section>
            </div>
            <div class="col-12 col-md-6">
                <section id="loginTab">
                    <h2>ArashSign</h2>
                    <form action="">
                        <input type="text" placeholder="Name">
                        <input type="text" placeholder="Password">
                        <button>Submit</button>
                    </form>
                </section>
                <section id="registerTab">
                    <h2>ArashSign</h2>
                    <form action="">
                        <input type="text" placeholder="Name">
                        <input type="text" placeholder="Password">
                        <input type="text" placeholder="Confirm Password">
                        <input type="email" placeholder="Email">
                        <button>Submit</button>
                    </form>
                </section>
                <button onclick="changeLoginPosition()" id="LoginChangeBtn">Register</button>
                <button onclick="changeRegisterPosition()" id="RegisterChangeBtn">Login</button>
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
        registerTab.style.right = '100%'
        loginTab.style.right = '20%';
    }
</script>
