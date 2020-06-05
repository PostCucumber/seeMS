<template>
    <div class="flex flex-wrap mx-auto">
        <div v-for="(component, index) in chosenElements" v-bind:key="index" class="relative w-full flex items-center justify-center p-4 m-4 border-2 border-purple-800 rounded">
            <span
                @click="removeElement(index)"
                class="absolute flex items-center justify-center top-0 right-0 -mt-4 -mr-4 px-4 py-2 bg-red-600 text-white font-bold cursor-pointer rounded-full shadow"
            >
                X
            </span>
            <component
                :is="chosenElements[index]"
                :id="index"
                class="w-full"
            />
        </div>
        <confirmation-box
            v-if="confirming"
            ref="confirmation"
            @closeConfirmation="closeConfirmation"
            @clearGrid="clearGrid"
        >
        </confirmation-box>
        <grid
            ref="grid"
            v-bind:selected-boxes="selectedBoxes"
            v-bind:row-count="rowCount"
            v-bind:device-size="deviceSize"
            v-bind:boxes-in-row="boxesInRow"
            @addToList="addBox"
            @removeFromList="removeBox"
        >
        </grid>
        <row-control
            v-bind:row-count="rowCount"
            @addRow="addRow"
            @removeRow="removeRow"
        >
        </row-control>
        <element-helper
            @changeWidth="updateWidth"
            @clearGrid="clearGrid"
            @addElement="addElement"
            @getConfirmation="getConfirmation"
            v-bind:selected-boxes="selectedBoxes"
            v-bind:elements="elements"
        >
        </element-helper>
        <info-bar
            v-bind:chosen-elements="chosenElements"
            v-bind:selected-boxes="selectedBoxes"
        >
        </info-bar>
    </div>
</template>

<script>
    import grid from './Grid'
    import RowControl from './RowControl'
    import ElementPicker from './ElementPicker'
    import ElementHelper from './ElementHelper'
    import InfoBar from './InfoBar'
    import columns from './elements/Columns'
    import SearchBox from './elements/SearchBox'
    import navigation from './elements/Navigation'
    import ConfirmationBox from './ConfirmationBox'

    export default {
        props: {
            elements: Array,
        },
        data() {
            return {
                pickingElement: false,
                chosenElements: [],
                selectedBoxes: [],
                id: 0,
                rowCount: 0,
                deviceSize: null,
                boxesInRow: [],
                element: null,
                confirming: false
            }
        },
        components: {
            columns,
            SearchBox,
            navigation,
            grid,
            RowControl,
            ElementPicker,
            ElementHelper,
            InfoBar,
            ConfirmationBox
        },
        methods: {
            addBox: function (id) {
                this.selectedBoxes.push(id);
                console.log("Selected box " + id);
            },
            addElement: function (element) {
                this.chosenElements.push(element);
            },
            removeElement: function (index) {
                this.chosenElements.splice(index,1);
            },
            removeBox: function (id) {
                for(var i = 0; i < this.selectedBoxes.length; ++i) {
                    if(id == this.selectedBoxes[i]) {
                        this.selectedBoxes.splice(i,1);
                    }
                }
                console.log("Deselected box " + id);
            },
            addRow: function () {
                ++this.rowCount;
            },
            removeRow: function () {
                this.determineBoxesInRow();

                var boxesInRow = this.boxesInRow;

                this.selectedBoxes = this.selectedBoxes.filter(function(box) {
                    return !(boxesInRow.includes(box));
                });

                boxesInRow = []
                this.boxesInRow = boxesInRow;

                --this.rowCount;
            },
            determineBoxesInRow: function () {
                var min = this.rowCount*12-12;
                var max = this.rowCount*12-1;

                var count = 0;

                this.selectedBoxes.forEach(box => {
                    if(box >= min && box <= max) {
                        this.$refs.grid.removeHighlight(box);
                        this.boxesInRow.push(this.selectedBoxes[count]);
                    }

                    ++count
                });
            },
            togglePicker: function () {
                this.pickingElement = !this.pickingElement;   
            },
            updateWidth: function (size) {
                this.deviceSize = size;
            },
            getConfirmation: function () {
                this.confirming = true;
            },
            closeConfirmation: function () {
                this.confirming = false;
            },
            clearGrid: function () {
                this.$refs.grid.clearGrid();
            },
        },
        mounted() {
            console.log('Page Builder component mounted.');
            var page = document.getElementById("app");
            var opacity = 0.01;
            var fade = setInterval(frame, 10);
            function frame () {
                if (opacity > 1) {
                    clearInterval(fade);
                } else {
                    opacity = opacity*1.1;
                    page.style.opacity = opacity;
                }
            }
        },
    }
</script>
