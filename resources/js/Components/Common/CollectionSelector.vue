<script>
    export default {
        name: 'CollectionSelector'
    }
</script>

<script setup>
import { ref } from 'vue';

    defineProps({
        collection:{
            type: Array,
            required: true
        }
    })

    const currentSelection = ref(1)
    const selection = ref([])
    const emit = defineEmits(["onCategories"])

    const handleAddToSelection = (e) => {
        e.preventDefault()
        if (!selection.value.includes(currentSelection.value)){
            selection.value.push(currentSelection.value)
            emit('onCategories', selection.value)
        }

        
    }

    const handlerRemoveSelection = (i) => {
        selection.value = selection.value.filter(item => selection.value.indexOf(item) !== i)
        emit('onCategories', selection.value)
    }

    
</script>

<template>
    <div class="w-full">
        <div class="flex">
            <select v-model="currentSelection" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option v-for="(item, index) in collection" :key="index" :value="item">{{ item?.name }}</option>
            </select>
            <button class="bg-indigo-500 hover:bg-indigo-700 rounded py-2 px-4 text-white ml-1" @click="handleAddToSelection">Add</button>

            
        </div>
        <div>
            <ul>
                <li v-for="(c,i) in selection" class="text-white bg-indigo-500 hover:bg-indigo-700 py-2 px-4 rounded ml-1 mt-1 mb-1" :key="i"  @click="handlerRemoveSelection(i)">{{c.name}} <span class="float-right cursor-pointer">X</span> </li>
            </ul>
        </div>
    </div>
</template>