<template>
    <div class="absolute w-full flex flex-wrap items-center h-screen text-center mx-auto">
        <div class="w-full">
            <h1 class="w-full">Click to add element</h1>
            <button @click="togglePicker()" class="flex items-center justify-center text-gray-400 hover:text-gray-800 hover:border-gray-800 focus:outline-none pb-4 mt-4 w-16 h-16 text-6xl border rounded-lg mx-auto">
                +
            </button>
        </div>
        <div v-if="pickingElement" class="absolute top-0 right-0 bottom-0 left-0 z-40 flex items-center w-full h-screen" style="background-color:rgba(0,0,0,0.25)">
            <div class="relative flex mx-auto w-2/3 items-center justify-center bg-gray-100 rounded shadow-lg">
                <button @click="togglePicker()" class="absolute top-0 right-0 py-4 px-5 font-bold focus:outline-none">X</button>
                <div class="w-full mx-auto h-auto p-10">
                    <div><h2>Choose Element</h2></div>
                    <div class="flex flex-wrap mx-auto py-8">
                        <div @click="togglePicker();addElement(elements,index);" v-for="(element, index) in elements" v-bind:key="index" class="w-1/2">
                            <div class="bg-gray-200 m-4 p-4 rounded cursor-pointer" :id="element">{{ elements[index] }}</div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </div>
</template>

<script>
    export default {
        props: [  
            'pickingElement',
            'elements',
        ],
        data() {
            return {
            }
        },
        components: {
        },
        methods: {
            togglePicker: function () {
                this.$emit('togglePicker');
            },
            addElement: function ($elements, $index) {
                console.log($elements);
                console.log($index);
                this.$emit('addElement', $elements, $index)
            }
        },
        mounted() {
            console.log('Element Picker component mounted.')
        },
    }
</script>
