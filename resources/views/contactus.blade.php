@extends('layouts.app')
@include('components.navbar')

<div class="container-fluid contactContainer">
    <div class="container">
        <div class="row">
            <h1>Arash</h1>
        </div>
        <div class="row contactUsRow">
            <div class="col-12 col-md-4">
                <section>
                    aaaa
                </section>
                <h3>Arash</h3>
                <div>
                    <h4>ARASHTItle</h4>
                    <p class="mt-2">ArashLorem Lorem, ipsum dolor.</p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <section>
                    aaaa
                </section>
                <h3>Arash</h3>
                <div>
                    <h4>ARASHTItle</h4>
                    <p class="mt-2">ArashLorem Lorem, ipsum dolor.</p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <section>
                    aaaa
                </section>
                <h3>Arash</h3>
                <div>
                    <h4>ARASHTItle</h4>
                    <p class="mt-2">ArashLorem Lorem, ipsum dolor.</p>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Form --}}
<div class="container-fluid contactUsFormContainer">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <section>
                    <h1>Message Arash</h1>
                    <p class="mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis perferendis tempora
                        deserunt vero sit molestiae cumque optio distinctio illo nulla.</p>
                </section>
            </div>
            <div class="col-12 col-md-6">
                <form action="" class="contactUsForm">
                    <div>
                        <label for="name">Name</label>
                        <input type="text" name="name" class="ms-3" placeholder="Name"><input type="text">
                    </div>
                    <div>
                        <input type="text" name="name" class="ms-3" placeholder="Name">
                    </div>
                    <div>
                        <label for="message">message</label>
                        <textarea name="message" cols="30" rows="10" placeholder="Describe yourself here..."></textarea>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('components.footer')
