
<style>
        :root {
            --background: #E5FFB3;
            --background-accent: #DBF8A3;
            --background-accent-2: #BDE66E;
            --light: #92DE34;
            --dark: #69BC22;
            --text: #025600;
        }

        .add-cartttt{
            /*background-color: var(--background);*/
            /*background-image: linear-gradient(*/
            /*var(--background-accent-2) 50%,*/
            /*var(--background-accent) 50%*/
            /*), */
        linear-gradient(
        var(--background-accent) 50%,
        var(--background-accent-2) 50%
        );
            background-repeat: no-repeat;
            background-size: 100% 30px;
            background-position: top left, bottom left;
            /*min-height: 98vh;*/
        }

        .add-cartttt {
            display: block;
            width: 371px;
            margin: 0 auto 0 auto;
            /*position: absolute;*/
            /*left: 0;*/
            /*right: 0;*/
            /*top: 30vh;*/
        }

        .add-cart-animation {
            display: block;
            cursor: pointer;
            outline: none;
            border: none;
            background-color: var(--light);
            width: 371px;
            height: 50px;
            /*border-radius: 30px;*/
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text);
            background-size: 100% 100%;
            /*box-shadow: 0 0 0 7px var(--light) inset;*/
            /*margin-bottom: 15px;*/
        }

        .add-cart-animation:hover {
            background-image: linear-gradient(
                    145deg,
                    transparent 10%,
                    var(--dark) 10% 20%,
                    transparent 20% 30%,
                    var(--dark) 30% 40%,
                    transparent 40% 50%,
                    var(--dark) 50% 60%,
                    transparent 60% 70%,
                    var(--dark) 70% 80%,
                    transparent 80% 90%,
                    var(--dark) 90% 100%
            );
            animation: background 3s linear infinite;
        }

        @keyframes background {
            0% {
                background-position: 0 0;
            }
            100% {
                background-position: 400px 0;
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