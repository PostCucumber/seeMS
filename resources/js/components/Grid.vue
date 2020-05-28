<template>
    <div class="flex flex-wrap items-start w-full">
        <button @click="toggleSelected(index)" v-for="(box, index) in rowCount*12" v-bind:key="index" :id="index" class="xl:w-1/12 lg:w-1/6 md:w-1/4 w-1/2 h-32 border-r border-b hover:bg-gray-500 focus:outline-none cursor-pointer">
            {{ selectedBoxes }}
        </button>
    </div>
</template>

<script>
    export default {
        props: [
            'rowCount',
            'selectedBoxes'
        ],
        data: function() {
            return {
                highlighted: []
            };
        },
        mounted() {
            console.log('Grid component mounted.');
        },
        methods: {
            toggleSelected: function ($id) {
                console.log("––––––––––––––––––");
                console.log("Box " + $id);
                console.log("––––––––––––––––––");
                if(this.boxIsHighlighted($id)) {
                    document.getElementById($id).classList.remove("bg-gray-500");
                    this.removeDeselectedElement($id);
                    console.log("Removed background color");
                } else {
                    document.getElementById($id).classList.add("bg-gray-500");
                    console.log("Applied background color");
                    this.$emit('addToList', $id);
                }
            },
            boxIsHighlighted: function ($id) {
                for(var i = 0; i < this.selectedBoxes.length; ++i) {
                    if($id == this.selectedBoxes[i]) {
                        console.log("You clicked a highlighted box");
                        return true;
                    }
                }
                return false;
            },
            removeDeselectedElement: function ($id) {
                for(var i = 0; i < this.selectedBoxes.length; ++i) {
                    if($id == this.selectedBoxes[i]) {
                        this.$emit('removeFromList', $id);
                    }
                }
            }
        },
    }
</script>