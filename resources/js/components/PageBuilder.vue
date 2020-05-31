<template>
    <div class="flex flex-wrap mx-auto">
        <component
            v-for="(component, index) in chosenElements"
            v-bind:key="index" :is="chosenElements[index]"
            class="w-full"
        />
        <grid
            ref="grid"
            v-bind:selected-boxes="selectedBoxes"
            v-bind:row-count="rowCount"
            v-bind:device-size="deviceSize"
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
        <element-picker
            v-if="false"
            v-bind:picking-element="pickingElement"
            v-bind:elements="elements"
            @togglePicker="togglePicker"
            @addElement="addElement"
        >
        </element-picker>
        <element-helper
            @changeWidth="updateWidth"
            @clearGrid="clearGrid"
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
                deviceSize: null
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
                --this.rowCount;
            },
            togglePicker: function () {
                this.pickingElement = !this.pickingElement;   
            },
            addElement: function (elements, index) {
                this.chosenElements.push(elements[index])
            },
            updateWidth: function (size) {
                this.deviceSize = size;
            },
            clearGrid: function () {
                this.$refs.grid.clearGrid();
            }
        },
        mounted() {
            console.log('Page Builder component mounted.')
        },
    }
</script>
