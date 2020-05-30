<template>
    <div class="absolute bottom-0 flex flex-wrap items-center justify-start w-full h-16">
        <div class="w-full h-full flex flex-wrap items-center bg-purple-800 p-4 text-gray-100">
            <div>
                Chosen elements:&nbsp;
                <span v-for="(element, index) in chosenElements" v-bind:key="index" class="inline">
                    {{ chosenElements[index] }}, 
                </span>
            </div>
            <div class="ml-10">
                Selected boxes: {{ selectedBoxes }}
            </div>
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
        mounted() {
            console.log('Info Bar component mounted.')
        },
    }
</script>
