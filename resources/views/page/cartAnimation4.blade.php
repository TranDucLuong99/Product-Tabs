
<style>
        .add-cartttt{
            display: flex;
            justify-content: center;
            align-items: center;
            width: 390px;
        }
        .add-cart-animation{
            position: relative;
            display: inline-block;
            width: 390px;
            padding: 10px 30px;
            text-transform: uppercase;
            color: red;
            background: #6f6f6f;
            font-size: 16px;
            transition: 0.5s;

        }
        .add-cart-animation:hover{
            color: azure;
        }
        .add-cart-animation span{
            display: block;
            position: absolute;
            background: blue;
        }
        .add-cart-animation span:nth-child(1){
             left: 0;
             bottom: 0;
             width: 1px;
             height: 100%;
             transform: scaleY(0);
             transform-origin: top;
             transition: transform 0.5s;
         }
        .add-cart-animation:hover span:nth-child(1){
            transform: scaleY(1);
            transform-origin: bottom;
            transition: transform 0.5s;
        }

        .add-cart-animation span:nth-child(2){
            left: 0;
            bottom: 0;
            width: 100%;
            height: 1px;
            transform: scaleX(0);
            transform-origin: right;
            transition: transform 0.5s;
        }
        .add-cart-animation:hover span:nth-child(2){
            transform: scaleX(1);
            transform-origin: left;
            transition: transform 0.5s;
        }

        .add-cart-animation span:nth-child(3){
            right: 0;
            bottom: 0;
            width: 1px;
            height: 100%;
            transform: scaleY(0);
            transform-origin: top;
            transition: transform 0.5s;
            transition-delay: 0.5s;
        }
        .add-cart-animation:hover span:nth-child(3){
            transform: scaleY(1);
            transform-origin: bottom;
            transition: transform 0.5s;
            transition-delay: 0.5s;
        }
        .add-cart-animation span:nth-child(4){
            left: 0;
            top: 0;
            width: 100%;
            height: 1px;
            transform: scaleX(0);
            transform-origin: right;
            transition: transform 0.5s;
            transition-delay: 0.5s;
        }
        .add-cart-animation:hover span:nth-child(4){
            transform: scaleX(1);
            transform-origin: left;
            transition: transform 0.5s;
            transition-delay: 0.5s;
        }
    </style>
<div class="add-cartttt">
    <button type="submit" class="btn btn-info add-cart-animation">
        <span></span>
        <span></span>
        <span></span>
        <span></span>

        <b>{{$cart->text}}</b>
    </button>
</div>
