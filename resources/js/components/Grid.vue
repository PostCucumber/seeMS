<template>
    <div class="flex flex-wrap items-start w-full">
        <button @click="toggleSelected(index)" v-for="(box, index) in rowCount*12" v-bind:key="index" :id="index" class="xl:w-1/12 lg:w-1/6 md:w-1/4 w-1/2 h-32 border-r border-b hover:bg-gray-500 focus:outline-none cursor-pointer">
            {{ highlighted }}
        </button>
    </div>
</template>

<script>
    export default {
        props: [
            'rowCount'
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
                console.log("Toggling selected on " + $id);
                if(this.boxIsHighlighted($id)) {
                    document.getElementById($id).classList.remove("bg-gray-500");
                    this.removeDeselectedElement($id);
                    console.log("Removed background color");
                } else {
                    document.getElementById($id).classList.add("bg-gray-500");
                    console.log("Applied background color");
                    this.highlighted.push($id);
                    console.log("Pushed " + $id + " to array");
                }
            },
            boxIsHighlighted: function ($id) {
                for(var i = 0; i < this.highlighted.length; ++i) {
                    if($id == this.highlighted[i]) {
                        console.log("You clicked a highlighted box");
                        this.$emit('removeFromList', $id);
                        return true;
                    }
                }
                this.$emit('addToList', $id);
                return false;
            },
            removeDeselectedElement: function ($id) {
                for(var i = 0; i < this.highlighted.length; ++i) {
                    if($id == this.highlighted[i]) {
                        console.log("Deleted " + this.highlighted[i]);
                        this.highlighted.splice(i,1);
                    }
                }
            }
        },
    }
</script>