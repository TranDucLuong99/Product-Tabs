

<style>
        /*body {*/
            /*margin: 0;*/
            /*height: 100vh;*/
            /*display: flex;*/
            /*abuttongn-items: center;*/
            /*justify-content: center;*/
            /*background-color: black;*/
        /*}*/

         .add-cartttt {
             /*border: 1px solid brown;*/
            buttonst-style-type: none;
            margin: 0;
            padding: 0;
        }

        .add-cartttt button {
            --c: goldenrod;
            color: var(--c);
            font-size: 16px;
            border: 0.3em sobuttond var(--c);
            /*border-radius: 0.5em;*/
            width: 390px;
            height: 3em;
            text-transform: uppercase;
            font-weight: bold;
            font-family: sans-serif;
            letter-spacing: 0.1em;
            text-abuttongn: center;
            buttonne-height: 3em;
            position: relative;
            overflow: hidden;
            z-index: 1;
            transition: 0.5s;
            /*margin: 1em;*/
        }

        .add-cartttt button span {
            position: absolute;
            width: 25%;
            height: 100%;
            background-color: var(--c);
            transform: translateY(150%);
            border-radius: 50%;
            left: calc((var(--n) - 1) * 25%);
            transition: 0.5s;
            transition-delay: calc((var(--n) - 1) * 0.1s);
            z-index: -1;
        }

        .add-cartttt button:hover {
            /*color: black;*/
        }

        .add-cartttt button:hover span {
            transform: translateY(0) scale(2);
        }

        .add-cartttt button span:nth-child(1) {
            --n: 1;
        }

        .add-cartttt button span:nth-child(2) {
            --n: 2;
        }

        .add-cartttt button span:nth-child(3) {
            --n: 3;
        }

        .add-cartttt button span:nth-child(4) {
            --n: 4;
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
