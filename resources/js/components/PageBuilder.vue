<template>
    <div class="flex">
        <component v-for="(component, index) in chosenElements" v-bind:key="index" :is="chosenElements[index]" />
        <div class="w-full flex flex-wrap items-center h-screen text-center mx-auto">
            <div class="w-full">
                <h1 class="w-full">Click to add element</h1>
                <button @click="pickingElement = !pickingElement" class="flex items-center justify-center text-gray-400 hover:text-gray-800 hover:border-gray-800 focus:outline-none pb-4 mt-4 w-16 h-16 text-6xl border rounded-lg mx-auto">
                    +
                </button>
            </div>
            <div v-if="pickingElement" class="absolute top-0 right-0 bottom-0 left-0 z-40 flex items-center w-full h-screen" style="background-color:rgba(0,0,0,0.25)">
                <div class="relative flex mx-auto w-2/3 items-center justify-center bg-gray-100 rounded shadow-lg">
                    <button @click="pickingElement = !pickingElement" class="absolute top-0 right-0 py-4 px-5 font-bold focus:outline-none">X</button>
                    <div class="w-full mx-auto h-auto p-10">
                        <div><h2>Choose Element</h2></div>
                        <div class="flex flex-wrap mx-auto py-8">
                            <div @click="pickingElement = !pickingElement; chosenElements.push(elements[index])" v-for="(element, index) in elements" v-bind:key="index" class="w-1/2">
                                <div class="bg-gray-200 m-4 p-4 rounded cursor-pointer">{{ elements[index] }}</div>
                            </div>
                        </div>
                        <div>
                            <button @click="pickingElement = !pickingElement" class="rounded-full bg-blue-400 px-4 py-2 text-gray-100">Add</button>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
        <div class="absolute bottom-0 w-full p-4">
            <h2>
                Chosen elements: 
                <span v-for="(element, index) in chosenElements" v-bind:key="index">
                    {{ chosenElements[index] }}, 
                </span>
            </h2>
        </div>
    </div>
</template>

<script>
    import columns from './elements/Columns'
    import SearchBox from './elements/SearchBox'
    import navigation from './elements/Navigation'

    export default {
        props: {
            elements: Array,
        },
        components: {
            columns,
            SearchBox,
            navigation 
        },
        data() {
            return {
                pickingElement: false,
                chosenElements: []
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
    }
</script>
