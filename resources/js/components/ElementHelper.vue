<template>
    <div v-if="this.selectedBoxes.length != 0" class="absolute w-full flex flex-wrap bottom-0 left-0 mb-20">
        <div class="relative h-64 w-1/2 rounded-lg shadow border-r border-b border-gray-200">
            <div v-if="this.selectedBoxes.length != 0" @click="this.clearGrid" class="absolute top-0 right-0 p-4 text-red-700 font-bold">Clear All</div>
            <div>
                <ElementPicker
                    v-bind:elements="elements"
                >
                </ElementPicker>
            </div>
        </div>
        <div class="absolute flex flex-wrap items-center justify-center h-32 w-32 mr-8 bottom-0 right-0 leading-none text-white text-center rounded-lg shadow bg-purple-800">
            <span class="uppercase w-full -mb-12">{{ deviceSize }}</span>
            <span class="w-full">{{ sizeDescription }}</span>
        </div>
    </div>
</template>

<script>
    import ElementPicker from './ElementPicker'

    export default {
        props: [  
            'selectedBoxes',
            'elements'
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
                deviceSize: null,
                sizeDescription: null
            };
        },
        components : {
            ElementPicker
        },
        methods: {
            getWindowWidth: function () {
                var $size = null;
                if(window.innerWidth >= 2560) {
                    this.deviceSize = "3XL";
                    this.sizeDescription = "2560px and up";
                    this.$emit('changeWidth', $size = "XXXL");
                } else if (window.innerWidth >= 1920) {
                    this.deviceSize = "2XL";
                    this.sizeDescription = "1920 to 2559px";
                    this.$emit('changeWidth', $size = "2XL");
                } else if (window.innerWidth >= 1280) {
                    this.deviceSize = "XL";
                    this.sizeDescription = "1280 to 1919px";
                    this.$emit('changeWidth', $size = "XL");
                } else if (window.innerWidth >= 1024) {
                    this.deviceSize = "LG";
                    this.sizeDescription = "1024 to 1279px";
                    this.$emit('changeWidth', $size = "LG");
                } else if (window.innerWidth >= 768) {
                    this.deviceSize = "MD";
                    this.sizeDescription = "768 to 1023px";
                    this.$emit('changeWidth', $size = "MD");
                } else {
                    this.deviceSize = "SM";
                    this.sizeDescription = "Under 768px"
                    this.$emit('changeWidth', $size = "SM")
                }
            },
            clearGrid: function () {
                this.$emit('clearGrid');
            }
        }
        
    }
</script>
