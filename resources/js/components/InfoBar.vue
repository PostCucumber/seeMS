<template>
    <div class="absolute bottom-0 flex items-center justify-start w-full h-16 bg-purple-800 p-4 text-gray-100">
        Chosen elements:&nbsp;
        <span v-for="(element, index) in chosenElements" v-bind:key="index" class="inline">
            {{ chosenElements[index] }}, 
        </span>
        <div class="ml-10">
            Selected boxes: {{ selectedBoxes }}
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
        data() {
            return {
            }
        },
        components: {
        },
        methods: {
        },
        mounted() {
            console.log('Info Bar component mounted.')
        },
    }
</script>
