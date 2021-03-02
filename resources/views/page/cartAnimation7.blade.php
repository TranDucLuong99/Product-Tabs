
<style>
        /*.add-cartttt{*/
            /*padding:0px;*/
            /*margin: 0px;*/
            /*background-color: #6D214F;*/
            /*width:100%;*/
            /*height:100vh;*/
        /*}*/
        .add-cartttt{
            /*position: absolute;*/
            /*top:50%;*/
            /*left:50%;*/
            /*transform: translate(-50%, -50%);*/
            width: 390px;
            /*height: 50px;*/
        }
        .add-cart-animation{
            width:390px;
            height:50px;
            background: linear-gradient(to left top, #c32c71 50%, #b33771 50%);
            border-style: none;
            color:#fff;
            font-size: 23px;
            letter-spacing: 3px;
            font-family: 'Lato';
            font-weight: 600;
            outline: none;
            cursor: pointer;
            position: relative;
            padding: 0px;
            overflow: hidden;
            transition: all .5s;
            box-shadow: 0px 1px 2px rgba(0,0,0,.2);
        }
        .add-cart-animation span{
            position: absolute;
            display: block;
        }
        .add-cart-animation span:nth-child(1){
            height: 3px;
            width:390px;
            top:0px;
            left:-200px;
            background: linear-gradient(to right, rgba(0,0,0,0), #f6e58d);
            border-top-right-radius: 1px;
            border-bottom-right-radius: 1px;
            animation: span1 2s linear infinite;
            animation-delay: 1s;
        }

        @keyframes span1{
            0%{
                left:-200px
            }
            100%{
                left:200px;
            }
        }
        .add-cart-animation span:nth-child(2){
            height: 390px;
            width: 3px;
            top:-70px;
            right:0px;
            background: linear-gradient(to bottom, rgba(0,0,0,0), #f6e58d);
            border-bottom-left-radius: 1px;
            border-bottom-right-radius: 1px;
            animation: span2 2s linear infinite;
            animation-delay: 2s;
        }
        @keyframes span2{
            0%{
                top:-70px;
            }
            100%{
                top:70px;
            }
        }
        .add-cart-animation span:nth-child(3){
            height:3px;
            width:200px;
            right:-200px;
            bottom: 0px;
            background: linear-gradient(to left, rgba(0,0,0,0), #f6e58d);
            border-top-left-radius: 1px;
            border-bottom-left-radius: 1px;
            animation: span3 2s linear infinite;
            animation-delay: 3s;
        }
        @keyframes span3{
            0%{
                right:-200px;
            }
            100%{
                right: 200px;
            }
        }

        .add-cart-animation span:nth-child(4){
            height:70px;
            width:3px;
            bottom:-70px;
            left:0px;
            background: linear-gradient(to top, rgba(0,0,0,0), #f6e58d);
            border-top-right-radius: 1px;
            border-top-left-radius: 1px;
            animation: span4 2s linear infinite;
            animation-delay: 4s;
        }
        @keyframes span4{
            0%{
                bottom: -70px;
            }
            100%{
                bottom:70px;
            }
        }

        .add-cart-animation:hover{
            transition: all .5s;
            transform: rotate(-3deg) scale(1.1);
            box-shadow: 0px 3px 5px rgba(0,0,0,.4);
        }
        .add-cart-animation:hover span{
            animation-play-state: paused;
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
