@extends('layouts.admin')

@section('title', 'ラテアートについて')

@section('content')

<main>
    <div class="term text-center">
    <ul>
        <li><h2>フリーポア</h2></li>
            <p>スチームしたミルクをエスプレッソの入ったカップに注ぎながら描く技法 ☕️</p>
            <p>定番なのは、ハートやリーフ模様など</p>
            <img src="{{ asset('images/term.jpeg') }}" alt="">
        <br>
        <br>
        <br>
        <li><h2>エッチング</h2></li>
            <p>ピックやスプーンをしようして描く技法 ☕️</p>
            <p>可愛い動物など、デザインはあなた次第</p>
            <img src="{{ asset('images/term02.jpeg') }}" alt="">
        <br>
        <br>
        <br>
        <li><h2>３D</h2></li>
            <p>泡立てたミルクをのせ、モチーフを立体的に描く技法 ☕️</p>
            <img src="{{ asset('images/term03.jpeg') }}" alt="">
        <br>
    </ul>
    </div>
    
</main>


@endsection