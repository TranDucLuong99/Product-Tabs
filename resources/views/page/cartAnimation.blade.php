
<style>
        .add-cartttt{
            position: relative;
            margin-top: 100px;
            background: #0c002b;
            /*background: red;*/
            width: 392px;
            height: 59px;
        }
        .add-cartttt > button{
            position:absolute;
            width: 392px;
            top:50%;
            left:50%;
            transform:translate(-50%,-50%);
            color:#1670f0;
            padding: 16px 32px;
            font-size:16px;
            /*letter-space:2px;*/
            background: radial-gradient(black, transparent);
            text-transform:uppercase;
            text-decoration:none;
            /*box-shadow:0 20px 50px rgba(0,0,0,0.5);*/
            overflow:hidden;
        }
        .add-cartttt > button::before{
            content:"";
            position:absolute;
            top:2px;
            left:2px;
            bottom:2px;
            width:50%;
            background:rgba(255,255,255,0.05);
        }

        .add-cartttt button span:nth-child(1){
            position:absolute;
            top:0;
            left:0;
            width:100%;
            height:2px;
            background: linear-gradient(to right, #0c002b, #1779ff);
            animation:animate1 1.25s linear infinite;
        }

        @keyframes animate1{
            0% { transform:translateX(-100%);}
            100% { transform:translateX(100%);}
        }

        .add-cartttt button span:nth-child(2){
            position:absolute;
            top:0;
            right:0;
            width:2px;
            height:100%;
            background: linear-gradient(to bottom, #0c002b, #1779ff);
            animation:animate2 1.25s linear infinite;
            animation-delay:0.625s;
        }

        @keyframes animate2{
            0% { transform:translateY(-100%);}
            100% { transform:translateY(100%);}
        }

        .add-cartttt button span:nth-child(3){
            position:absolute;
            bottom:0;
            right:0;
            width:100%;
            height:2px;
            background: linear-gradient(to left, #0c002b, #1779ff);
            animation:animate3 1.25s linear infinite;
        }

        @keyframes animate3{
            0% { transform:translateX(100%);}
            100% { transform:translateX(-100%);}
        }

        .add-cartttt button span:nth-child(4){
            position:absolute;
            top:0;
            left:0;
            width:2px;
            height:100%;
            background: linear-gradient(to top, #0c002b, #1779ff);
            animation:animate4 1.25s linear infinite;
            animation-delay:0.625s;
        }

        @keyframes animate4{
            0% { transform:translateY(100%);}
            100% { transform:translateY(-100%);}
        }
    </style>
<div class="add-cartttt">
    <button type="submit" class="btn btn-info add-cart-animation">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        {{--Add to Cart--}}
        <b>{{$cart->text}}</b>
    </button>
</div>

