@extends('app')
@section('contenido')
<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;	
        font-family: Raleway, sans-serif;
    }
    
    body {
        background: linear-gradient(90deg, #C5E0F4, #6B9BCC);		
    }
    
    .container {
        display: flex;
        align-items: center;
        justify-content: center;
        /* min-height: 100vh; */
        margin-top: 3%;
    }
    
    .screen {		
        background: linear-gradient(90deg, #5478A4, #78A8C8);		
        position: relative;	
        height: 600px;
        width: 360px;	
        box-shadow: 0px 0px 24px #567996;
    }
    
    .screen__content {
        z-index: 1;
        position: relative;	
        height: 100%;
    }
    
    .screen__background {		
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 0;
        -webkit-clip-path: inset(0 0 0 0);
        clip-path: inset(0 0 0 0);	
    }
    
    .screen__background__shape {
        transform: rotate(45deg);
        position: absolute;
    }
    
    .screen__background__shape1 {
        height: 520px;
        width: 520px;
        background: #FFF;	
        top: -50px;
        right: 120px;	
        border-radius: 0 72px 0 0;
    }
    
    .screen__background__shape2 {
        height: 220px;
        width: 220px;
        background: #63A3D1;	
        top: -172px;
        right: 0;	
        border-radius: 32px;
    }
    
    .screen__background__shape3 {
        height: 540px;
        width: 190px;
        background: linear-gradient(270deg, #5478A4, #679EB8);
        top: -24px;
        right: 0;	
        border-radius: 32px;
    }
    
    .screen__background__shape4 {
        height: 400px;
        width: 200px;
        background: #7BA1C9;	
        top: 420px;
        right: 50px;	
        border-radius: 60px;
    }
    
    .login {
        width: 320px;
        padding: 30px;
        padding-top: 156px;
    }
    
    .login__field {
        padding: 20px 0px;	
        position: relative;	
    }
    
    .login__icon {
        position: absolute;
        top: 30px;
        color: #75A5C5;
    }
    
    .login__input {
        border: none;
        border-bottom: 2px solid #D1E4F4;
        background: none;
        padding: 10px;
        padding-left: 24px;
        font-weight: 700;
        width: 75%;
        transition: .2s;
    }
    
    .login__input:active,
    .login__input:focus,
    .login__input:hover {
        outline: none;
        border-bottom-color: #679EB8;
    }
    
    .login__submit {
        background: #fff;
        font-size: 14px;
        margin-top: 30px;
        padding: 16px 20px;
        border-radius: 26px;
        border: 1px solid #D3E8F4;
        text-transform: uppercase;
        font-weight: 700;
        display: flex;
        align-items: center;
        width: 100%;
        color: #48799D;
        box-shadow: 0px 2px 2px #567996;
        cursor: pointer;
        transition: .2s;
    }
    
    .login__submit:active,
    .login__submit:focus,
    .login__submit:hover {
        border-color: #679EB8;
        outline: none;
    }
    
    .button__icon {
        font-size: 24px;
        margin-left: auto;
        color: #75A5C5;
    }
    
    </style>
    <div>
        <livewire:Login/>
    </div>
@endsection