<template>
    <div class="relative flex items-center justify-end h-screen w-full text-white bg-no-repeat bg-cover bg-top" style="background-image:url('/images/eye.jpg')">
        <div id="box" class="absolute flex flex-wrap w-1/3">
            <h1 class="w-full leading-none text-shadow">seeMS<br></h1>
            <h3 @click="myMove()" class="w-full hover:font-bold leading-none text-shadow cursor-pointer">
                start building
                <svg xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="feather feather-arrow-right absolute inline mt-2 ml-2"
                >
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
            </h3>
        </div>
    </div>
</template>

<script>
    export default {
        props: {

        },  
        methods: {
            myMove: function () {
                var elem = document.getElementById("box");
                var coordinates = elem.getBoundingClientRect();
                var xCoordinate = coordinates.x;   
                var yCoordinate = coordinates.y;   
                var id = setInterval(frame, 10);
                function frame() {
                    if (xCoordinate == window.innerWidth) {
                        clearInterval(id);
                    } else {
                        xCoordinate = xCoordinate*1.03; 
                        elem.style.top = yCoordinate + 'px'; 
                        elem.style.left = xCoordinate + 'px'; 
                    }
                }
                this.fadeScreen();
                setTimeout(() => {  window.location.href="/builder/1"; }, 2500);
            },
            fadeScreen: function () {
                var page = document.getElementById("app");
                var opacity = 1.0;
                var fade = setInterval(frame, 10);
                function frame () {
                    if (opacity < 0) {
                        clearInterval(fade);
                    } else {
                        opacity = opacity - opacity/50;
                        page.style.opacity = opacity;
                    }
                }
            }
        },
        mounted() {
            console.log('Splash Page component mounted.');
            var page = document.getElementById("app");
            var opacity = 0.00001;
            var fade = setInterval(frame, 10);
            function frame () {
                if (opacity > 1) {
                    clearInterval(fade);
                } else {
                    opacity = opacity*1.1;
                    page.style.opacity = opacity;
                }
            }
        },
    }
</script>
