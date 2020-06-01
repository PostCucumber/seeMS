<template>
    <div class="flex flex-wrap items-start w-full">
        <button @click="toggleSelected(index)" v-for="(box, index) in rowCount*BOXES_PER_ROW" v-bind:key="index" :id="index" class="relative xl:w-1/12 lg:w-1/6 md:w-1/4 w-1/2 h-32 border-r border-b border-gray-400 font-thin hover:font-bold text-purple-800 focus:outline-none cursor-pointer">
            <p v-if="!boxIsHighlighted(index)" class="text-purple-800">+</p>
            <p v-if="boxIsHighlighted(index)" class="text-white">&ndash;</p>
        </button>
    </div>
</template>

<script>
    export default {
        props: [
            'rowCount',
            'selectedBoxes',
            'deviceSize'
        ],
        data: function() {
            return {
                BOXES_PER_ROW: 12,
                boxesInRow: [],
                newList: []
            };
        },
        mounted() {
            console.log('Grid component mounted.');
        },
        methods: {
            toggleSelected: function ($id) {
                if(this.boxIsHighlighted($id)) {
                    this.removeHighlight($id);
                    this.removeDeselectedElement($id);
                } else {
                    this.addHighlight($id);
                    this.$emit('addToList', $id);
                }
            },
            boxIsHighlighted: function ($id) {
                for(var i = 0; i < this.selectedBoxes.length; ++i) {
                    if($id == this.selectedBoxes[i]) {
                        return true;
                    }
                }
                return false;
            },
            removeHighlight: function ($id) {
                document.getElementById($id).classList.remove("bg-purple-800");
            },
            addHighlight: function ($id) {
                document.getElementById($id).classList.add("bg-purple-800");
            },
            removeDeselectedElement: function ($id) {
                for(var i = 0; i < this.selectedBoxes.length; ++i) {
                    if($id == this.selectedBoxes[i]) {
                        this.$emit('removeFromList', $id);
                    }
                }
            },
            clearGrid: function () {
                this.selectedBoxes.forEach(id => {
                    this.removeHighlight(id);
                });
                this.selectedBoxes.splice(0, this.selectedBoxes.length);
            },
            clearRow: function () {
                //rowCount is the row we're dealing with
                //we only want to dehighlight and remove boxes in the row
                //the rows are broken up into 12 boxes each
                //may have to have seperate conditonals for each screen size
                //if a box is selected and it is in this row, then deselect it
                // 1 0-11
                // 2 12-23

                var min = this.rowCount*12-12;
                var max = this.rowCount*12-1;

                var count = 0


                this.selectedBoxes.forEach(box => {
                    console.log(count);
                    if(box >= min && box <= max) {
                        console.log(box + " is in this row")
                        this.removeHighlight(box);
                        this.boxesInRow.push(this.selectedBoxes[count]);
                    } else {
                        console.log(box + " is not in this row")
                    }
                    ++count
                });
                
                count = 0;

                this.selectedBoxes.forEach(box => {
                    this.boxesInRow.forEach(boxToBeDeleted => {
                        if(box != boxToBeDeleted) {
                            console.log("Adding to new list: " + this.selectedBoxes[count]);
                            this.newList.push(this.selectedBoxes[count]);
                        } else {
                            console.log(this.selectedBoxes[count] + "Does not need to be deleted")
                        }
                    });
                    ++count;
                });
                console.log("New list: " + newList);
            }
        },
    }
</script>
<style scoped>
    button {
        transition: background-color 0.3s ease;
        -webkit-transition: background-color 0.3s ease;
        -moz-transition: background-color 0.3s ease;
        -o-transition: background-color 0.3s ease;
    }

    div {
        transition: height 0.5s ease;
    }
</style>