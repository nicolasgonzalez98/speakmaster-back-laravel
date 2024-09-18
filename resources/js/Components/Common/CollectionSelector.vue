<script>
    export default {
        name: 'CollectionSelector'
    }
</script>

<script setup>
import { computed, ref } from 'vue';

    defineProps({
        collection:{
            type: Array,
            required: true
        }
    })

    const currentSelection = ref(1)
    const selection = ref([])

    const handleAddToSelection = (e) => {
        e.preventDefault()
        return !selection.value.includes(currentSelection.value) ? selection.value.push(currentSelection.value): false;
        
    }

    const handlerRemoveSelection = (i) => {
        selection.value = selection.value.filter(item => selection.value.indexOf(item) !== i)
    }
</script>

<template>
    <select v-model="currentSelection">
        <option v-for="(item, index) in collection" :key="index">{{ item?.name }}</option>
    </select>
    <button @click="handleAddToSelection">Add</button>

    <div>
        <ul>
            <li v-for="(c,i) in selection" :key="i">{{c}} <span @click="handlerRemoveSelection(i)">Remove</span></li>
        </ul>
    </div>
</template>