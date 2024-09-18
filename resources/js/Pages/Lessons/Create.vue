<script>
    export default {
        name:'lessonsCreate'
    }
</script>
<script setup>
    import { useForm } from '@inertiajs/vue3';
    import AppLayout from '@/Layouts/AppLayout.vue';
    import LessonForm from '@/Components/Lessons/Form.vue'

    

    const form = useForm({
        name : '',
        description:"",
        image_uri:"",
        content_uri:"",
        pdf_uri:"",
        level:"",
        categories:[]
    })

    const handleAddCategorie = (cat) => {
        form.categories.push(cat)
        
    }

    const props = defineProps({
        levels: {
            type: Object,
            required: true
        },
        categories: {
            type: Object,
            required: true
        }   
    })



</script>

<template>
    <AppLayout title="Create Lesson">
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">Create lesson</h1>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg ">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <LessonForm @handleAddCategorie="handleAddCategorie" :form="form" :categories="categories" :levels="levels" @submit="form.post(route('lessons.store'))"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
   </AppLayout>
</template>