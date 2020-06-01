<template>
    <div class="flex flex-wrap mx-auto">
        <div v-for="(component, index) in chosenElements" v-bind:key="index" class="w-full p-4 m-4 border-2 border-purple-800 rounded">
            <component
                :is="chosenElements[index]"
                class="w-full"
            />
        </div>
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
                element: null
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
            InfoBar
        },
        methods: {
            addBox: function (id) {
                this.selectedBoxes.push(id);
                console.log("Selected box " + id);
            },
            addElement: function (element) {
                this.chosenElements.push(element);
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
            clearGrid: function () {
                this.$refs.grid.clearGrid();
            },
        },
        mounted() {
            console.log('Page Builder component mounted.')
        },
    }
</script>
