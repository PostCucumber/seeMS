<template>
    <div class="absolute w-full flex flex-wrap bottom-0 left-0 mb-20 ml-4">
        <div class="relative h-64 w-1/2 rounded-lg shadow">
        </div>
        <div class="absolute flex items-center justify-center h-32 w-32 mr-8 bottom-0 right-0 text-white uppercase rounded-lg text-5xl round shadow bg-purple-800">
            {{ deviceSize }}
        </div>
    </div>
</template>

<script>
    export default {
        props: [  
            'chosenElements',
            'index',
            'selectedBoxes'
        ],
        created() {
            window.addEventListener("resize", this.getWindowWidth);
        },
        destroyed() {
            window.removeEventListener("resize", this.getWindowWidth);
        },
        mounted() {
            console.log('Info Bar component mounted.');
            this.getWindowWidth();
        },
        data() {
            return {
                deviceSize: null
            };
        },
        methods: {
            getWindowWidth: function () {
                if(window.innerWidth >= 1280) {
                    this.deviceSize = "xl";
                } else if (window.innerWidth >= 1024) {
                    this.deviceSize = "lg";
                } else if (window.innerWidth >= 768) {
                    this.deviceSize = "md";
                } else {
                    this.deviceSize = "sm";
                }  
            }
        }
        
    }
</script>
