@extends('front.layouts.app')

@include('components.navbar')

{{-- Css -> contactAbout.css --}}

<div class="container-fluid workWithUsMiniIntro">
    <div class="container">
        <div class="row">
            <section>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Distinctio molestias accusamus omnis labore
                    suscipit. Recusandae veritatis facere ipsa corrupti doloremque?</p>
            </section>
        </div>
    </div>
</div>

<div class="container-fluid workWithUsForm">
    <div class="container">
        <form action="">
            <div class="row">
                <div class="col-12 col-md-4">
                    <label for="">aras</label>
                    <input type="text">
                    <label for="">aras</label>
                    <input type="text">
                    <label for="">aras</label>
                    <input type="text">
                </div>
                <div class="col-12 col-md-4">
                    <label for="">Seifi</label>
                    <input type="text">
                    <label for="">Seifi</label>
                    <input type="text">
                    <label for="">Seifi</label>
                    <input type="text">
                </div>
                <div class="col-12 col-md-4">
                    <label for="">Khaste</label>
                    <input type="text">
                    <label for="">Khaste</label>
                    <input type="text">
                    <label for="">Khaste</label>
                    <input type="text">
                </div>
            </div>
            <div class="row">
                <label for="">MASSAGW</label>
                <textarea name="" id="" cols="30" rows="10"></textarea>
            </div>
        </form>

    </div>
</div>

@include('components.footer')
