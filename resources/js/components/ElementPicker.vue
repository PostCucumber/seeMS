<template>
    <div class="w-full mx-auto h-auto p-4">
        <div><h2>Choose Element</h2></div>
        <div class="flex flex-wrap mx-auto py-8">
            <div v-for="(element, index) in elements" v-bind:key="index" class="w-1/4">
                <div @click="addElement(element)" class="bg-gray-200 m-4 p-4 rounded cursor-pointer" :id="element">{{ elements[index] }}</div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [  
            'elements',
            'element'
        ],
        methods: {
            togglePicker: function () {
                this.$emit('togglePicker');
            },
            addElement: function ($element) {
                this.$emit('addElement', $element);
            }
        },
        mounted() {
            console.log('Element Picker component mounted.')
        },
    }
</script>
