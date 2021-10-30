@extends('layouts.admin')

@section('title', 'ラテアートについて')

@section('content')

<!--<div class="container">-->
<div class="term text-center">
        <h2 id="latte_kind_01">フリーポア/ Free Pour</h2>
            <p>スチームしたミルクをエスプレッソの入ったカップに注ぎながら描く技法<br><span class="english">Technique of drawing steamed milk while pouring it into a cup of espress.</span></p>
            <p>定番なのは、ハートやリーフ模様など<br><span class="english">The classics are Hearts and Leaf etc.</span></p>
            <img src="{{ asset('images/term.jpeg') }}" alt="">
        <br>
        <br>
        <br>
        <h2 id="latte_kind_02">エッチング/ Etching</h2>
            <p>ピックやスプーンをしようして描く技法<br><span class="english">Techniques for drawing with a Pick or Spoon.</span></p>
            <p>可愛い動物など、デザインはあなた次第<br><span class="english">Design is up to you, such as cute Animals.</span></p>
            <img src="{{ asset('images/term02.jpeg') }}" alt="">
        <br>
        <br>
        <br>
        <h2 id="latte_kind_03">３D</h2>
            <p>泡立てたミルクをのせ、モチーフを立体的に描く技法<br><span class="english">A technique to draw a motif three-dimensionally by putting frothed milk on it.</span></p>
            <p>飲んでしまうのが勿体ない衝動間違いなしww<br><span class="english">You will not be able to drink.lol</span></p>
            <img src="{{ asset('images/term03.jpeg') }}" alt="">
        <br>
    <br>
    <br>
    &laquo;  <a class="fs-5" href="/main">戻る/Back</a>
</div>
</div>
    


@endsection