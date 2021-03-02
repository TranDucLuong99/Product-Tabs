
<style>


        .add-cartttt{
            position:absolute;
            top:50%;
            left:50%;
            transform : translate(-50% ,-50%);
        }

        .add-cart-animation:link,
        .add-cart-animation:visited{
            text-decoration: none;
            text-transform:uppercase;
            position:relative;
            top:0;
            left:0;
            padding:20px 40px;
            border-radius:100px;
            display:inline-block;
            transition: all .5s;
        }

        .add-cart-animation-white{
            background:#fff;
            color:#000;
        }

        .add-cart-animation:hover{
            box-shadow:0px 10px 10px rgba(0,0,0,0.2);
            transform : translateY(-3px);
        }

        .add-cart-animation:active{
            box-shadow:0px 5px 10px rgba(0,0,0,0.2)
            transform:translateY(-1px);
        }

        .add-cart-animation{
            animation:comeFromBottom 1s ease-out .8s;
        }

        .add-cart-animation::after{
            content:"";
            text-decoration: none;
            text-transform:uppercase;
            position:absolute;
            width:100%;
            height:100%;
            top:0;
            left:0;
            border-radius:100px;
            display:inline-block;
            z-index:-1;
            transition: all .5s;
        }

        .add-cart-animation::after {
            background: #fff;
        }

        .add-cart-animation:hover::after {
            transform: scaleX(1.4) scaleY(1.6);
            opacity: 0;
        }

        @keyframes comeFromBottom{
            0%{
                opacity:0;
                transform:translateY(40px);
            }
            100%{
                opacity:1;
                transform:translateY(0);
            }
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
